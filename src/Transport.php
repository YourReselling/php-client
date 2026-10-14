<?php

declare(strict_types=1);

namespace YourReselling;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/** Shared authenticated transport. Writes are never retried and redirects never receive API credentials. */
class Transport
{
    private ClientInterface $httpClient;

    public function __construct(
        private readonly string $token,
        private readonly string $baseUrl = 'https://resellingprovider.de/api/v1',
        ?ClientInterface $httpClient = null,
        private readonly float $timeout = 120.0,
    ) {
        $url = parse_url($baseUrl);
        if (! is_array($url) || ($url['scheme'] ?? null) !== 'https' || empty($url['host']) || isset($url['user']) || isset($url['pass']) || isset($url['query']) || isset($url['fragment'])) {
            throw new \InvalidArgumentException('The API base URL must be an absolute HTTPS URL without credentials, query or fragment.');
        }
        if ($token === '' || preg_match('/[\r\n]/', $token)) {
            throw new \InvalidArgumentException('Provide a non-empty API token without newline characters.');
        }
        $this->setHttpClient($httpClient);
    }

    public function setHttpClient(?ClientInterface $httpClient = null): void
    {
        $this->httpClient = $httpClient ?? new HttpClient;
    }

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /** @deprecated Prefer passing the token only to the constructor. Never log it. */
    public function getToken(): string
    {
        return $this->token;
    }

    /** @return array<string, string> */
    public function __debugInfo(): array
    {
        return ['baseUrl' => $this->baseUrl, 'token' => '[redacted]'];
    }

    /**
     * @param  array<string, string|int>  $pathParameters  Values are encoded as individual URI segments.
     * @param  array<string, mixed>  $query  Nested arrays use Laravel bracket encoding; null is omitted.
     * @param  array<string, mixed>|null  $body  JSON object or multipart fields (Upload for file contents).
     */
    public function send(string $method, string $path, array $pathParameters = [], array $query = [], ?array $body = null, bool $multipart = false, bool $authenticated = true): Response
    {
        foreach ($pathParameters as $key => $value) {
            if ((string) $value === '' || in_array((string) $value, ['.', '..'], true)) {
                throw new \InvalidArgumentException('Path parameters must be non-empty identifiers.');
            }
            $path = str_replace('{'.$key.'}', rawurlencode((string) $value), $path);
        }
        $path = ltrim($path, '/');
        if ($path === '' || preg_match('~[{}?#]|(^|/)\.\.?(?:/|$)|^[a-z]+:~i', $path)) {
            throw new \InvalidArgumentException('Invalid API path or missing route parameter.');
        }
        $headers = ['Accept' => 'application/json', 'User-Agent' => 'YourReselling-PHP/3.0'];
        if ($authenticated) {
            $headers['Authorization'] = 'Bearer '.$this->token;
        }
        $options = ['headers' => $headers, 'http_errors' => false, 'allow_redirects' => false, 'timeout' => $this->timeout, 'connect_timeout' => 10, 'verify' => true, 'stream' => true];
        if ($query !== []) {
            $options['query'] = http_build_query($query, '', '&', PHP_QUERY_RFC3986);
        }
        if ($body !== null) {
            if ($multipart) {
                $options['multipart'] = $this->multipartFields($body);
            } else {
                $options['json'] = $body === [] ? new \stdClass : $body;
            }
        }
        try {
            $response = $this->httpClient->request($method, rtrim($this->baseUrl, '/').'/'.$path, $options);
        } catch (GuzzleException) {
            throw new \RuntimeException('API transport failed. Check connectivity, TLS and timeouts; do not automatically retry an order.');
        }

        return $this->checked($response);
    }

    protected function checked(ResponseInterface $response): Response
    {
        $status = $response->getStatusCode();
        if ($status < 200 || $status >= 300) {
            $body = $response->getBody()->read(65536);
            $response->getBody()->close();
            $json = json_decode($body, true);
            $error = is_array($json['error'] ?? null) ? $json['error'] : [];
            $message = $error['message'] ?? $json['message'] ?? 'API request failed';
            $message = is_string($message) ? str_replace($this->token, '[redacted]', $message) : 'API request failed';
            $validation = $error['errors'] ?? $json['errors'] ?? [];
            throw new ApiException($message, $status, isset($error['code']) ? (string) $error['code'] : null, is_array($validation) ? $validation : [], $response->getHeaderLine('X-Request-ID') ?: null, $response->getHeaderLine('Retry-After') ?: (isset($error['retry_after']) ? (string) $error['retry_after'] : null));
        }

        return new Response($response);
    }

    /** @param array<string, mixed> $fields @return list<array<string, mixed>> */
    private function multipartFields(array $fields, string $prefix = ''): array
    {
        $parts = [];
        foreach ($fields as $key => $value) {
            $name = $prefix === '' ? (string) $key : $prefix.'['.$key.']';
            if ($value instanceof Upload) {
                $parts[] = ['name' => $name, 'contents' => $value->contents, 'filename' => $value->filename, 'headers' => ['Content-Type' => $value->contentType]];
            } elseif (is_array($value)) {
                array_push($parts, ...$this->multipartFields($value, $name));
            } elseif ($value !== null) {
                $parts[] = ['name' => $name, 'contents' => is_bool($value) ? ($value ? '1' : '0') : (string) $value];
            }
        }

        return $parts;
    }
}
