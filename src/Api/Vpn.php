<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Vpn
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all VPN accounts
     * GET /products/vpn/accounts
     * Permissions: vpn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all VPN accounts for the authenticated reseller.
     *
     * @param  array{status?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/vpn/accounts', [], $query, null, false, true);
    }

    /**
     * Create a new VPN account
     * POST /products/vpn/accounts
     * Permissions: vpn:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new VPN account. The account will be provisioned via VPNResellers API.
     *
     * @param  array{dns_option?: 'standard'|'no_ads'|'no_ads_no_scam'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsStore(array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/vpn/accounts', [], $query, $body, false, true);
    }

    /**
     * Delete VPN account
     * DELETE /products/vpn/accounts/{account}
     * Permissions: vpn:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes a VPN account from the VPNResellers API and local database.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsDestroy(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/vpn/accounts/{account}', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Show VPN account details
     * GET /products/vpn/accounts/{account}
     * Permissions: vpn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific VPN account.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsShow(string $account, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/vpn/accounts/{account}', ['account' => $account], $query, null, false, true);
    }

    /**
     * Update VPN account
     * PATCH /products/vpn/accounts/{account}
     * Permissions: vpn:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates VPN account settings (DNS option only). Plan changes are not supported.
     *
     * @param  string  $account  Account ID
     * @param  array{dns_option: 'standard'|'no_ads'|'no_ads_no_scam'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsUpdate(string $account, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/vpn/accounts/{account}', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Suspend VPN account
     * POST /products/vpn/accounts/{account}/suspend
     * Permissions: vpn:update
     * Response: json; json() preserves the full envelope and pagination.
     * Suspends a VPN account. All active sessions will be terminated.
     *
     * @param  string  $account  Account ID
     * @param  array{reason?: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsSuspend(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/vpn/accounts/{account}/suspend', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Terminate VPN account
     * POST /products/vpn/accounts/{account}/terminate
     * Permissions: vpn:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Terminates a VPN account. The account will be disabled but kept for billing records.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsTerminate(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/vpn/accounts/{account}/terminate', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Unsuspend VPN account
     * POST /products/vpn/accounts/{account}/unsuspend
     * Permissions: vpn:update
     * Response: json; json() preserves the full envelope and pagination.
     * Unsuspends a previously suspended VPN account.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsUnsuspend(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/vpn/accounts/{account}/unsuspend', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Get DNS options
     * GET /products/vpn/dns-options
     * Permissions: vpn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns available DNS options for VPN accounts.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsOptions(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/vpn/dns-options', [], $query, null, false, true);
    }

    /**
     * Get VPN pricing
     * GET /products/vpn/prices
     * Permissions: vpn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns VPN pricing and product information.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function prices(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/vpn/prices', [], $query, null, false, true);
    }

    /**
     * Get VPN server locations
     * GET /products/vpn/servers
     * Permissions: vpn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available VPN server locations grouped by country.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function servers(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/vpn/servers', [], $query, null, false, true);
    }
}
