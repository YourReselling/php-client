<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Account
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * Get account details
     * GET /account
     * Permissions: account:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the authenticated reseller account details including company information, contact details, tax information, enabled products, and credit balance.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(array $query = []): Response
    {
        return $this->transport->send('GET', '/account', [], $query, null, false, true);
    }

    /**
     * Update account details
     * PATCH /account
     * Permissions: account:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates non-critical account fields such as company name, contact name, phone, and address. Email, tax ID, and status cannot be changed via API.
     *
     * @param  array{company_name?: string, contact_name?: string, phone?: string|null, address?: string, city?: string, zip?: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/account', [], $query, $body, false, true);
    }
}
