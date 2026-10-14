<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Licenses
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List customer licenses
     * GET /products/licenses
     * Permissions: licenses:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{status?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/licenses', [], $query, null, false, true);
    }

    /**
     * Order a license
     * POST /products/licenses/order
     * Permissions: licenses:create
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{product_id: string, ip_address: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/licenses/order', [], $query, $body, false, true);
    }

    /**
     * List license products
     * GET /products/licenses/products
     * Permissions: licenses:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{type?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function products(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/licenses/products', [], $query, null, false, true);
    }

    /**
     * Get license product
     * GET /products/licenses/products/{product}
     * Permissions: licenses:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $product  Product ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function product(string $product, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/licenses/products/{product}', ['product' => $product], $query, null, false, true);
    }

    /**
     * Get customer license
     * GET /products/licenses/{license}
     * Permissions: licenses:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $license  License ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $license, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/licenses/{license}', ['license' => $license], $query, null, false, true);
    }

    /**
     * Set license auto-renew
     * PUT /products/licenses/{license}/auto-renew
     * Permissions: licenses:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $license  license route parameter
     * @param  array{auto_renew: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function autoRenew(string $license, array $body, array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/licenses/{license}/auto-renew', ['license' => $license], $query, $body, false, true);
    }

    /**
     * Cancel a license
     * POST /products/licenses/{license}/cancel
     * Permissions: licenses:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $license  license route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function cancel(string $license, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/licenses/{license}/cancel', ['license' => $license], $query, $body, false, true);
    }

    /**
     * Change license IP binding
     * PUT /products/licenses/{license}/ip
     * Permissions: licenses:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $license  license route parameter
     * @param  array{ip_address: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ip(string $license, array $body, array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/licenses/{license}/ip', ['license' => $license], $query, $body, false, true);
    }

    /**
     * Renew a license
     * POST /products/licenses/{license}/renew
     * Permissions: licenses:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $license  license route parameter
     * @param  array{period_months?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function renew(string $license, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/licenses/{license}/renew', ['license' => $license], $query, $body, false, true);
    }

    /**
     * Synchronize a license
     * POST /products/licenses/{license}/sync
     * Permissions: licenses:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $license  license route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sync(string $license, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/licenses/{license}/sync', ['license' => $license], $query, $body, false, true);
    }
}
