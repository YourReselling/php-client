<?php

declare(strict_types=1);

namespace YourReselling;

/** A multipart upload. Resources are streamed; the caller closes its resource after the request. */
final class Upload
{
    /** @param resource|string $contents File resource or literal bytes, never an implicit path. */
    public function __construct(
        public readonly mixed $contents,
        public readonly string $filename,
        public readonly string $contentType = 'application/octet-stream',
    ) {
        if (! is_resource($contents) && ! is_string($contents)) {
            throw new \InvalidArgumentException('Upload contents must be a stream resource or string.');
        }
        if (preg_match('/[\r\n]/', $filename.$contentType)) {
            throw new \InvalidArgumentException('Invalid upload filename or content type.');
        }
    }
}
