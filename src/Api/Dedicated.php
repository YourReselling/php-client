<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Dedicated
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List dedicated locations
     * GET /products/dedicated/locations
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all active dedicated server locations.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locations(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/locations', [], $query, null, false, true);
    }

    /**
     * List dedicated plans
     * GET /products/dedicated/plans
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns available dedicated server plans with the reseller sell price.
     *
     * @param  array{location_id?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function plans(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/plans', [], $query, null, false, true);
    }

    /**
     * Show dedicated plan
     * GET /products/dedicated/plans/{plan}
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns details and pricing for a single plan.
     *
     * @param  string  $plan  plan route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function plansShow(string $plan, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/plans/{plan}', ['plan' => $plan], $query, null, false, true);
    }

    /**
     * List dedicated servers
     * GET /products/dedicated/servers
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of the reseller's dedicated servers.
     *
     * @param  array{status?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers', [], $query, null, false, true);
    }

    /**
     * Order a dedicated server
     * POST /products/dedicated/servers
     * Permissions: dedicated:create
     * Response: json; json() preserves the full envelope and pagination.
     * Provisions a new dedicated server from a plan and assigns panel-managed IPs.
     *
     * @param  array{plan_id: string, hostname: string, ipv4_count?: int|null, ipv6_count?: int|null, os_profile_id?: int|null, root_password?: string|null, auto_renew?: bool|null, disk_layout_id?: int|null, team_id?: string|null, traffic_upgrade_key?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversStore(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers', [], $query, $body, false, true);
    }

    /**
     * Cancel a dedicated server
     * DELETE /products/dedicated/servers/{server}
     * Permissions: dedicated:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Terminates a dedicated server and releases its IPs.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversDestroy(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/dedicated/servers/{server}', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Show dedicated server
     * GET /products/dedicated/servers/{server}
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a dedicated server.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}', ['server' => $server], $query, null, false, true);
    }

    /**
     * Queue an agent command
     * POST /products/dedicated/servers/{server}/agent/command
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Queues a command for the on-server agent (e.g. list_services, service_restart, list_processes, kill_process, list_firewall, firewall_open, firewall_close, set_hostname, reset_password, command). Returns a task id to poll for the result.
     *
     * @param  string  $server  server route parameter
     * @param  array{action: string, target?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function agentCommand(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/agent/command', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Get agent install command
     * GET /products/dedicated/servers/{server}/agent/install
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the white-label one-liner (Linux + Windows) to manually install the monitoring agent on the server, plus whether the agent is currently online.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function agentInstall(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/agent/install', ['server' => $server], $query, null, false, true);
    }

    /**
     * Get agent command result
     * GET /products/dedicated/servers/{server}/agent/result/{task}
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the status and (parsed) result of a previously queued agent command.
     *
     * @param  string  $server  server route parameter
     * @param  string  $task  task route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function agentResult(string $server, string $task, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/agent/result/{task}', ['server' => $server, 'task' => $task], $query, null, false, true);
    }

    /**
     * Toggle auto-renew
     * POST /products/dedicated/servers/{server}/auto-renew
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Enables or disables automatic renewal for a term-based server.
     *
     * @param  string  $server  server route parameter
     * @param  array{enabled: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function autoRenew(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/auto-renew', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Get KVM/VNC console URL
     * GET /products/dedicated/servers/{server}/console
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a time-limited KVM/VNC console URL for the server.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function consoleShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/console', ['server' => $server], $query, null, false, true);
    }

    /**
     * Remove an IP
     * DELETE /products/dedicated/servers/{server}/ips
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes an IP assignment and returns it to the pool.
     *
     * @param  string  $server  server route parameter
     * @param  array{address: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsRemove(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/dedicated/servers/{server}/ips', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Assign IPs
     * POST /products/dedicated/servers/{server}/ips
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Assigns additional panel-managed IPs to the server.
     *
     * @param  string  $server  server route parameter
     * @param  array{addresses: list<string>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsAssign(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/ips', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List assignable IPs
     * GET /products/dedicated/servers/{server}/ips/assignable
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns free panel-managed IPs at the server's location that can be assigned.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ipsAssignable(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/ips/assignable', ['server' => $server], $query, null, false, true);
    }

    /**
     * Get live network state
     * GET /products/dedicated/servers/{server}/network
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the server's live IP assignments (from the provider), power status, primary IP and provider capabilities.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function networkShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/network', ['server' => $server], $query, null, false, true);
    }

    /**
     * List OS templates
     * GET /products/dedicated/servers/{server}/os-templates
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the available OS and rescue profiles for reinstalling the server.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reinstallTemplates(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/os-templates', ['server' => $server], $query, null, false, true);
    }

    /**
     * Get power status
     * GET /products/dedicated/servers/{server}/power
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current power status of the server.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function powerStatus(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/power', ['server' => $server], $query, null, false, true);
    }

    /**
     * Perform power action
     * POST /products/dedicated/servers/{server}/power/{action}
     * Permissions: dedicated:power
     * Response: json; json() preserves the full envelope and pagination.
     * Performs a power action: start, stop or restart.
     *
     * @param  string  $server  server route parameter
     * @param  string  $action  action route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function powerAction(string $server, string $action, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/power/{action}', ['server' => $server, 'action' => $action], $query, $body, false, true);
    }

    /**
     * Delete PTR record
     * DELETE /products/dedicated/servers/{server}/rdns
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes the reverse DNS (PTR) record for an IP.
     *
     * @param  string  $server  server route parameter
     * @param  array{ip: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rdnsDestroy(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/dedicated/servers/{server}/rdns', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Get PTR record
     * GET /products/dedicated/servers/{server}/rdns
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the reverse DNS (PTR) record for an IP.
     *
     * @param  string  $server  server route parameter
     * @param  array{ip: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rdnsShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/rdns', ['server' => $server], $query, null, false, true);
    }

    /**
     * Set PTR record
     * POST /products/dedicated/servers/{server}/rdns
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Sets the reverse DNS (PTR) record for an IP.
     *
     * @param  string  $server  server route parameter
     * @param  array{ip: string, ptr: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rdnsStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/rdns', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Start reinstall
     * POST /products/dedicated/servers/{server}/reinstall
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Starts an OS reinstall with the selected profile.
     *
     * @param  string  $server  server route parameter
     * @param  array{profile_id: int, root_password?: string|null, disk_layout_id?: int|null, with_agent?: bool|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reinstallStart(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/reinstall', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Abort reinstall
     * POST /products/dedicated/servers/{server}/reinstall/abort
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Aborts a running reinstall.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reinstallAbort(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/reinstall/abort', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Rename a dedicated server
     * PATCH /products/dedicated/servers/{server}/rename
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the display name of a dedicated server.
     *
     * @param  string  $server  server route parameter
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversRename(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/dedicated/servers/{server}/rename', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List SSH keys
     * GET /products/dedicated/servers/{server}/ssh-keys
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the SSH public keys registered for the server.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sshKeysIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/ssh-keys', ['server' => $server], $query, null, false, true);
    }

    /**
     * Add an SSH key
     * POST /products/dedicated/servers/{server}/ssh-keys
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Registers an SSH public key and queues the agent to install it on the server.
     *
     * @param  string  $server  server route parameter
     * @param  array{name: string, public_key: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sshKeysStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/ssh-keys', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete an SSH key
     * DELETE /products/dedicated/servers/{server}/ssh-keys/{key}
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes an SSH key and queues the agent to strip it from the server.
     *
     * @param  string  $server  server route parameter
     * @param  string  $key  key route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sshKeysDestroy(string $server, string $key, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/dedicated/servers/{server}/ssh-keys/{key}', ['server' => $server, 'key' => $key], $query, $body, false, true);
    }

    /**
     * Get server stats
     * GET /products/dedicated/servers/{server}/stats
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the live agent snapshot (CPU/RAM/disk/uptime, per-core, per-disk, per-interface) and a historical time series for the given range.
     *
     * @param  string  $server  server route parameter
     * @param  array{range?: string, max_points?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function statsShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/stats', ['server' => $server], $query, null, false, true);
    }

    /**
     * List scheduled tasks
     * GET /products/dedicated/servers/{server}/tasks
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the scheduled agent tasks for the server.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function tasksIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/tasks', ['server' => $server], $query, null, false, true);
    }

    /**
     * Create a scheduled task
     * POST /products/dedicated/servers/{server}/tasks
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Schedules an agent task (action command|reboot|shutdown|poweron) as a one-off (run_at) or recurring cron job (cron_expression).
     *
     * @param  string  $server  server route parameter
     * @param  array{name: string, action: 'command'|'reboot'|'shutdown'|'poweron', command?: string|null, schedule_type: 'once'|'cron', run_at?: string|null, cron_expression?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function tasksStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/tasks', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete a scheduled task
     * DELETE /products/dedicated/servers/{server}/tasks/{task}
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a scheduled agent task.
     *
     * @param  string  $server  server route parameter
     * @param  string  $task  task route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function tasksDestroy(string $server, string $task, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/dedicated/servers/{server}/tasks/{task}', ['server' => $server, 'task' => $task], $query, $body, false, true);
    }

    /**
     * Get traffic statistics
     * GET /products/dedicated/servers/{server}/traffic
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the traffic series for the selected window (24h, 7d, 30d).
     *
     * @param  string  $server  server route parameter
     * @param  array{window?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function trafficShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/traffic', ['server' => $server], $query, null, false, true);
    }

    /**
     * Get pending updates
     * GET /products/dedicated/servers/{server}/updates
     * Permissions: dedicated:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the pending package updates last reported by the agent (counts, package manager, per-package list incl. security/CVE flags).
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function updatesStatus(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/dedicated/servers/{server}/updates', ['server' => $server], $query, null, false, true);
    }

    /**
     * Install updates
     * POST /products/dedicated/servers/{server}/updates/install
     * Permissions: dedicated:update
     * Response: json; json() preserves the full envelope and pagination.
     * Queues installation of pending updates. Set security_only=true for security updates only. The agent applies them and re-reports afterwards. Returns a task id.
     *
     * @param  string  $server  server route parameter
     * @param  array{security_only?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function updatesInstall(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/dedicated/servers/{server}/updates/install', ['server' => $server], $query, $body, false, true);
    }
}
