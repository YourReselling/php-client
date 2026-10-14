<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Loadbalancer
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all Load Balancers
     * GET /products/loadbalancer
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all load balancers for the authenticated reseller. Kubernetes-managed load balancers are excluded.
     *
     * @param  array{status?: string, search?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer', [], $query, null, false, true);
    }

    /**
     * Create a Load Balancer
     * POST /products/loadbalancer/create
     * Permissions: loadbalancer:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new load balancer. Returns 202 as provisioning is asynchronous.
     *
     * @param  array{algorithm?: 'roundrobin'|'leastconn'|'source', cluster_id: string, location_id: string, name: string, plan_id: string, sticky_sessions?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/create', [], $query, $body, false, true);
    }

    /**
     * List Load Balancer plans with pricing
     * GET /products/loadbalancer/plans
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available Load Balancer plans with pricing. Uses reseller-specific pricing if available.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function plans(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer/plans', [], $query, null, false, true);
    }

    /**
     * Show Load Balancer details
     * GET /products/loadbalancer/{lb}
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific load balancer including backends, domains, and rules.
     *
     * @param  string  $lb  lb route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $lb, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer/{lb}', ['lb' => $lb], $query, null, false, true);
    }

    /**
     * List backends
     * GET /products/loadbalancer/{lb}/backends
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all backends for a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backendsIndex(string $lb, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer/{lb}/backends', ['lb' => $lb], $query, null, false, true);
    }

    /**
     * Add backend
     * POST /products/loadbalancer/{lb}/backends/create
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds a new backend server to a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  array{backend_group?: string, ip_address: string, name: string, port: int, weight?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backendsCreate(string $lb, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/backends/create', ['lb' => $lb], $query, $body, false, true);
    }

    /**
     * Remove backend
     * POST /products/loadbalancer/{lb}/backends/{backend}/delete
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes a backend server from a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  string  $backend  backend route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backendsDelete(string $lb, string $backend, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/backends/{backend}/delete', ['lb' => $lb, 'backend' => $backend], $query, $body, false, true);
    }

    /**
     * Update backend
     * POST /products/loadbalancer/{lb}/backends/{backend}/update
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates a backend server (weight and is_active).
     *
     * @param  string  $lb  lb route parameter
     * @param  string  $backend  backend route parameter
     * @param  array{is_active?: bool, weight?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backendsUpdate(string $lb, string $backend, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/backends/{backend}/update', ['lb' => $lb, 'backend' => $backend], $query, $body, false, true);
    }

    /**
     * Delete Load Balancer
     * POST /products/loadbalancer/{lb}/delete
     * Permissions: loadbalancer:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Marks a load balancer for deletion with a 48h grace period.
     *
     * @param  string  $lb  lb route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $lb, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/delete', ['lb' => $lb], $query, $body, false, true);
    }

    /**
     * List domains
     * GET /products/loadbalancer/{lb}/domains
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all domains for a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsIndex(string $lb, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer/{lb}/domains', ['lb' => $lb], $query, null, false, true);
    }

    /**
     * Add domain
     * POST /products/loadbalancer/{lb}/domains/create
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds a domain to a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  array{domain: string, is_primary?: bool, ssl_auto_renew?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsCreate(string $lb, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/domains/create', ['lb' => $lb], $query, $body, false, true);
    }

    /**
     * Remove domain
     * POST /products/loadbalancer/{lb}/domains/{domain}/delete
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes a domain from a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  string  $domain  domain route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsDelete(string $lb, string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/domains/{domain}/delete', ['lb' => $lb, 'domain' => $domain], $query, $body, false, true);
    }

    /**
     * Request SSL certificate
     * POST /products/loadbalancer/{lb}/domains/{domain}/request-ssl
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Requests a Let's Encrypt SSL certificate for a domain. The load balancer must be active.
     *
     * @param  string  $lb  lb route parameter
     * @param  string  $domain  domain route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsRequestSsl(string $lb, string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/domains/{domain}/request-ssl', ['lb' => $lb, 'domain' => $domain], $query, $body, false, true);
    }

    /**
     * Restore Load Balancer
     * POST /products/loadbalancer/{lb}/restore
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Restores a load balancer from pending deletion. Costs 4.99 EUR.
     *
     * @param  string  $lb  lb route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function restore(string $lb, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/restore', ['lb' => $lb], $query, $body, false, true);
    }

    /**
     * List routing rules
     * GET /products/loadbalancer/{lb}/rules
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all routing rules for a load balancer, ordered by priority.
     *
     * @param  string  $lb  lb route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rulesIndex(string $lb, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer/{lb}/rules', ['lb' => $lb], $query, null, false, true);
    }

    /**
     * Add routing rule
     * POST /products/loadbalancer/{lb}/rules/create
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds a routing rule to a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  array{action: 'forward'|'redirect'|'deny', description?: string|null, match_type: 'host'|'path'|'header', match_value: string, priority?: int, redirect_url?: string|null, target_backend_group?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rulesCreate(string $lb, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/rules/create', ['lb' => $lb], $query, $body, false, true);
    }

    /**
     * Remove routing rule
     * POST /products/loadbalancer/{lb}/rules/{rule}/delete
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes a routing rule from a load balancer.
     *
     * @param  string  $lb  lb route parameter
     * @param  string  $rule  rule route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rulesDelete(string $lb, string $rule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/rules/{rule}/delete', ['lb' => $lb, 'rule' => $rule], $query, $body, false, true);
    }

    /**
     * Get Load Balancer statistics
     * GET /products/loadbalancer/{lb}/stats
     * Permissions: loadbalancer:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns traffic statistics for a load balancer. Supports period filters: 1h, 24h, 7d, 30d.
     *
     * @param  string  $lb  lb route parameter
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function stats(string $lb, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/loadbalancer/{lb}/stats', ['lb' => $lb], $query, null, false, true);
    }

    /**
     * Update Load Balancer settings
     * POST /products/loadbalancer/{lb}/update
     * Permissions: loadbalancer:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates load balancer settings (name, algorithm, sticky sessions, health checks).
     *
     * @param  string  $lb  lb route parameter
     * @param  array{algorithm?: 'roundrobin'|'leastconn'|'source', health_check_interval?: int, health_check_path?: string, name?: string, sticky_sessions?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $lb, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/loadbalancer/{lb}/update', ['lb' => $lb], $query, $body, false, true);
    }
}
