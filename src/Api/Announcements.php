<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Announcements
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List announcements
     * GET /announcements
     * Permissions: announcements:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of published, non-expired announcements. Supports filtering by type, priority, and affected product. Pinned announcements are listed first.
     *
     * @param  array{type?: string, priority?: string, product?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/announcements', [], $query, null, false, true);
    }

    /**
     * Get announcement details
     * GET /announcements/{announcement}
     * Permissions: announcements:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns full details of a single published announcement.
     *
     * @param  string  $announcement  Announcement ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $announcement, array $query = []): Response
    {
        return $this->transport->send('GET', '/announcements/{announcement}', ['announcement' => $announcement], $query, null, false, true);
    }
}
