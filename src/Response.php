<?php

declare(strict_types=1);

namespace YourReselling;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/** Complete response, retaining pagination, headers, binary bodies and streaming access. */
final class Response
{
    public function __construct(private readonly ResponseInterface $response) {}

    public function status(): int
    {
        return $this->response->getStatusCode();
    }

    public function header(string $name): string
    {
        return $this->response->getHeaderLine($name);
    }

    /** @return array<string, list<string>> */
    public function headers(): array
    {
        return $this->response->getHeaders();
    }

    /** Caller owns the stream and should close it after downloads or SSE consumption. */
    public function stream(): StreamInterface
    {
        return $this->response->getBody();
    }

    public function text(): string
    {
        return (string) $this->stream();
    }

    /** Decode the complete JSON response, including pagination and task information. */
    public function json(): mixed
    {
        $body = $this->text();
        if ($body === '') {
            return null;
        }
        try {
            return json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            throw new \UnexpectedValueException('Response is not valid JSON; use text() or stream() for this endpoint.');
        }
    }

    /** Convenience extraction; json() retains the complete envelope and pagination. */
    public function data(): mixed
    {
        $json = $this->json();

        return is_array($json) && array_key_exists('data', $json) ? $json['data'] : $json;
    }

    /**
     * Iterate SSE events without buffering the complete response. [DONE] closes the iterator.
     *
     * @return \Generator<int, array{event: string, data: string, id: ?string}>
     */
    public function events(): \Generator
    {
        $stream = $this->stream();
        $line = '';
        $event = 'message';
        $id = null;
        $data = [];
        try {
            while (! $stream->eof()) {
                $character = $stream->read(1);
                if ($character !== "\n") {
                    $line .= $character;

                    continue;
                }
                $line = rtrim($line, "\r");
                if ($line === '') {
                    if ($data !== []) {
                        $payload = implode("\n", $data);
                        if ($payload === '[DONE]') {
                            return;
                        }
                        yield ['event' => $event, 'data' => $payload, 'id' => $id];
                    }
                    $event = 'message';
                    $data = [];
                } elseif (! str_starts_with($line, ':')) {
                    [$field, $value] = array_pad(explode(':', $line, 2), 2, '');
                    $value = str_starts_with($value, ' ') ? substr($value, 1) : $value;
                    if ($field === 'data') {
                        $data[] = $value;
                    } elseif ($field === 'event') {
                        $event = $value;
                    } elseif ($field === 'id' && ! str_contains($value, "\0")) {
                        $id = $value;
                    }
                }
                $line = '';
            }
        } finally {
            $stream->close();
        }
    }
}
