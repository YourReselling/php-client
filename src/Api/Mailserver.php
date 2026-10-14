<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Mailserver
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * Update webmail branding
     * PUT /products/mailserver/branding
     * Permissions: mailserver:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates the whitelabel branding (display name, logo, colors, support/legal links) shown in webmail for the reseller's customers. The hostname must already be registered — its location determines which mailserver deployment receives the update.
     *
     * @param  array{accent_color: string, display_name: string, hostname: string, legal_url?: string|null, logo_url?: string|null, primary_color: string, support_url?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function brandingUpdate(array $body, array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/mailserver/branding', [], $query, $body, false, true);
    }

    /**
     * List mail domains
     * GET /products/mailserver/domains
     * Permissions: mailserver:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all mail domains provisioned for the reseller.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/mailserver/domains', [], $query, null, false, true);
    }

    /**
     * Create a mail domain
     * POST /products/mailserver/domains
     * Permissions: mailserver:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new mail domain with a storage quota at a chosen mailserver location. Lazily creates the reseller's organization on that location on first use.
     *
     * @param  array{mailserver_location_id: string, name: string, quota_bytes?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsStore(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/domains', [], $query, $body, false, true);
    }

    /**
     * Delete a mail domain
     * DELETE /products/mailserver/domains/{domain}
     * Permissions: mailserver:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a mail domain on the mailserver. Mailboxes are disabled immediately; data is retained for the configured retention period before permanent deletion.
     *
     * @param  string  $domain  Mail domain ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsDestroy(string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/mailserver/domains/{domain}', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * Get mail domain details
     * GET /products/mailserver/domains/{domain}
     * Permissions: mailserver:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a mail domain including live usage (allocated mailbox storage, mailbox count) from the mailserver.
     *
     * @param  string  $domain  Mail domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsShow(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/mailserver/domains/{domain}', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * List mailboxes for a domain
     * GET /products/mailserver/domains/{domain}/mailboxes
     * Permissions: mailserver:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all mailboxes for a mail domain.
     *
     * @param  string  $domain  Mail domain ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mailboxesIndex(string $domain, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/mailserver/domains/{domain}/mailboxes', ['domain' => $domain], $query, null, false, true);
    }

    /**
     * Create a mailbox
     * POST /products/mailserver/domains/{domain}/mailboxes
     * Permissions: mailserver:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a mailbox under a mail domain and returns the initial app password. The app password is only ever returned once by the mailserver.
     *
     * @param  string  $domain  Mail domain ID (UUID)
     * @param  array{local_part: string, quota_bytes?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mailboxesStore(string $domain, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/domains/{domain}/mailboxes', ['domain' => $domain], $query, $body, false, true);
    }

    /**
     * List whitelabel webmail hostnames
     * GET /products/mailserver/hostnames
     * Permissions: mailserver:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all whitelabel hostnames registered for the reseller's webmail.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function hostnamesIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/mailserver/hostnames', [], $query, null, false, true);
    }

    /**
     * Register a whitelabel webmail hostname
     * POST /products/mailserver/hostnames
     * Permissions: mailserver:create
     * Response: json; json() preserves the full envelope and pagination.
     * Registers a whitelabel hostname (e.g. webmail.kundenmarke.de) at a chosen mailserver location so a TLS certificate can be issued for it once ownership is verified via DNS TXT record. Each location is a separate webmail deployment, so one hostname must be registered per location the reseller uses.
     *
     * @param  array{hostname: string, mailserver_location_id: string, preferred_challenge?: 'http-01'|'dns-01'|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function hostnamesStore(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/hostnames', [], $query, $body, false, true);
    }

    /**
     * Get whitelabel hostname status
     * GET /products/mailserver/hostnames/{hostname}
     * Permissions: mailserver:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current DNS verification and certificate order status, refreshed from the mailserver.
     *
     * @param  string  $hostname  Hostname ID (UUID)
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function hostnamesShow(string $hostname, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/mailserver/hostnames/{hostname}', ['hostname' => $hostname], $query, null, false, true);
    }

    /**
     * Get the DNS TXT record to publish
     * POST /products/mailserver/hostnames/{hostname}/verification
     * Permissions: mailserver:update
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the DNS TXT record the reseller must publish at their registrar to prove ownership of the hostname. Idempotent — returns the same record on repeated calls.
     *
     * @param  string  $hostname  Hostname ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function hostnamesVerification(string $hostname, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/hostnames/{hostname}/verification', ['hostname' => $hostname], $query, $body, false, true);
    }

    /**
     * Verify hostname ownership
     * POST /products/mailserver/hostnames/{hostname}/verify
     * Permissions: mailserver:update
     * Response: json; json() preserves the full envelope and pagination.
     * Checks the published TXT record against the expected token. A response with verified=false means the record is not visible yet (propagation delay) — not an error, retry later.
     *
     * @param  string  $hostname  Hostname ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function hostnamesVerify(string $hostname, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/hostnames/{hostname}/verify', ['hostname' => $hostname], $query, $body, false, true);
    }

    /**
     * Enable or disable a mailbox
     * PATCH /products/mailserver/mailboxes/{mailbox}/enabled
     * Permissions: mailserver:update
     * Response: json; json() preserves the full envelope and pagination.
     * Enables or disables a mailbox (login and delivery).
     *
     * @param  string  $mailbox  Mailbox ID (UUID)
     * @param  array{enabled: bool}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mailboxesEnabled(string $mailbox, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/mailserver/mailboxes/{mailbox}/enabled', ['mailbox' => $mailbox], $query, $body, false, true);
    }

    /**
     * Rotate a mailbox app password
     * POST /products/mailserver/mailboxes/{mailbox}/rotate-password
     * Permissions: mailserver:update
     * Response: json; json() preserves the full envelope and pagination.
     * Generates a new app password for the mailbox, invalidating the previous one.
     *
     * @param  string  $mailbox  Mailbox ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mailboxesRotatePassword(string $mailbox, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/mailboxes/{mailbox}/rotate-password', ['mailbox' => $mailbox], $query, $body, false, true);
    }

    /**
     * Issue a webmail SSO ticket
     * POST /products/mailserver/mailboxes/{mailbox}/sso-ticket
     * Permissions: mailserver:update
     * Response: json; json() preserves the full envelope and pagination.
     * Issues a short-lived (60s), single-use ticket that opens the branded webmail for this mailbox without exposing its password: https://<whitelabel-hostname>/?sso_ticket=<ticket>
     *
     * @param  string  $mailbox  Mailbox ID (UUID)
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mailboxesSsoTicket(string $mailbox, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/mailserver/mailboxes/{mailbox}/sso-ticket', ['mailbox' => $mailbox], $query, $body, false, true);
    }
}
