<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Plesk
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all reseller accounts
     * GET /products/plesk/accounts
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all Plesk reseller accounts for the authenticated reseller.
     *
     * @param  array{status?: string, search?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/accounts', [], $query, null, false, true);
    }

    /**
     * Create a new reseller account
     * POST /products/plesk/accounts/create
     * Permissions: plesk:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new Plesk reseller account based on a plan. The account will be provisioned asynchronously.
     *
     * @param  array{email: string, name: string, plan_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsCreate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/create', [], $query, $body, false, true);
    }

    /**
     * Show reseller account details
     * GET /products/plesk/accounts/{account}
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific Plesk reseller account including live usage statistics.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsShow(string $account, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/accounts/{account}', ['account' => $account], $query, null, false, true);
    }

    /**
     * Cancel reseller account
     * POST /products/plesk/accounts/{account}/cancel
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Schedules cancellation of a Plesk reseller account at the end of the current billing month.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsCancel(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/{account}/cancel', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Change reseller account plan
     * POST /products/plesk/accounts/{account}/change-plan
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Changes the plan of an active Plesk reseller account. The new plan must be on the same node.
     *
     * @param  string  $account  Account ID
     * @param  array{plan_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsChangePlan(string $account, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/{account}/change-plan', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Delete reseller account
     * POST /products/plesk/accounts/{account}/delete
     * Permissions: plesk:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes a Plesk reseller account. This action cannot be undone.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsDelete(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/{account}/delete', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Revoke account cancellation
     * POST /products/plesk/accounts/{account}/revoke-cancel
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Revokes a scheduled cancellation for a Plesk reseller account.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsRevokeCancel(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/{account}/revoke-cancel', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Suspend reseller account
     * POST /products/plesk/accounts/{account}/suspend
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Suspends an active Plesk reseller account with an optional reason.
     *
     * @param  string  $account  Account ID
     * @param  array{reason?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsSuspend(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/{account}/suspend', ['account' => $account], $query, $body, false, true);
    }

    /**
     * Unsuspend reseller account
     * POST /products/plesk/accounts/{account}/unsuspend
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Unsuspends a suspended Plesk reseller account.
     *
     * @param  string  $account  Account ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function accountsUnsuspend(string $account, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/accounts/{account}/unsuspend', ['account' => $account], $query, $body, false, true);
    }

    /**
     * List available nodes with pricing
     * GET /products/plesk/nodes
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all active Plesk nodes with webspace pricing configuration for custom webspace orders.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodes(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/nodes', [], $query, null, false, true);
    }

    /**
     * List available plans
     * GET /products/plesk/plans
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all active Plesk plans (reseller and webspace) with effective pricing for the authenticated reseller.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function plans(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/plans', [], $query, null, false, true);
    }

    /**
     * List all webspaces
     * GET /products/plesk/webspaces
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all Plesk webspaces for the authenticated reseller.
     *
     * @param  array{status?: string, search?: string, account_id?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/webspaces', [], $query, null, false, true);
    }

    /**
     * Create a new webspace
     * POST /products/plesk/webspaces/create
     * Permissions: plesk:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new Plesk webspace. Can be plan-based, custom, or under a reseller account. The webspace will be provisioned asynchronously.
     *
     * @param  array{account_id?: string|null, disk_gb?: int|null, domain: string, max_databases?: int|null, max_domains?: int|null, max_email_accounts?: int|null, node_id?: string|null, plan_id?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesCreate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/webspaces/create', [], $query, $body, false, true);
    }

    /**
     * Show webspace details
     * GET /products/plesk/webspaces/{webspace}
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific Plesk webspace including credentials and monthly cost.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesShow(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/webspaces/{webspace}', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Delete webspace
     * POST /products/plesk/webspaces/{webspace}/delete
     * Permissions: plesk:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes a Plesk webspace. This action cannot be undone.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesDelete(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/webspaces/{webspace}/delete', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Get webspace live stats
     * GET /products/plesk/webspaces/{webspace}/stats
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns current usage statistics for a webspace (cached for 5 minutes).
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesStats(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/webspaces/{webspace}/stats', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Get webspace historical stats
     * GET /products/plesk/webspaces/{webspace}/stats/history
     * Permissions: plesk:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns daily usage statistics for a webspace over a specified period.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesStatsHistory(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/plesk/webspaces/{webspace}/stats/history', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Suspend webspace
     * POST /products/plesk/webspaces/{webspace}/suspend
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Suspends an active Plesk webspace with an optional reason.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array{reason?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesSuspend(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/webspaces/{webspace}/suspend', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Unsuspend webspace
     * POST /products/plesk/webspaces/{webspace}/unsuspend
     * Permissions: plesk:update
     * Response: json; json() preserves the full envelope and pagination.
     * Unsuspends a suspended Plesk webspace.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webspacesUnsuspend(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/plesk/webspaces/{webspace}/unsuspend', ['webspace' => $webspace], $query, $body, false, true);
    }
}
