<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Ipv6
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List IPv6 subnets
     * GET /products/ipv6
     * Permissions: ipv6:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all IPv6 subnet assignments for the authenticated reseller.
     *
     * @param  array{status?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ipv6', [], $query, null, false, true);
    }

    /**
     * Order IPv6 subnet
     * POST /products/ipv6/order
     * Permissions: ipv6:create
     * Response: json; json() preserves the full envelope and pagination.
     * Orders a new IPv6 subnet from an available pool. The subnet will be automatically provisioned and RIPE objects created.
     *
     * @param  array{ip_pool_id: string, ripe_organisation_id: string, ripe_contact_id?: string|null, ripe_abuse_contact_id?: string|null, country?: string|null, asns?: list<array{asn: string, label?: string|null, enable_routing?: bool}>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/order', [], $query, $body, false, true);
    }

    /**
     * List available IPv6 pools
     * GET /products/ipv6/pools
     * Permissions: ipv6:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all IPv6 IP pools available for ordering, including pricing.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pools(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ipv6/pools', [], $query, null, false, true);
    }

    /**
     * Show IPv6 subnet details
     * GET /products/ipv6/{assignment}
     * Permissions: ipv6:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific IPv6 subnet assignment including ASNs, allocations, and RIPE objects.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $assignment, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ipv6/{assignment}', ['assignment' => $assignment], $query, null, false, true);
    }

    /**
     * Create sub-allocation
     * POST /products/ipv6/{assignment}/allocations
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a sub-allocation within an IPv6 subnet. The subnet must be within the parent assignment. Creates a RIPE inetnum object.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array{subnet: string, prefix_length: int, netname?: string|null, description?: string|null, country?: string|null, origin_asn?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function allocationsStore(string $assignment, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/allocations', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Delete sub-allocation
     * DELETE /products/ipv6/{assignment}/allocations/{allocation}
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a sub-allocation and removes its RIPE inetnum object.
     *
     * @param  string  $assignment  Assignment ID
     * @param  string  $allocation  Allocation ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function allocationsDestroy(string $assignment, string $allocation, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/ipv6/{assignment}/allocations/{allocation}', ['assignment' => $assignment, 'allocation' => $allocation], $query, $body, false, true);
    }

    /**
     * List subnet ASNs
     * GET /products/ipv6/{assignment}/asns
     * Permissions: ipv6:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all ASN entries for a specific IPv6 subnet.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsIndex(string $assignment, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ipv6/{assignment}/asns', ['assignment' => $assignment], $query, null, false, true);
    }

    /**
     * Add ASN to subnet
     * POST /products/ipv6/{assignment}/asns
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds an ASN entry to an IPv6 subnet. Optionally enables routing and creates RIPE route6 + RPKI ROA.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array{asn: string, label?: string|null, enable_routing?: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsStore(string $assignment, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/asns', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Remove ASN from subnet
     * DELETE /products/ipv6/{assignment}/asns/{asn_entry}
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes an ASN entry from an IPv6 subnet. Cleans up RPKI ROA and RIPE route6 objects if active.
     *
     * @param  string  $assignment  Assignment ID
     * @param  string  $asn_entry  ASN entry ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsDestroy(string $assignment, string $asn_entry, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/ipv6/{assignment}/asns/{asn_entry}', ['assignment' => $assignment, 'asn_entry' => $asn_entry], $query, $body, false, true);
    }

    /**
     * Generate ASN LOA
     * POST /products/ipv6/{assignment}/asns/{asn_entry}/loa/generate
     * Permissions: ipv6:read
     * Response: json; json() preserves the full envelope and pagination.
     * Generates a Letter of Authorization (LOA) for a specific ASN on an IPv6 subnet.
     *
     * @param  string  $assignment  Assignment ID
     * @param  string  $asn_entry  ASN entry ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsLoaGenerate(string $assignment, string $asn_entry, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/asns/{asn_entry}/loa/generate', ['assignment' => $assignment, 'asn_entry' => $asn_entry], $query, $body, false, true);
    }

    /**
     * Revoke ASN LOA
     * POST /products/ipv6/{assignment}/asns/{asn_entry}/loa/revoke
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Revokes the Letter of Authorization for a specific ASN on an IPv6 subnet.
     *
     * @param  string  $assignment  Assignment ID
     * @param  string  $asn_entry  ASN entry ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsLoaRevoke(string $assignment, string $asn_entry, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/asns/{asn_entry}/loa/revoke', ['assignment' => $assignment, 'asn_entry' => $asn_entry], $query, $body, false, true);
    }

    /**
     * Disable ASN routing
     * POST /products/ipv6/{assignment}/asns/{asn_entry}/routing/disable
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Disables BGP routing for a specific ASN on an IPv6 subnet. Removes RPKI ROA and RIPE route6 object.
     *
     * @param  string  $assignment  Assignment ID
     * @param  string  $asn_entry  ASN entry ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsRoutingDisable(string $assignment, string $asn_entry, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/asns/{asn_entry}/routing/disable', ['assignment' => $assignment, 'asn_entry' => $asn_entry], $query, $body, false, true);
    }

    /**
     * Enable ASN routing
     * POST /products/ipv6/{assignment}/asns/{asn_entry}/routing/enable
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Enables BGP routing for a specific ASN on an IPv6 subnet. Creates a RIPE route6 object and RPKI ROA.
     *
     * @param  string  $assignment  Assignment ID
     * @param  string  $asn_entry  ASN entry ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function asnsRoutingEnable(string $assignment, string $asn_entry, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/asns/{asn_entry}/routing/enable', ['assignment' => $assignment, 'asn_entry' => $asn_entry], $query, $body, false, true);
    }

    /**
     * Update geofeed
     * PATCH /products/ipv6/{assignment}/geofeed
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the geofeed location data for an IPv6 subnet. A unique geofeed URL is generated automatically.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array{country: string, region?: string|null, city?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function geofeed(string $assignment, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/ipv6/{assignment}/geofeed', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Update subnet label
     * PATCH /products/ipv6/{assignment}/label
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the label of an IPv6 subnet. The label is also synced as netname in RIPE if RIPE objects exist.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array{label?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function label(string $assignment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/ipv6/{assignment}/label', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Generate LOA
     * POST /products/ipv6/{assignment}/loa/generate
     * Permissions: ipv6:read
     * Response: json; json() preserves the full envelope and pagination.
     * Generates a Letter of Authorization (LOA) PDF for the IPv6 subnet. Valid for 365 days.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function loaGenerate(string $assignment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/loa/generate', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Revoke LOA
     * POST /products/ipv6/{assignment}/loa/revoke
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Revokes the current Letter of Authorization for the IPv6 subnet.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function loaRevoke(string $assignment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/loa/revoke', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Update rDNS delegation
     * PATCH /products/ipv6/{assignment}/rdns
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the reverse DNS delegation mode and nameservers for an IPv6 subnet.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array{rdns_mode: 'vexura'|'custom'|'none', nameservers?: list<string>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rdns(string $assignment, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/ipv6/{assignment}/rdns', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Disable subnet routing
     * POST /products/ipv6/{assignment}/routing/disable
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Disables BGP routing for the IPv6 subnet. Deletes the RIPE route6 object.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function routingDisable(string $assignment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/routing/disable', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Enable subnet routing
     * POST /products/ipv6/{assignment}/routing/enable
     * Permissions: ipv6:update
     * Response: json; json() preserves the full envelope and pagination.
     * Enables BGP routing for the IPv6 subnet. A primary ASN (origin_asn) must be set. Creates a RIPE route6 object.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function routingEnable(string $assignment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/routing/enable', ['assignment' => $assignment], $query, $body, false, true);
    }

    /**
     * Terminate subnet
     * POST /products/ipv6/{assignment}/terminate
     * Permissions: ipv6:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Requests termination of an IPv6 subnet. The subnet will be terminated at the end of the current billing period.
     *
     * @param  string  $assignment  Assignment ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function terminate(string $assignment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ipv6/{assignment}/terminate', ['assignment' => $assignment], $query, $body, false, true);
    }
}
