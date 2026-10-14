<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Billing
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List invoices
     * GET /billing/invoices
     * Permissions: billing:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of invoices for the authenticated reseller. Supports filtering by status.
     *
     * @param  array{status?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function invoicesIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/billing/invoices', [], $query, null, false, true);
    }

    /**
     * Get invoice details
     * GET /billing/invoices/{invoice}
     * Permissions: billing:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns full invoice details including all line items.
     *
     * @param  string  $invoice  Invoice ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function invoicesShow(string $invoice, array $query = []): Response
    {
        return $this->transport->send('GET', '/billing/invoices/{invoice}', ['invoice' => $invoice], $query, null, false, true);
    }

    /**
     * Get usage and credit overview
     * GET /billing/usage
     * Permissions: billing:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the current credit balance and a summary of active products with their counts. Provides an overview of resource consumption across all product types.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function usage(array $query = []): Response
    {
        return $this->transport->send('GET', '/billing/usage', [], $query, null, false, true);
    }
}
