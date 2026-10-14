<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Rootserver
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all rootservers
     * GET /products/rootserver
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all rootservers for the authenticated reseller.
     *
     * @param  array{status?: string, search?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver', [], $query, null, false, true);
    }

    /**
     * Calculate server price
     * POST /products/rootserver/cluster/{cluster}/calculator
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Calculates the monthly price for a server configuration.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{cores: int, ram: int, disk: int, ipv4_count: int, bandwidth_tier_id?: string|null, ipv6_count?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function clusterCalculator(string $cluster, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/cluster/{cluster}/calculator', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Create a new rootserver
     * POST /products/rootserver/cluster/{cluster}/create
     * Permissions: rootservers:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new rootserver order. Returns 202 with a task for tracking.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{admin_password?: string|null, bandwidth_tier_id?: string|null, cores: int, disk: int, hostname: string, ipv4_count: int, ipv6_count: int, notes?: string|null, os_version_id: string, ram: int, reseller_ipv4_addresses?: list<string>|null, ssh_key_ids?: list<string>|null, startup_script_id?: string|null, use_reseller_pool?: bool|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(string $cluster, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/cluster/{cluster}/create', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Get cluster pricing
     * GET /products/rootserver/cluster/{cluster}/pricing
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns pricing information for a specific cluster. Uses reseller-specific pricing if available.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function clusterPricing(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/cluster/{cluster}/pricing', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * List firewall presets
     * GET /products/rootserver/firewall-presets
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available firewall presets.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallPresets(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/firewall-presets', [], $query, null, false, true);
    }

    /**
     * List all locations
     * GET /products/rootserver/locations
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available rootserver locations with their clusters.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locationsIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/locations', [], $query, null, false, true);
    }

    /**
     * Show location details
     * GET /products/rootserver/locations/{location}
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details for a specific location.
     *
     * @param  string  $location  location route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locationsShow(string $location, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/locations/{location}', ['location' => $location], $query, null, false, true);
    }

    /**
     * List available operating systems and apps
     * GET /products/rootserver/os-list
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available operating systems and app templates with their versions.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function osList(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/os-list', [], $query, null, false, true);
    }

    /**
     * List all tasks (global)
     * GET /products/rootserver/tasks
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all rootserver tasks for the authenticated reseller.
     *
     * @param array{status[]?: list<mixed>, type[]?: list<mixed>, rootserver_id?: string, created_from?: string, created_to?: string, sort?: string, include?: string, per_page?: int} $query Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function tasksGlobalIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/tasks', [], $query, null, false, true);
    }

    /**
     * Show task details (global)
     * GET /products/rootserver/tasks/{task}
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific task.
     *
     * @param  string  $task  task route parameter
     * @param  array{include?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function tasksGlobalShow(string $task, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/tasks/{task}', ['task' => $task], $query, null, false, true);
    }

    /**
     * Cancel a task
     * POST /products/rootserver/tasks/{task}/cancel
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Requests cancellation of a pending or running task.
     *
     * @param  string  $task  task route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function tasksCancel(string $task, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/tasks/{task}/cancel', ['task' => $task], $query, $body, false, true);
    }

    /**
     * GET /products/rootserver/traffic/locations
     * GET /products/rootserver/traffic/locations
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function trafficLocations(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/traffic/locations', [], $query, null, false, true);
    }

    /**
     * List all VPCs
     * GET /products/rootserver/vpc
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all VPCs for the authenticated reseller.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vpcIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/vpc', [], $query, null, false, true);
    }

    /**
     * Create a VPC
     * POST /products/rootserver/vpc/create
     * Permissions: rootservers:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new Virtual Private Cloud network.
     *
     * @param  array{location_id: string, name: string, subnet: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vpcCreate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/vpc/create', [], $query, $body, false, true);
    }

    /**
     * Show VPC details
     * GET /products/rootserver/vpc/{vpc}
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific VPC including its members.
     *
     * @param  string  $vpc  vpc route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vpcShow(string $vpc, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/vpc/{vpc}', ['vpc' => $vpc], $query, null, false, true);
    }

    /**
     * Delete a VPC
     * POST /products/rootserver/vpc/{vpc}/delete
     * Permissions: rootservers:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a VPC. All members must be unlinked first.
     *
     * @param  string  $vpc  vpc route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vpcDelete(string $vpc, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/vpc/{vpc}/delete', ['vpc' => $vpc], $query, $body, false, true);
    }

    /**
     * Link server to VPC
     * POST /products/rootserver/vpc/{vpc}/link
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds a rootserver as a member of a VPC. Returns the assigned private IP.
     *
     * @param  string  $vpc  vpc route parameter
     * @param  array{rootserver_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vpcLink(string $vpc, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/vpc/{vpc}/link', ['vpc' => $vpc], $query, $body, false, true);
    }

    /**
     * Unlink server from VPC
     * POST /products/rootserver/vpc/{vpc}/unlink
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes a rootserver from a VPC.
     *
     * @param  string  $vpc  vpc route parameter
     * @param  array{rootserver_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vpcUnlink(string $vpc, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/vpc/{vpc}/unlink', ['vpc' => $vpc], $query, $body, false, true);
    }

    /**
     * Show rootserver details
     * GET /products/rootserver/{rootserver}
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * List backups
     * GET /products/rootserver/{rootserver}/backups
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all backups for a rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsIndex(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/backups', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Create backup
     * POST /products/rootserver/{rootserver}/backups/create
     * Permissions: rootservers:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new backup. Returns 202 with a task for tracking.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{name?: string|null, description?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsCreate(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/backups/create', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Show backup details
     * GET /products/rootserver/{rootserver}/backups/{backup}
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific backup.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $backup  backup route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsShow(string $rootserver, string $backup, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/backups/{backup}', ['rootserver' => $rootserver, 'backup' => $backup], $query, null, false, true);
    }

    /**
     * Delete backup
     * POST /products/rootserver/{rootserver}/backups/{backup}/delete
     * Permissions: rootservers:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a backup. Returns 202 with a task for tracking.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $backup  backup route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsDelete(string $rootserver, string $backup, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/backups/{backup}/delete', ['rootserver' => $rootserver, 'backup' => $backup], $query, $body, false, true);
    }

    /**
     * Restore backup
     * POST /products/rootserver/{rootserver}/backups/{backup}/restore
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Restores a backup. All current data will be replaced. Returns 202 with a task.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $backup  backup route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsRestore(string $rootserver, string $backup, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/backups/{backup}/restore', ['rootserver' => $rootserver, 'backup' => $backup], $query, $body, false, true);
    }

    /**
     * List DDoS alerts for a server
     * GET /products/rootserver/{rootserver}/ddos
     * Permissions: ddos_protection:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns paginated DDoS alerts for a specific rootserver. Bandwidth and packet metrics are only visible when can_view_ddos_metrics is enabled.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{timeframe?: string, status?: string, severity?: string, sort?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ddosServer(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/ddos', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Delete a rootserver
     * POST /products/rootserver/{rootserver}/delete
     * Permissions: rootservers:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a rootserver. Returns 202 with a task for tracking.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/delete', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Apply firewall preset
     * POST /products/rootserver/{rootserver}/firewall/apply
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Applies a firewall preset to a rootserver. Replaces all existing rules. Returns 202 with a task.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{preset_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallApply(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/firewall/apply', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * List firewall rules
     * GET /products/rootserver/{rootserver}/firewall/rules
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all firewall rules for a rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRules(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/firewall/rules', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Create firewall rule
     * POST /products/rootserver/{rootserver}/firewall/rules/create
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new firewall rule and syncs to Proxmox.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{action: 'accept'|'drop'|'reject', comment?: string|null, destination?: string|null, destination_port?: string|null, direction: 'in'|'out', protocol?: 'tcp'|'udp'|'icmp'|'any'|null, source?: string|null, source_port?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRulesCreate(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/firewall/rules/create', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Reorder firewall rules
     * POST /products/rootserver/{rootserver}/firewall/rules/reorder
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Reorders firewall rules by providing an ordered list of rule IDs.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{rule_ids: list<mixed>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRulesReorder(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/firewall/rules/reorder', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Delete firewall rule
     * POST /products/rootserver/{rootserver}/firewall/rules/{rule}/delete
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a firewall rule and syncs to Proxmox.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $rule  rule route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRulesDelete(string $rootserver, string $rule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/firewall/rules/{rule}/delete', ['rootserver' => $rootserver, 'rule' => $rule], $query, $body, false, true);
    }

    /**
     * Update firewall rule
     * POST /products/rootserver/{rootserver}/firewall/rules/{rule}/update
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates an existing firewall rule and syncs to Proxmox.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $rule  rule route parameter
     * @param  array{action?: 'accept'|'drop'|'reject', comment?: string|null, destination?: string|null, destination_port?: string|null, direction?: 'in'|'out', is_enabled?: bool, protocol?: 'tcp'|'udp'|'icmp'|'any'|null, source?: string|null, source_port?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRulesUpdate(string $rootserver, string $rule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/firewall/rules/{rule}/update', ['rootserver' => $rootserver, 'rule' => $rule], $query, $body, false, true);
    }

    /**
     * Get historical server stats
     * GET /products/rootserver/{rootserver}/historical-stats
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns historical stats with automatic granularity based on time range.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{period?: '1h'|'6h'|'24h'|'7d'|'30d', from?: string, to?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function historicalStats(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/historical-stats', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * List rootserver IPs
     * GET /products/rootserver/{rootserver}/ips
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsIndex(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/ips', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Order additional IPv4 addresses
     * POST /products/rootserver/{rootserver}/ips/ipv4
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{count?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsIpv4Store(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/ips/ipv4', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Return a secondary IPv4 address
     * DELETE /products/rootserver/{rootserver}/ips/ipv4/{ip}
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $ip  ip route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsIpv4Destroy(string $rootserver, string $ip, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/rootserver/{rootserver}/ips/ipv4/{ip}', ['rootserver' => $rootserver, 'ip' => $ip], $query, $body, false, true);
    }

    /**
     * Set the primary IPv4 address
     * POST /products/rootserver/{rootserver}/ips/ipv4/{ip}/primary
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $ip  ip route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsIpv4Primary(string $rootserver, string $ip, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/ips/ipv4/{ip}/primary', ['rootserver' => $rootserver, 'ip' => $ip], $query, $body, false, true);
    }

    /**
     * Mount custom ISO from HTTPS URL
     * POST /products/rootserver/{rootserver}/iso/custom
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Proxmox downloads the ISO, mounts it as CD-ROM and prefers CD boot. Unmount deletes the custom file.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{url: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function isoCustom(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/iso/custom', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Mount catalog ISO
     * POST /products/rootserver/{rootserver}/iso/mount
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{iso_path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function isoMount(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/iso/mount', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Unmount ISO
     * POST /products/rootserver/{rootserver}/iso/unmount
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Unmounts the CD-ROM. A custom ISO downloaded via URL is deleted from storage.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function isoUnmount(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/iso/unmount', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * List available ISOs
     * GET /products/rootserver/{rootserver}/isos
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function isosIndex(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/isos', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Kill rootserver (force stop)
     * POST /products/rootserver/{rootserver}/kill
     * Permissions: rootservers:power
     * Response: json; json() preserves the full envelope and pagination.
     * Force stops a running rootserver immediately. May cause data loss.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function kill(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/kill', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Get live server stats
     * GET /products/rootserver/{rootserver}/live-stats
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns real-time CPU, RAM, disk, and network stats from Proxmox.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function liveStats(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/live-stats', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * List rDNS records
     * GET /products/rootserver/{rootserver}/rdns
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all IP addresses with their rDNS records for a rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rdnsIndex(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/rdns', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Update rDNS record
     * POST /products/rootserver/{rootserver}/rdns/update
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the rDNS record for an IP address. Returns 202 with a task for tracking.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{ip_id: string, rdns?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rdnsUpdate(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/rdns/update', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Reinstall rootserver OS
     * POST /products/rootserver/{rootserver}/reinstall
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Reinstalls the operating system. All data will be lost.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{admin_password?: string|null, hostname?: string|null, os_version_id: string, ssh_key_ids?: list<string>|null, startup_script_id?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reinstall(string $rootserver, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/reinstall', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Reset root password
     * POST /products/rootserver/{rootserver}/reset-root-password
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Resets the root password. Returns new password in task result.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{password?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function resetPassword(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/reset-root-password', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Resize rootserver resources
     * POST /products/rootserver/{rootserver}/resize
     * Permissions: rootservers:update
     * Response: json; json() preserves the full envelope and pagination.
     * Changes CPU, RAM, or disk size of a rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array{bandwidth_tier_id?: string|null, cores?: int, disk?: int, ram?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function resize(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/resize', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Restart rootserver
     * POST /products/rootserver/{rootserver}/restart
     * Permissions: rootservers:power
     * Response: json; json() preserves the full envelope and pagination.
     * Restarts a running rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function restart(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/restart', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Get serial console URL
     * GET /products/rootserver/{rootserver}/serial
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a serial (xterm.js) console URL. Adds a serial device to the VM if missing (effective after the next boot).
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serial(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/serial', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Start rootserver
     * POST /products/rootserver/{rootserver}/start
     * Permissions: rootservers:power
     * Response: json; json() preserves the full envelope and pagination.
     * Starts a stopped rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function start(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/start', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * Stop rootserver (graceful)
     * POST /products/rootserver/{rootserver}/stop
     * Permissions: rootservers:power
     * Response: json; json() preserves the full envelope and pagination.
     * Gracefully stops a running rootserver via ACPI shutdown.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function stop(string $rootserver, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/rootserver/{rootserver}/stop', ['rootserver' => $rootserver], $query, $body, false, true);
    }

    /**
     * List server tasks
     * GET /products/rootserver/{rootserver}/tasks
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of tasks for a specific rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param array{status[]?: list<mixed>, type[]?: list<mixed>, created_from?: string, created_to?: string, sort?: string, per_page?: int} $query Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serverTasksIndex(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/tasks', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Show server task details
     * GET /products/rootserver/{rootserver}/tasks/{task}
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details of a specific task for a rootserver.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  string  $task  task route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serverTasksShow(string $rootserver, string $task, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/tasks/{task}', ['rootserver' => $rootserver, 'task' => $task], $query, null, false, true);
    }

    /**
     * GET /products/rootserver/{rootserver}/traffic/history
     * GET /products/rootserver/{rootserver}/traffic/history
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function trafficHistory(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/traffic/history', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * GET /products/rootserver/{rootserver}/traffic/summary
     * GET /products/rootserver/{rootserver}/traffic/summary
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function trafficSummary(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/traffic/summary', ['rootserver' => $rootserver], $query, null, false, true);
    }

    /**
     * Get VNC console URL
     * GET /products/rootserver/{rootserver}/vnc
     * Permissions: rootservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a VNC websocket URL for console access.
     *
     * @param  string  $rootserver  rootserver route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function vnc(string $rootserver, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/rootserver/{rootserver}/vnc', ['rootserver' => $rootserver], $query, null, false, true);
    }
}
