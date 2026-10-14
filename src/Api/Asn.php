<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Asn
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List ASNs
     * GET /products/asn
     * Permissions: asn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all Autonomous System Numbers for the authenticated reseller.
     *
     * @param  array{status?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/asn', [], $query, null, false, true);
    }

    /**
     * Order ASN
     * POST /products/asn/order
     * Permissions: asn:create
     * Response: json; json() preserves the full envelope and pagination.
     * Submits an ASN application. The ASN will be manually processed by the team. You will be notified once it is assigned.
     *
     * @param  array{billing_cycle: 'yearly'|'monthly', order_company_name: string, order_contact_name: string, order_contact_email: string, order_address: string, order_reason?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/asn/order', [], $query, $body, false, true);
    }

    /**
     * Get ASN pricing
     * GET /products/asn/pricing
     * Permissions: asn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current pricing for ASN orders.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pricing(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/asn/pricing', [], $query, null, false, true);
    }

    /**
     * Show ASN details
     * GET /products/asn/{asn}
     * Permissions: asn:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific ASN.
     *
     * @param  string  $asn  ASN ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $asn, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/asn/{asn}', ['asn' => $asn], $query, null, false, true);
    }

    /**
     * Cancel ASN
     * POST /products/asn/{asn}/cancel
     * Permissions: asn:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Requests cancellation of an ASN. The ASN will remain active until the end of the current billing period.
     *
     * @param  string  $asn  ASN ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function cancel(string $asn, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/asn/{asn}/cancel', ['asn' => $asn], $query, $body, false, true);
    }
}
