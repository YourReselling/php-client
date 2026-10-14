<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Ddos
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all DDoS alerts
     * GET /ddos/alerts
     * Permissions: ddos_protection:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns paginated DDoS alerts across all services owned by the reseller. Supports filtering by rootserver, IP address, source type, timeframe, status, and severity.
     *
     * @param  array{rootserver_id?: string, ip_address?: string, source_type?: string, timeframe?: string, status?: string, severity?: string, sort?: string, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function alertsIndex(array $query = []): Response
    {
        return $this->transport->send('GET', '/ddos/alerts', [], $query, null, false, true);
    }

    /**
     * Get DDoS alert details
     * GET /ddos/alerts/{alert}
     * Permissions: ddos_protection:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific DDoS alert including top ASNs, countries, ports, and protocols when metrics are enabled.
     *
     * @param  string  $alert  alert route parameter
     * @param  array{include?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function alertsShow(string $alert, array $query = []): Response
    {
        return $this->transport->send('GET', '/ddos/alerts/{alert}', ['alert' => $alert], $query, null, false, true);
    }

    /**
     * Get DDoS alert flow data
     * GET /ddos/alerts/{alert}/flows
     * Permissions: ddos_protection:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns complete flow statistics and traffic snapshots for a DDoS alert. Requires ddos_dashboard_enabled permission.
     *
     * @param  string  $alert  alert route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function alertsFlows(string $alert, array $query = []): Response
    {
        return $this->transport->send('GET', '/ddos/alerts/{alert}/flows', ['alert' => $alert], $query, null, false, true);
    }
}
