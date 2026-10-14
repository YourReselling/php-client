<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Domains
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all domains
     * GET /products/domains
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all domains for the authenticated reseller.
     *
     * @param  array{status?: 'pending'|'processing'|'active'|'expired'|'cancelled'|'failed', tld?: string, search?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains', [], $query, null, false, true);
    }

    /**
     * List domain catch requests
     * GET /products/domains/catch
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get a list of all domain catch requests for the reseller.
     *
     * @param  array{status?: 'pending'|'monitoring'|'attempting'|'success'|'failed'|'cancelled', page?: int, per_page?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catchIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/catch', [], $query, null, false, true);
    }

    /**
     * Create domain catch request
     * POST /products/domains/catch/create
     * Permissions: domains:create
     * Response: json; json() preserves the full envelope and pagination.
     * Create a new domain catch request to monitor and automatically register an expiring/deleted domain. A catch fee of 5 EUR will be charged immediately.
     *
     * @param  array{domain: string, handle_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catchStore(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/catch/create', [], $query, $body, false, true);
    }

    /**
     * Get catch request details
     * GET /products/domains/catch/{catch}
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get detailed information about a specific domain catch request.
     *
     * @param  string  $catch  Catch request ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catchShow(string $catch, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/catch/{catch}', ['catch' => $catch], $query, null, false, true);
    }

    /**
     * Cancel catch request
     * POST /products/domains/catch/{catch}/cancel
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Cancel an active domain catch request. Note: The catch fee is non-refundable.
     *
     * @param  string  $catch  Catch request ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catchCancel(string $catch, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/catch/{catch}/cancel', ['catch' => $catch], $query, $body, false, true);
    }

    /**
     * Check domain availability
     * GET /products/domains/check
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Check if a single domain is available for registration.
     *
     * @param  array{domain: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function check(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/check', [], $query, null, false, true);
    }

    /**
     * Bulk check domain availability
     * POST /products/domains/check-bulk
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Check availability of multiple domains at once (max 50).
     *
     * @param  array{domains: list<string>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function checkBulk(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/check-bulk', [], $query, $body, false, true);
    }

    /**
     * Register a new domain
     * POST /products/domains/create
     * Permissions: domains:create
     * Response: json; json() preserves the full envelope and pagination.
     * Register a new domain with the specified handle and nameservers.
     *
     * @param  array{domain: string, handle_id: string, nameservers?: list<string>|null, years?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function register(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/create', [], $query, $body, false, true);
    }

    /**
     * Get supported DNS record types
     * GET /products/domains/dns/record-types
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all DNS record types supported by the DNS provider (ClouDNS), each with a description. NS and SOA are excluded since they are managed automatically.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsRecordTypes(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/dns/record-types', [], $query, null, false, true);
    }

    /**
     * List domain handles
     * GET /products/domains/handles
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get a list of all domain handles (contacts) for the reseller.
     *
     * @param  array{page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function handlesIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/handles', [], $query, null, false, true);
    }

    /**
     * Create domain handle
     * POST /products/domains/handles/create
     * Permissions: domains:create
     * Response: json; json() preserves the full envelope and pagination.
     * Create a new domain handle (contact) for domain registration. The `type` field controls whether this is a personal (`individual`) or company (`organization`) contact. When `type` is `organization`, the `organization` field is required. The `house_number`, `fax`, `state`, and `is_default` fields are optional for both types.
     *
     * @param  array{type: 'individual'|'organization', first_name: string, last_name: string, organization?: string|null, email: string, phone: string, fax?: string|null, street: string, house_number?: string|null, postal_code: string, city: string, state?: string|null, country_code: string, is_default?: bool|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function handlesStore(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/handles/create', [], $query, $body, false, true);
    }

    /**
     * Get handle details
     * GET /products/domains/handles/{handle}
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get detailed information about a specific domain handle.
     *
     * @param  string  $handle  Handle ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function handlesShow(string $handle, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/handles/{handle}', ['handle' => $handle], $query, null, false, true);
    }

    /**
     * Delete domain handle
     * DELETE /products/domains/handles/{handle}/delete
     * Permissions: domains:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Delete a domain handle. Cannot delete if handle is in use by domains.
     *
     * @param  string  $handle  Handle ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function handlesDestroy(string $handle, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/domains/handles/{handle}/delete', ['handle' => $handle], $query, $body, false, true);
    }

    /**
     * Get domains using handle
     * GET /products/domains/handles/{handle}/domains
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get a list of all domains that use this handle as registrant.
     *
     * @param  string  $handle  Handle ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function handlesDomains(string $handle, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/handles/{handle}/domains', ['handle' => $handle], $query, null, false, true);
    }

    /**
     * Update domain handle
     * POST /products/domains/handles/{handle}/update
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Update an existing domain handle. Changes are synced to all providers.
     *
     * @param  string  $handle  Handle ID (UUID)
     * @param  array{city?: string, country_code?: string, email?: string, fax?: string|null, first_name?: string, house_number?: string|null, is_default?: bool|null, last_name?: string, organization?: string|null, phone?: string, postal_code?: string, state?: string|null, street?: string, type?: 'individual'|'organization'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function handlesUpdate(string $handle, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/handles/{handle}/update', ['handle' => $handle], $query, $body, false, true);
    }

    /**
     * Get domain pricing
     * GET /products/domains/pricing
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get pricing for all available TLDs. If reseller has custom pricing, those prices are returned.
     *
     * @param  array{tld?: string, featured?: bool}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pricing(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/pricing', [], $query, null, false, true);
    }

    /**
     * Get active domain promo prices
     * GET /products/domains/pricing/promos
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get only TLDs that currently have an active promo/action price for create, renew and/or transfer. If reseller has custom pricing, those prices are used to resolve the regular price.
     *
     * @param  array{tld?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pricingPromos(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/pricing/promos', [], $query, null, false, true);
    }

    /**
     * Get domain statistics
     * GET /products/domains/statistics
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get domain statistics including count by TLD, status, and expiration info.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function statistics(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/statistics', [], $query, null, false, true);
    }

    /**
     * Get domain suggestions
     * GET /products/domains/suggestions
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Get alternative domain suggestions for a given name across popular TLDs.
     *
     * @param  array{name: string, limit?: int|null}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function suggestions(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/suggestions', [], $query, null, false, true);
    }

    /**
     * Transfer a domain
     * POST /products/domains/transfer
     * Permissions: domains:transfer
     * Response: json; json() preserves the full envelope and pagination.
     * Initiate a domain transfer from another registrar. "nameserver_mode" chooses what happens with the nameservers: "platform" (default) points the domain at our nameservers once the transfer completes, "external" keeps the nameservers of the previous provider (no zone is created here; switch later with POST {domain}/nameservers/platform). "dns_import" (only with "platform") takes the current DNS records of the old provider along: "scan" scans them for review, "apply" scans and writes them into our zone automatically. Default is "none".
     *
     * @param  array{auth_code: string, dns_import?: 'none'|'scan'|'apply'|null, domain: string, handle_id: string, nameserver_mode?: 'platform'|'external'|null, years?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function transfer(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/transfer', [], $query, $body, false, true);
    }

    /**
     * Get domain details
     * GET /products/domains/{domain}
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific domain.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/{domain}', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * Generate auth code
     * POST /products/domains/{domain}/auth-code
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Generate or retrieve the auth code for outbound domain transfer.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function authCode(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/auth-code', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Disable auto-renew
     * POST /products/domains/{domain}/disableAutoRenew
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Disable automatic renewal for the domain. Domain will be deleted at end of registration period.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function disableAutoRenew(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/disableAutoRenew', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Get DNS records
     * GET /products/domains/{domain}/dns
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all DNS records for the domain.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsIndex(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/{domain}/dns', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * Discard DNS import
     * DELETE /products/domains/{domain}/dns-import
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Discards the current scan result without changing the DNS zone, e.g. to start a fresh scan.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsImportDestroy(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/domains/{domain}/dns-import', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Get DNS import status
     * GET /products/domains/{domain}/dns-import
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the state of the DNS import (scan of the previous provider's zone) and, once the scan is completed, the found records.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsImportShow(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/{domain}/dns-import', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * Start DNS import scan
     * POST /products/domains/{domain}/dns-import
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Scans the zone currently served by the previous provider (best effort, e.g. via AXFR or enumeration of common names). Only possible while the domain uses our nameservers (nameserver_mode "platform") and ideally before the transfer completes. With "auto_apply" the found records are written into our zone as soon as the scan is done; otherwise fetch them with GET and apply them with POST dns-import/apply.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array{auto_apply?: bool|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsImportStore(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/dns-import', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Apply DNS import
     * POST /products/domains/{domain}/dns-import/apply
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Writes records of a completed scan into our DNS zone. Send "records" to apply an edited selection; without it all importable records of the scan are applied.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array{records?: list<array{content: string, name: string, port?: int|null, priority?: int|null, ttl?: int|null, type: string, weight?: int|null}>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsImportApply(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/dns-import/apply', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Update DNS records
     * POST /products/domains/{domain}/dns/update
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Create, update, or delete DNS records. Send the complete list of desired records.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array{records: list<array{content: string, name: string, priority?: int|null, ttl?: int|null, type: 'A'|'AAAA'|'CNAME'|'MX'|'TXT'|'SRV'|'CAA'|'PTR'|'ALIAS'|'TLSA'|'SSHFP'|'NAPTR'|'LOC'|'WR'}>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnsUpdate(string $domain, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/dns/update', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Get DNSSEC status
     * GET /products/domains/{domain}/dnssec
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the DNSSEC status and records for the domain.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnssecIndex(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/{domain}/dnssec', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * Update DNSSEC
     * POST /products/domains/{domain}/dnssec/update
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Enable or disable DNSSEC for the domain. When enabling, provide DS records.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array{enabled: bool, records?: list<array{algorithm?: int, digest?: string, digest_type?: int, key_tag?: int}>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dnssecUpdate(string $domain, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/dnssec/update', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Enable auto-renew
     * POST /products/domains/{domain}/enableAutoRenew
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Enable automatic renewal for the domain.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function enableAutoRenew(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/enableAutoRenew', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Get nameservers
     * GET /products/domains/{domain}/nameservers
     * Permissions: domains:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the nameservers configured for the domain.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nameserversIndex(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/domains/{domain}/nameservers', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * Switch to platform nameservers
     * POST /products/domains/{domain}/nameservers/platform
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Points an active domain at our nameservers (or the reseller's whitelabel nameservers), e.g. after an incoming transfer with nameserver_mode "external". The zone is created first. With "dns_import" the records currently served by the old nameservers are taken along: "scan" for review, "apply" to write them into the zone automatically.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array{dns_import?: 'none'|'scan'|'apply'|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nameserversPlatform(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/nameservers/platform', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Update nameservers
     * POST /products/domains/{domain}/nameservers/update
     * Permissions: domains:update
     * Response: json; json() preserves the full envelope and pagination.
     * Update the nameservers for the domain. Minimum 2, maximum 6 nameservers required.
     *
     * @param  string  $domain  Domain ID (UUID)
     * @param  array{nameservers: list<string>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nameserversUpdate(string $domain, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/domains/{domain}/nameservers/update', ['domain' => $domain], $query, $body, false, true);
    }
}
