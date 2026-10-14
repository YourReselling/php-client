<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class SslCertificates
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List certificates
     * GET /products/ssl-certificates
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{status?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates', [], $query, null, false, true);
    }

    /**
     * Generate a CSR
     * POST /products/ssl-certificates/csr
     * Permissions: certificates:create
     * Response: json; json() preserves the full envelope and pagination.
     * Generates a 2048-bit RSA key pair and a matching CSR. The key is returned once and never stored server-side unless you pass it back with the order.
     *
     * @param  array{common_name: string, sans?: list<string>|null, organization?: string|null, organizational_unit?: string|null, country?: string|null, state?: string|null, city?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function csrGenerate(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ssl-certificates/csr', [], $query, $body, false, true);
    }

    /**
     * Decode a CSR
     * POST /products/ssl-certificates/csr/decode
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * Reads the subject and SANs out of a CSR so you can verify it before ordering.
     *
     * @param  array{csr: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function csrDecode(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ssl-certificates/csr/decode', [], $query, $body, false, true);
    }

    /**
     * List DCV approver emails
     * GET /products/ssl-certificates/dcv-emails
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * Candidate approver addresses for email-based domain control validation.
     *
     * @param  array{domain: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function dcvEmails(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/dcv-emails', [], $query, null, false, true);
    }

    /**
     * List download formats
     * GET /products/ssl-certificates/download-formats
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * The formats accepted by the download endpoint.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function downloadFormats(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/download-formats', [], $query, null, false, true);
    }

    /**
     * Order a certificate
     * POST /products/ssl-certificates/order
     * Permissions: certificates:create
     * Response: json; json() preserves the full envelope and pagination.
     * Submits a certificate request. Provide your own CSR, or generate one first via POST /csr. The certificate is issued asynchronously — poll GET /{certificate} until `status` is `issued`.
     *
     * @param  array{product_id: string, common_name: string, sans?: list<string>|null, period_months: int, csr: string, private_key?: string|null, dcv: list<array{domain: string, email?: string|null, method: 'email'|'dns'|'file'}>, organization?: array{addressLine1?: string, city?: string, coc?: string|null, country?: string, name?: string, postalCode?: string, region?: string|null}|null, approver?: array{email?: string, firstName?: string, jobTitle?: string, lastName?: string, phone?: string|null}|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ssl-certificates/order', [], $query, $body, false, true);
    }

    /**
     * List certificate products
     * GET /products/ssl-certificates/products
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the orderable certificate products including supported periods and your price per period.
     *
     * @param  array{validation_type?: 'domain_validation'|'organization_validation'|'extended_validation'}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function products(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/products', [], $query, null, false, true);
    }

    /**
     * Get certificate product details
     * GET /products/ssl-certificates/products/{product}
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $product  Product ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function product(string $product, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/products/{product}', ['product' => $product], $query, null, false, true);
    }

    /**
     * Get certificate details
     * GET /products/ssl-certificates/{certificate}
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * Includes the per-domain validation (DCV) state so you can publish the required DNS records or files.
     *
     * @param  string  $certificate  Certificate ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $certificate, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/{certificate}', ['certificate' => $certificate], $query, null, false, true);
    }

    /**
     * Download certificate
     * GET /products/ssl-certificates/{certificate}/download
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the issued certificate. `format` selects what you get: the certificate itself (`crt`), the intermediate chain (`ca-bundle`), the root (`ca`), a PKCS#7 container (`pkcs7`), the CSR (`csr`) or a ZIP with everything (`zip`). Binary formats come back base64-encoded, indicated by `encoding`.
     *
     * @param  string  $certificate  Certificate ID
     * @param  array{format?: 'crt'|'ca-bundle'|'ca'|'pkcs7'|'csr'|'zip'}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function download(string $certificate, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/{certificate}/download', ['certificate' => $certificate], $query, null, false, true);
    }

    /**
     * Download private key
     * GET /products/ssl-certificates/{certificate}/private-key
     * Permissions: certificates:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the private key — only for certificates whose key was generated here (POST /csr) and stored with the order.
     *
     * @param  string  $certificate  Certificate ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function privateKey(string $certificate, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/ssl-certificates/{certificate}/private-key', ['certificate' => $certificate], $query, null, false, true);
    }

    /**
     * Reissue a certificate
     * POST /products/ssl-certificates/{certificate}/reissue
     * Permissions: certificates:update
     * Response: json; json() preserves the full envelope and pagination.
     * Reissues an issued certificate with a new CSR — for a rotated key, a server move or a changed SAN list. The validity period is not extended and nothing is charged. Every domain has to be validated again, so the response contains fresh DCV instructions.
     *
     * @param  string  $certificate  Certificate ID
     * @param  array{csr: string, private_key?: string|null, sans?: list<string>|null, dcv?: list<array{domain?: string, email?: string|null, method?: 'email'|'dns'|'file'}>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reissue(string $certificate, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ssl-certificates/{certificate}/reissue', ['certificate' => $certificate], $query, $body, false, true);
    }

    /**
     * Renew a certificate
     * POST /products/ssl-certificates/{certificate}/renew
     * Permissions: certificates:update
     * Response: json; json() preserves the full envelope and pagination.
     * Renews an issued certificate for another period. Requires a price for that period on the product.
     *
     * @param  string  $certificate  Certificate ID
     * @param  array{period_months: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function renew(string $certificate, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ssl-certificates/{certificate}/renew', ['certificate' => $certificate], $query, $body, false, true);
    }

    /**
     * Revoke a certificate
     * POST /products/ssl-certificates/{certificate}/revoke
     * Permissions: certificates:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Revokes an issued certificate, or cancels a request that is still being processed. Already billed usage stays on the invoice.
     *
     * @param  string  $certificate  Certificate ID
     * @param  array{reason?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function revoke(string $certificate, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/ssl-certificates/{certificate}/revoke', ['certificate' => $certificate], $query, $body, false, true);
    }
}
