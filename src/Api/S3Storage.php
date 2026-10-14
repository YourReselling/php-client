<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class S3Storage
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List S3 buckets
     * GET /products/s3-storage
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage', [], $query, null, false, true);
    }

    /**
     * Calculate bucket price
     * POST /products/s3-storage/calculate
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Calculates the net and gross monthly price for a bucket of the given size.
     *
     * @param  array{size_gb: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function calculate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/s3-storage/calculate', [], $query, $body, false, true);
    }

    /**
     * List S3 Storage locations
     * GET /products/s3-storage/locations
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locations(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/locations', [], $query, null, false, true);
    }

    /**
     * Create S3 bucket
     * POST /products/s3-storage/order
     * Permissions: s3-storage:create
     * Response: json; json() preserves the full envelope and pagination.
     * Provisions a new S3-compatible bucket. Size range 500-20000 GB.
     *
     * @param  array{friendly_name: string, location_id?: string|null, size_gb: int, speed_mbps?: int|null, autoscaling_enabled?: bool, autoscaling_scale_up_only?: bool, autoscaling_lower_threshold?: int|null, autoscaling_upper_threshold?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/s3-storage/order', [], $query, $body, false, true);
    }

    /**
     * Get S3 bucket details
     * GET /products/s3-storage/{bucket}
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns full bucket details including S3 access credentials.
     *
     * @param  string  $bucket  bucket
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}', ['bucket' => $bucket], $query, null, false, true);
    }

    /**
     * Update S3 bucket settings
     * PATCH /products/s3-storage/{bucket}
     * Permissions: s3-storage:update
     * Response: json; json() preserves the full envelope and pagination.
     * Patch the bucket: friendly name, speed tier, autoscaling. All fields optional.
     *
     * @param  string  $bucket  bucket
     * @param  array{friendly_name?: string, speed_mbps?: int, autoscaling_enabled?: bool, autoscaling_scale_up_only?: bool, autoscaling_lower_threshold?: int, autoscaling_upper_threshold?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $bucket, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/s3-storage/{bucket}', ['bucket' => $bucket], $query, $body, false, true);
    }

    /**
     * Delete S3 bucket
     * DELETE /products/s3-storage/{bucket}/delete
     * Permissions: s3-storage:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes a bucket and all objects stored in it. This action is irreversible.
     *
     * @param  string  $bucket  bucket
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $bucket, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/s3-storage/{bucket}/delete', ['bucket' => $bucket], $query, $body, false, true);
    }

    /**
     * List folders in a bucket
     * GET /products/s3-storage/{bucket}/folders
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the common prefixes (folders) directly under the given prefix in the bucket.
     *
     * @param  string  $bucket  bucket
     * @param  array{prefix?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function folders(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}/folders', ['bucket' => $bucket], $query, null, false, true);
    }

    /**
     * Get bucket usage metrics
     * GET /products/s3-storage/{bucket}/metrics
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns time-series storage usage metrics for the requested period.
     *
     * @param  string  $bucket  bucket
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function metrics(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}/metrics', ['bucket' => $bucket], $query, null, false, true);
    }

    /**
     * Get bucket network bandwidth
     * GET /products/s3-storage/{bucket}/network-bandwidth
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns time-series network bandwidth metrics for the requested period.
     *
     * @param  string  $bucket  bucket
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function networkBandwidth(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}/network-bandwidth', ['bucket' => $bucket], $query, null, false, true);
    }

    /**
     * List objects in a bucket
     * GET /products/s3-storage/{bucket}/objects
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Lists objects under the given prefix. Pass `token` to page through results, or `search` to filter objects across all nested keys by substring.
     *
     * @param  string  $bucket  bucket
     * @param  array{prefix?: string, token?: string, search?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function objects(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}/objects', ['bucket' => $bucket], $query, null, false, true);
    }

    /**
     * Get a presigned download URL
     * GET /products/s3-storage/{bucket}/presign
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a presigned URL to download a single object from the bucket.
     *
     * @param  string  $bucket  bucket
     * @param  array{key: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function presign(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}/presign', ['bucket' => $bucket], $query, null, false, true);
    }

    /**
     * Resize S3 bucket
     * PATCH /products/s3-storage/{bucket}/quota
     * Permissions: s3-storage:update
     * Response: json; json() preserves the full envelope and pagination.
     * Resizes the bucket to the given size in GB (500-20000).
     *
     * @param  string  $bucket  bucket
     * @param  array{size_gb: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function quota(string $bucket, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/s3-storage/{bucket}/quota', ['bucket' => $bucket], $query, $body, false, true);
    }

    /**
     * Rotate S3 bucket credentials
     * POST /products/s3-storage/{bucket}/rotate-credentials
     * Permissions: s3-storage:update
     * Response: json; json() preserves the full envelope and pagination.
     * Generates a new S3 secret key. The old secret is immediately invalidated.
     *
     * @param  string  $bucket  bucket
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rotateCredentials(string $bucket, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/s3-storage/{bucket}/rotate-credentials', ['bucket' => $bucket], $query, $body, false, true);
    }

    /**
     * Get bucket usage
     * GET /products/s3-storage/{bucket}/usage
     * Permissions: s3-storage:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current storage usage (bytes and object count) for the bucket.
     *
     * @param  string  $bucket  bucket
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function usage(string $bucket, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/s3-storage/{bucket}/usage', ['bucket' => $bucket], $query, null, false, true);
    }
}
