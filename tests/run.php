<?php

declare(strict_types=1);

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response as HttpResponse;
use YourReselling\ApiException;
use YourReselling\Client;
use YourReselling\Credentials;
use YourReselling\Response;
use YourReselling\Upload;

require __DIR__.'/../vendor/autoload.php';

function check(bool $condition, string $message): void
{
    if (! $condition) {
        throw new RuntimeException($message);
    }
}

function fakeClient(Closure $handle): Client
{
    return new Client('rsk_test_secret', httpClient: new HttpClient(['handler' => HandlerStack::create(static fn ($request, $options) => Create::promiseFor($handle($request, $options)))]));
}

$contract = json_decode(file_get_contents(__DIR__.'/contract.json'), true, 512, JSON_THROW_ON_ERROR);
$checked = 0;
foreach ($contract['operations'] as $operation) {
    $client = fakeClient(function ($request) use ($operation): HttpResponse {
        check($request->getMethod() === $operation['method'], 'Incorrect verb: '.$operation['id']);
        $expected = $operation['path'];
        foreach ($operation['pathParameters'] as $parameter) {
            $expected = str_replace('{'.$parameter['name'].'}', ($parameter['type'] ?? '') === 'integer' ? '42' : 'id%20with%20space', $expected);
        }
        check($request->getUri()->getPath() === '/api/v1'.$expected, 'Incorrect path: '.$operation['id']);
        check($request->getHeaderLine('Authorization') === ($operation['authenticated'] ? 'Bearer rsk_test_secret' : ''), 'Wrong authentication');

        return new HttpResponse(200, [], '{"success":true,"data":[],"meta":{"page":2}}');
    });
    $resource = $client->api()->{$operation['group']}();
    $parameters = array_map(static fn (array $parameter): string|int => ($parameter['type'] ?? '') === 'integer' ? 42 : 'id with space', $operation['pathParameters']);
    if ($operation['method'] !== 'GET') {
        $parameters[] = [];
    }
    $response = $resource->{$operation['name']}(...$parameters);
    check($response->json()['meta']['page'] === 2, 'Pagination envelope was lost');
    $checked++;
}

$calls = 0;
$client = fakeClient(function () use (&$calls): HttpResponse {
    $calls++;

    return new HttpResponse(422, ['X-Request-ID' => 'request-1', 'Retry-After' => '60'], '{"error":{"code":"validation_error","message":"bad rsk_test_secret","errors":{"cores":["min1"]}}}');
});
try {
    $client->api()->rootserver()->create('cluster', []);
    throw new RuntimeException('Expected API exception');
} catch (ApiException $error) {
    check($error->status === 422 && $error->requestId === 'request-1' && $error->retryAfter === '60', 'Missing error metadata');
    check(! str_contains($error->getMessage(), 'rsk_test_secret'), 'Token leaked');
    check(isset($error->validationErrors['cores']) && $calls === 1, 'Error lost or unsafe retry');
}
$client = fakeClient(function ($request): HttpResponse {
    parse_str($request->getUri()->getQuery(), $query);
    check($query === ['page' => '0', 'active' => '0', 'filters' => ['status' => ['running']]], 'Incorrect query encoding');

    return new HttpResponse(204);
});
check($client->send('GET', '/account', [], ['page' => 0, 'active' => false, 'filters' => ['status' => ['running']], 'empty' => null])->json() === null, '204 handling failed');
$client = fakeClient(function ($request): HttpResponse {
    check(str_starts_with($request->getHeaderLine('Content-Type'), 'multipart/form-data; boundary='), 'Missing multipart boundary');
    check(str_contains((string) $request->getBody(), 'sound'), 'Missing file contents');

    return new HttpResponse(200, [], 'transcription');
});
check($client->send('POST', '/products/inference/audio/transcriptions', [], [], ['file' => new Upload('sound', 'sound.wav'), 'model' => 'example'], true)->text() === 'transcription', 'Raw body failed');
$response = new Response(new HttpResponse(200, [], ":ping\nevent: delta\ndata: one\ndata: two\n\ndata: [DONE]\n\n"));
check(iterator_to_array($response->events()) === [['event' => 'delta', 'data' => "one\ntwo", 'id' => null]], 'SSE parsing failed');
check(! str_contains((string) new Credentials('rsk_test_secret'), 'rsk_test_secret'), 'Credentials string leaks secret');
check(! str_contains(print_r(new Client('rsk_test_secret'), true), 'rsk_test_secret'), 'Client debug output leaks secret');
foreach (['http://example.com/api/', 'https://user@example.com/api/'] as $url) {
    try {
        new Client('token', baseUrl: $url);
        throw new RuntimeException('Unsafe base accepted');
    } catch (InvalidArgumentException) {
    }
}
echo "PHP: {$checked} endpoint contracts and transport regression checks passed.\n";
