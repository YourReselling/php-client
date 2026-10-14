<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class IpTunnels
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List IP tunnels
     * GET /products/ip-tunnels
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all IP tunnels belonging to the authenticated reseller.
     *
     * @param  array{status?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels', [], $query, null, false, true);
    }

    /**
     * Create IP tunnel
     * POST /products/ip-tunnels
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new IP tunnel, allocates IPs from the pool and provisions the tunnel on the Go service. The `peer_endpoint` is required for GRE, IPIP and L2TP protocols.
     *
     * @param  array{name: string, location_id: string, protocol: 'wireguard'|'gre'|'ipip'|'l2tp', ip_count: int, prefer_consecutive?: bool, ipv6_enabled?: bool, peer_endpoint?: string|null, traffic_limit_gb?: int|null, traffic_limit_action?: 'throttle'|'block'|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ip-tunnels', [], $query, $body, false, true);
    }

    /**
     * List available locations
     * GET /products/ip-tunnels/locations
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all active IP-Tunnel locations with their pricing.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locations(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/locations', [], $query, null, false, true);
    }

    /**
     * Check location availability
     * GET /products/ip-tunnels/locations/{locationId}/availability
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the number of available IPv4 addresses, whether consecutive IPs are available, and IPv6 subnet availability for a given location.
     *
     * @param  string  $locationId  Location UUID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locationAvailability(string $locationId, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/locations/{locationId}/availability', ['locationId' => $locationId], $query, null, false, true);
    }

    /**
     * Terminate IP tunnel
     * DELETE /products/ip-tunnels/{id}
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently terminates the tunnel and releases all allocated IP addresses back to the pool.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $id, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/ip-tunnels/{id}', ['id' => $id], $query, $body, false, true);
    }

    /**
     * Get IP tunnel details
     * GET /products/ip-tunnels/{id}
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}', ['id' => $id], $query, null, false, true);
    }

    /**
     * Update tunnel settings
     * PUT /products/ip-tunnels/{id}
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Update the tunnel name or peer endpoint. All fields are optional.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array{name?: string|null, peer_endpoint?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $id, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/ip-tunnels/{id}', ['id' => $id], $query, $body, false, true);
    }

    /**
     * Get tunnel abuse events
     * GET /products/ip-tunnels/{id}/abuse
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function abuse(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}/abuse', ['id' => $id], $query, null, false, true);
    }

    /**
     * Get WireGuard config
     * GET /products/ip-tunnels/{id}/config
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the Linux wg-quick configuration in data.config and a suggested data.filename. Source-based routing preserves the existing default route.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function config(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}/config', ['id' => $id], $query, null, false, true);
    }

    /**
     * Get DDoS alerts for tunnel
     * GET /products/ip-tunnels/{id}/ddos
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns DDoS attack alerts for the allocated IP addresses of this tunnel.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ddos(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}/ddos', ['id' => $id], $query, null, false, true);
    }

    /**
     * Get protocol-specific setup guide
     * GET /products/ip-tunnels/{id}/guide
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a structured, copy-paste-ready setup guide for the tunnel's protocol with all real values (server IP, allocated IPs, keys) already filled in.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function guide(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}/guide', ['id' => $id], $query, null, false, true);
    }

    /**
     * Set rDNS for allocated IP
     * POST /products/ip-tunnels/{id}/rdns
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array{allocated_ip_id: string, rdns: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function setRdns(string $id, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ip-tunnels/{id}/rdns', ['id' => $id], $query, $body, false, true);
    }

    /**
     * Remove rDNS for allocated IP
     * DELETE /products/ip-tunnels/{id}/rdns/{allocatedIpId}
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $id  Tunnel UUID
     * @param  string  $allocatedIpId  Allocated IP UUID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function removeRdns(string $id, string $allocatedIpId, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/ip-tunnels/{id}/rdns/{allocatedIpId}', ['id' => $id, 'allocatedIpId' => $allocatedIpId], $query, $body, false, true);
    }

    /**
     * Regenerate WireGuard keys
     * POST /products/ip-tunnels/{id}/regenerate
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Generates a new server key pair and updates the Go service. Only available for WireGuard tunnels. Download the new config after calling this.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function regenerate(string $id, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ip-tunnels/{id}/regenerate', ['id' => $id], $query, $body, false, true);
    }

    /**
     * Suspend IP tunnel
     * POST /products/ip-tunnels/{id}/suspend
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Suspends an active tunnel. Traffic through the tunnel is blocked.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function suspend(string $id, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ip-tunnels/{id}/suspend', ['id' => $id], $query, $body, false, true);
    }

    /**
     * Get tunnel traffic records
     * GET /products/ip-tunnels/{id}/traffic
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns raw traffic records (bytes_in / bytes_out per interval) for the tunnel, starting from the given date.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array{since?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function traffic(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}/traffic', ['id' => $id], $query, null, false, true);
    }

    /**
     * Get bucketed traffic history
     * GET /products/ip-tunnels/{id}/traffic/history
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     * Returns traffic data aggregated into time buckets for graphing. Period: hour (5min buckets), day (30min), week (3h), month (1d).
     *
     * @param  string  $id  Tunnel UUID
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function trafficHistory(string $id, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ip-tunnels/{id}/traffic/history', ['id' => $id], $query, null, false, true);
    }

    /**
     * Unsuspend IP tunnel
     * POST /products/ip-tunnels/{id}/unsuspend
     * Permissions: Public endpoint; no API key is sent.
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $id  Tunnel UUID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function unsuspend(string $id, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ip-tunnels/{id}/unsuspend', ['id' => $id], $query, $body, false, true);
    }
}
