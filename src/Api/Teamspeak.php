<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Teamspeak
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all TeamSpeak instances
     * GET /products/teamspeak/instances
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all TeamSpeak instances for the authenticated reseller.
     *
     * @param  array{status?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/instances', [], $query, null, false, true);
    }

    /**
     * Create a new TeamSpeak instance
     * POST /products/teamspeak/instances/create
     * Permissions: teamspeak:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new TeamSpeak instance. The instance will be provisioned asynchronously via the configured provider.
     *
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesCreate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/create', [], $query, $body, false, true);
    }

    /**
     * Show TeamSpeak instance details
     * GET /products/teamspeak/instances/{instance}
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific TeamSpeak instance including connection credentials.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesShow(string $instance, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/instances/{instance}', ['instance' => $instance], $query, null, false, true);
    }

    /**
     * Reset instance password
     * POST /products/teamspeak/instances/{instance}/reset-password
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Resets the ServerQuery admin password for the instance.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesResetPassword(string $instance, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/{instance}/reset-password', ['instance' => $instance], $query, $body, false, true);
    }

    /**
     * Start a TeamSpeak instance
     * POST /products/teamspeak/instances/{instance}/start
     * Permissions: teamspeak:power
     * Response: json; json() preserves the full envelope and pagination.
     * Starts a stopped TeamSpeak instance.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesStart(string $instance, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/{instance}/start', ['instance' => $instance], $query, $body, false, true);
    }

    /**
     * Get instance statistics
     * GET /products/teamspeak/instances/{instance}/statistics
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns slot usage statistics and snapshots for the last 7 days.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesStatistics(string $instance, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/instances/{instance}/statistics', ['instance' => $instance], $query, null, false, true);
    }

    /**
     * Stop a TeamSpeak instance
     * POST /products/teamspeak/instances/{instance}/stop
     * Permissions: teamspeak:power
     * Response: json; json() preserves the full envelope and pagination.
     * Stops a running TeamSpeak instance.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesStop(string $instance, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/{instance}/stop', ['instance' => $instance], $query, $body, false, true);
    }

    /**
     * Terminate a TeamSpeak instance
     * POST /products/teamspeak/instances/{instance}/terminate
     * Permissions: teamspeak:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Terminates a TeamSpeak instance. Admin-locked instances cannot be terminated.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesTerminate(string $instance, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/{instance}/terminate', ['instance' => $instance], $query, $body, false, true);
    }

    /**
     * Get instance virtual servers
     * GET /products/teamspeak/instances/{instance}/virtualservers
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the virtual servers running on the instance.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesVirtualservers(string $instance, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/instances/{instance}/virtualservers', ['instance' => $instance], $query, null, false, true);
    }

    /**
     * Get instance whitelist
     * GET /products/teamspeak/instances/{instance}/whitelist
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current IP whitelist for the instance.
     *
     * @param  string  $instance  Instance ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesWhitelist(string $instance, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/instances/{instance}/whitelist', ['instance' => $instance], $query, null, false, true);
    }

    /**
     * Add IP to whitelist
     * POST /products/teamspeak/instances/{instance}/whitelist/add
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds an IP address to the instance whitelist.
     *
     * @param  string  $instance  Instance ID
     * @param  array{ip: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesWhitelistAdd(string $instance, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/{instance}/whitelist/add', ['instance' => $instance], $query, $body, false, true);
    }

    /**
     * Remove IP from whitelist
     * POST /products/teamspeak/instances/{instance}/whitelist/remove
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes an IP address from the instance whitelist.
     *
     * @param  string  $instance  Instance ID
     * @param  array{ip: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function instancesWhitelistRemove(string $instance, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/instances/{instance}/whitelist/remove', ['instance' => $instance], $query, $body, false, true);
    }

    /**
     * List TeamSpeak prices
     * GET /products/teamspeak/prices
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all active TeamSpeak prices for servers and instances, including reseller-specific pricing if configured.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function prices(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/prices', [], $query, null, false, true);
    }

    /**
     * List all TeamSpeak servers
     * GET /products/teamspeak/servers
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all TeamSpeak virtual servers for the authenticated reseller.
     *
     * @param  array{status?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers', [], $query, null, false, true);
    }

    /**
     * Create a new TeamSpeak server
     * POST /products/teamspeak/servers/create
     * Permissions: teamspeak:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new TeamSpeak virtual server. The server will be provisioned asynchronously on an available node.
     *
     * @param  array{name: string, slots: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversCreate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/create', [], $query, $body, false, true);
    }

    /**
     * Show TeamSpeak server details
     * GET /products/teamspeak/servers/{server}
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific TeamSpeak virtual server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}', ['server' => $server], $query, null, false, true);
    }

    /**
     * List bans
     * GET /products/teamspeak/servers/{server}/bans
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a list of all bans on the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversBans(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/bans', ['server' => $server], $query, null, false, true);
    }

    /**
     * Clear all bans
     * POST /products/teamspeak/servers/{server}/bans/clear
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes all bans from the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversBansClear(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/bans/clear', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Create a ban
     * POST /products/teamspeak/servers/{server}/bans/create
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new ban rule on the TeamSpeak server. At least one of ip, name, or uid must be provided.
     *
     * @param  string  $server  Server ID
     * @param  array{ip?: string|null, name?: string|null, uid?: string|null, duration?: int|null, reason?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversBansCreate(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/bans/create', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete a ban
     * POST /products/teamspeak/servers/{server}/bans/{banId}/delete
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a specific ban rule from the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  int  $banId  Ban ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversBansDelete(string $server, int $banId, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/bans/{banId}/delete', ['server' => $server, 'banId' => $banId], $query, $body, false, true);
    }

    /**
     * Get channel tree
     * GET /products/teamspeak/servers/{server}/channels
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the channel tree with nested sub-channels for a running server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversChannels(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/channels', ['server' => $server], $query, null, false, true);
    }

    /**
     * Create a channel
     * POST /products/teamspeak/servers/{server}/channels/create
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new channel on the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array{name: string, parent_id?: int|null, password?: string|null, max_clients?: int|null, topic?: string|null, description?: string|null, codec?: int|null, codec_quality?: int|null, is_permanent?: bool|null, is_semi_permanent?: bool|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversChannelsCreate(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/channels/create', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Get channel details
     * GET /products/teamspeak/servers/{server}/channels/{cid}
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific channel.
     *
     * @param  string  $server  Server ID
     * @param  int  $cid  Channel ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversChannelsShow(string $server, int $cid, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/channels/{cid}', ['server' => $server, 'cid' => $cid], $query, null, false, true);
    }

    /**
     * Update a channel
     * PATCH /products/teamspeak/servers/{server}/channels/{cid}
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates properties of an existing channel.
     *
     * @param  string  $server  Server ID
     * @param  int  $cid  Channel ID
     * @param  array{name: string, password?: string|null, max_clients?: int|null, topic?: string|null, description?: string|null, codec?: int|null, codec_quality?: int|null, is_permanent?: bool|null, is_semi_permanent?: bool|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversChannelsUpdate(string $server, int $cid, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/teamspeak/servers/{server}/channels/{cid}', ['server' => $server, 'cid' => $cid], $query, $body, false, true);
    }

    /**
     * Delete a channel
     * POST /products/teamspeak/servers/{server}/channels/{cid}/delete
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a channel from the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  int  $cid  Channel ID
     * @param  array{force?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversChannelsDelete(string $server, int $cid, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/channels/{cid}/delete', ['server' => $server, 'cid' => $cid], $query, $body, false, true);
    }

    /**
     * List connected clients
     * GET /products/teamspeak/servers/{server}/clients
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a list of all connected clients on a running TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversClients(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/clients', ['server' => $server], $query, null, false, true);
    }

    /**
     * Kick a client
     * POST /products/teamspeak/servers/{server}/clients/kick
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Kicks a connected client from the server or channel.
     *
     * @param  string  $server  Server ID
     * @param  array{clid: int, reason?: string|null, type?: 'server'|'channel'|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversClientsKick(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/clients/kick', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Move a client
     * POST /products/teamspeak/servers/{server}/clients/move
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Moves a connected client to a different channel.
     *
     * @param  string  $server  Server ID
     * @param  array{clid: int, cid: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversClientsMove(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/clients/move', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Poke a client
     * POST /products/teamspeak/servers/{server}/clients/poke
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Sends a poke message to a connected client.
     *
     * @param  string  $server  Server ID
     * @param  array{clid: int, message: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversClientsPoke(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/clients/poke', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List complaints
     * GET /products/teamspeak/servers/{server}/complaints
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a list of all complaints on the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversComplaints(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/complaints', ['server' => $server], $query, null, false, true);
    }

    /**
     * Delete all complaints about a client
     * POST /products/teamspeak/servers/{server}/complaints/{tcldbid}/delete-all
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes all complaints about a specific client.
     *
     * @param  string  $server  Server ID
     * @param  int  $tcldbid  Target client DB ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversComplaintsDeleteAll(string $server, int $tcldbid, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/complaints/{tcldbid}/delete-all', ['server' => $server, 'tcldbid' => $tcldbid], $query, $body, false, true);
    }

    /**
     * Delete a complaint
     * POST /products/teamspeak/servers/{server}/complaints/{tcldbid}/{fcldbid}/delete
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a specific complaint from the TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  int  $tcldbid  Target client DB ID
     * @param  int  $fcldbid  Source client DB ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversComplaintsDelete(string $server, int $tcldbid, int $fcldbid, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/complaints/{tcldbid}/{fcldbid}/delete', ['server' => $server, 'tcldbid' => $tcldbid, 'fcldbid' => $fcldbid], $query, $body, false, true);
    }

    /**
     * Delete a TeamSpeak server
     * POST /products/teamspeak/servers/{server}/delete
     * Permissions: teamspeak:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently deletes a TeamSpeak virtual server. Admin-locked servers cannot be deleted.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversDelete(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/delete', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Update server settings
     * PATCH /products/teamspeak/servers/{server}/settings
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates server properties like name, welcome message, and host banner.
     *
     * @param  string  $server  Server ID
     * @param  array{name?: string, welcome_message?: string|null, hostbanner_url?: string|null, hostbanner_gfx_url?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversSettingsUpdate(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/teamspeak/servers/{server}/settings', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Start a TeamSpeak server
     * POST /products/teamspeak/servers/{server}/start
     * Permissions: teamspeak:power
     * Response: json; json() preserves the full envelope and pagination.
     * Starts a stopped TeamSpeak virtual server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversStart(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/start', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Get server statistics
     * GET /products/teamspeak/servers/{server}/stats
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns connection statistics and live data for a running server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversStats(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/stats', ['server' => $server], $query, null, false, true);
    }

    /**
     * Get historical statistics
     * GET /products/teamspeak/servers/{server}/stats/history
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns historical server statistics for a given time period.
     *
     * @param  string  $server  Server ID
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversStatsHistory(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/stats/history', ['server' => $server], $query, null, false, true);
    }

    /**
     * Stop a TeamSpeak server
     * POST /products/teamspeak/servers/{server}/stop
     * Permissions: teamspeak:power
     * Response: json; json() preserves the full envelope and pagination.
     * Stops a running TeamSpeak virtual server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversStop(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/stop', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List tokens
     * GET /products/teamspeak/servers/{server}/tokens
     * Permissions: teamspeak:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a list of all privilege keys (tokens) and server groups.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversTokens(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/teamspeak/servers/{server}/tokens', ['server' => $server], $query, null, false, true);
    }

    /**
     * Create a token
     * POST /products/teamspeak/servers/{server}/tokens/create
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new privilege key (token) for a server or channel group.
     *
     * @param  string  $server  Server ID
     * @param  array{type: 0|1, group_id: int, description?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversTokensCreate(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/tokens/create', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete a token
     * POST /products/teamspeak/servers/{server}/tokens/delete
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a privilege key (token) from the server.
     *
     * @param  string  $server  Server ID
     * @param  array{token: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversTokensDelete(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/tokens/delete', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Update TSDNS hostname
     * PATCH /products/teamspeak/servers/{server}/tsdns
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Sets or updates the TSDNS hostname for a TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array{hostname: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversTsdnsUpdate(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/teamspeak/servers/{server}/tsdns', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Remove TSDNS hostname
     * POST /products/teamspeak/servers/{server}/tsdns/remove
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes the TSDNS hostname from a TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversTsdnsRemove(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/teamspeak/servers/{server}/tsdns/remove', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Upgrade or downgrade server slots
     * PATCH /products/teamspeak/servers/{server}/upgrade
     * Permissions: teamspeak:update
     * Response: json; json() preserves the full envelope and pagination.
     * Changes the slot count of a running TeamSpeak server.
     *
     * @param  string  $server  Server ID
     * @param  array{slots: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function serversUpgrade(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/teamspeak/servers/{server}/upgrade', ['server' => $server], $query, $body, false, true);
    }
}
