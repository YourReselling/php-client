<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class SubResellers
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List sub-resellers
     * GET /sub-resellers
     * Permissions: sub_resellers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all sub-resellers owned by the authenticated main reseller. Only available for main resellers.
     *
     * @param  array{status?: string, search?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/sub-resellers', [], $query, null, false, true);
    }

    /**
     * Create sub-reseller
     * POST /sub-resellers
     * Permissions: sub_resellers:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new sub-reseller under the authenticated main reseller.
     *
     * @param  array{email: string, company_name: string, contact_name: string, password: string, phone?: string|null, address?: string|null, city?: string|null, zip?: string|null, country?: string|null, enabled_products?: list<string>|null, credit_limit?: float|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/sub-resellers', [], $query, $body, false, true);
    }

    /**
     * Delete sub-reseller
     * DELETE /sub-resellers/{subReseller}
     * Permissions: sub_resellers:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Soft-deletes a sub-reseller.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $subReseller, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/sub-resellers/{subReseller}', ['subReseller' => $subReseller], $query, $body, false, true);
    }

    /**
     * Get sub-reseller details
     * GET /sub-resellers/{subReseller}
     * Permissions: sub_resellers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific sub-reseller.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $subReseller, array $query = []): Response
    {
        return $this->transport->send('GET', '/sub-resellers/{subReseller}', ['subReseller' => $subReseller], $query, null, false, true);
    }

    /**
     * Update sub-reseller
     * PATCH /sub-resellers/{subReseller}
     * Permissions: sub_resellers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates an existing sub-reseller.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array{address?: string|null, city?: string|null, company_name?: string, contact_name?: string, country?: string, credit_limit?: float, email?: string, enabled_products?: list<string>, password?: string, phone?: string|null, zip?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $subReseller, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/sub-resellers/{subReseller}', ['subReseller' => $subReseller], $query, $body, false, true);
    }

    /**
     * Get sub-reseller pricing
     * GET /sub-resellers/{subReseller}/pricing
     * Permissions: sub_resellers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all configured pricing for a sub-reseller, including product prices, domain TLD prices, and rootserver cluster prices.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pricingShow(string $subReseller, array $query = []): Response
    {
        return $this->transport->send('GET', '/sub-resellers/{subReseller}/pricing', ['subReseller' => $subReseller], $query, null, false, true);
    }

    /**
     * Update sub-reseller pricing
     * PUT /sub-resellers/{subReseller}/pricing
     * Permissions: sub_resellers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates pricing for a sub-reseller. Supports product prices, domain prices, and rootserver prices. Each section is optional — only provided sections are updated.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array{product_prices?: list<array{product_type_id: string}>, domain_prices?: list<array{domain_tld_price_id: string}>, rootserver_prices?: list<array{cluster_price_id: string}>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pricingUpdate(string $subReseller, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PUT', '/sub-resellers/{subReseller}/pricing', ['subReseller' => $subReseller], $query, $body, false, true);
    }

    /**
     * Suspend sub-reseller
     * POST /sub-resellers/{subReseller}/suspend
     * Permissions: sub_resellers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Suspends an active sub-reseller.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function suspend(string $subReseller, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/sub-resellers/{subReseller}/suspend', ['subReseller' => $subReseller], $query, $body, false, true);
    }

    /**
     * Unsuspend sub-reseller
     * POST /sub-resellers/{subReseller}/unsuspend
     * Permissions: sub_resellers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Reactivates a suspended sub-reseller.
     *
     * @param  string  $subReseller  Sub-Reseller ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function unsuspend(string $subReseller, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/sub-resellers/{subReseller}/unsuspend', ['subReseller' => $subReseller], $query, $body, false, true);
    }
}
