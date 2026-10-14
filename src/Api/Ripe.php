<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Ripe
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List RIPE organisations
     * GET /ripe/organisations
     * Permissions: ripe:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all RIPE organisations for the authenticated reseller, including their contacts.
     *
     * @param  array{status?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/ripe/organisations', [], $query, null, false, true);
    }

    /**
     * Create RIPE organisation
     * POST /ripe/organisations
     * Permissions: ripe:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new RIPE organisation. For internal organisations, a RIPE object will be created asynchronously. For external organisations (is_external=true), provide the ripe_org_id — it will be imported with its existing contacts.
     *
     * @param  array{is_external?: bool|null, ripe_org_id?: string|null, name?: string|null, org_name?: string|null, address?: string|null, country?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsStore(array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/ripe/organisations', [], $query, $body, false, true);
    }

    /**
     * Verify external RIPE organisation
     * POST /ripe/organisations/verify
     * Permissions: ripe:create
     * Response: json; json() preserves the full envelope and pagination.
     * Validates that an external RIPE organisation exists and has the required maintainer set. Use this before importing an external org.
     *
     * @param  array{ripe_org_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsVerify(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/ripe/organisations/verify', [], $query, $body, false, true);
    }

    /**
     * Delete RIPE organisation
     * DELETE /ripe/organisations/{organisation}
     * Permissions: ripe:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a RIPE organisation and all its contacts. Not possible if active IP assignments exist.
     *
     * @param  string  $organisation  Organisation ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsDestroy(string $organisation, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/ripe/organisations/{organisation}', ['organisation' => $organisation], $query, $body, false, true);
    }

    /**
     * Show RIPE organisation
     * GET /ripe/organisations/{organisation}
     * Permissions: ripe:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific RIPE organisation including all contacts.
     *
     * @param  string  $organisation  Organisation ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsShow(string $organisation, array $query = []): Response
    {
        return $this->transport->send('GET', '/ripe/organisations/{organisation}', ['organisation' => $organisation], $query, null, false, true);
    }

    /**
     * Add contact to organisation
     * POST /ripe/organisations/{organisation}/contacts
     * Permissions: ripe:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new RIPE contact (person or abuse role) for an organisation. The contact will be created in RIPE asynchronously. Not possible for external organisations.
     *
     * @param  string  $organisation  Organisation ID
     * @param  array{type: 'person'|'role', name: string, contact_name: string, address: string, country: string, email: string, phone?: string|null, abuse_email?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function contactsStore(string $organisation, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/ripe/organisations/{organisation}/contacts', ['organisation' => $organisation], $query, $body, false, true);
    }

    /**
     * Delete RIPE contact
     * DELETE /ripe/organisations/{organisation}/contacts/{contact}
     * Permissions: ripe:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a RIPE contact from the local database.
     *
     * @param  string  $organisation  Organisation ID
     * @param  string  $contact  Contact ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function contactsDestroy(string $organisation, string $contact, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/ripe/organisations/{organisation}/contacts/{contact}', ['organisation' => $organisation, 'contact' => $contact], $query, $body, false, true);
    }

    /**
     * Retry failed contact creation
     * POST /ripe/organisations/{organisation}/contacts/{contact}/retry
     * Permissions: ripe:create
     * Response: json; json() preserves the full envelope and pagination.
     * Retries RIPE object creation for a contact that failed. Only works for contacts with status=error.
     *
     * @param  string  $organisation  Organisation ID
     * @param  string  $contact  Contact ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function contactsRetry(string $organisation, string $contact, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/ripe/organisations/{organisation}/contacts/{contact}/retry', ['organisation' => $organisation, 'contact' => $contact], $query, $body, false, true);
    }

    /**
     * Refresh external organisation
     * POST /ripe/organisations/{organisation}/refresh
     * Permissions: ripe:create
     * Response: json; json() preserves the full envelope and pagination.
     * Re-syncs contacts and ASNs from RIPE for an external organisation. Only works for external organisations.
     *
     * @param  string  $organisation  Organisation ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsRefresh(string $organisation, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/ripe/organisations/{organisation}/refresh', ['organisation' => $organisation], $query, $body, false, true);
    }

    /**
     * Retry failed organisation creation
     * POST /ripe/organisations/{organisation}/retry
     * Permissions: ripe:create
     * Response: json; json() preserves the full envelope and pagination.
     * Retries the RIPE object creation for an organisation that failed. Only works for organisations with status=error.
     *
     * @param  string  $organisation  Organisation ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function organisationsRetry(string $organisation, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/ripe/organisations/{organisation}/retry', ['organisation' => $organisation], $query, $body, false, true);
    }
}
