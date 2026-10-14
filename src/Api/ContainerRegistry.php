<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class ContainerRegistry
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List container registries
     * GET /products/container-registry
     * Permissions: container-registry:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/container-registry', [], $query, null, false, true);
    }

    /**
     * Create a container registry
     * POST /products/container-registry/create
     * Permissions: container-registry:create
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{auto_upgrade?: bool, auto_upgrade_max_gb?: int|null, auto_upgrade_step_gb?: int|null, is_custom?: bool, name: string, plan_id?: string|null, storage_gb?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/container-registry/create', [], $query, $body, false, true);
    }

    /**
     * Show a container registry
     * GET /products/container-registry/{registry}
     * Permissions: container-registry:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $registry, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/container-registry/{registry}', ['registry' => $registry], $query, null, false, true);
    }

    /**
     * List artifacts of a repository
     * GET /products/container-registry/{registry}/artifacts
     * Permissions: container-registry:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array{repository: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function artifacts(string $registry, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/container-registry/{registry}/artifacts', ['registry' => $registry], $query, null, false, true);
    }

    /**
     * Delete a container registry
     * POST /products/container-registry/{registry}/delete
     * Permissions: container-registry:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $registry, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/container-registry/{registry}/delete', ['registry' => $registry], $query, $body, false, true);
    }

    /**
     * List repositories
     * GET /products/container-registry/{registry}/repositories
     * Permissions: container-registry:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function repositories(string $registry, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/container-registry/{registry}/repositories', ['registry' => $registry], $query, null, false, true);
    }

    /**
     * Set keep-last-N retention
     * POST /products/container-registry/{registry}/retention
     * Permissions: container-registry:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array{keep_count: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function retention(string $registry, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/container-registry/{registry}/retention', ['registry' => $registry], $query, $body, false, true);
    }

    /**
     * List robot accounts
     * GET /products/container-registry/{registry}/robots
     * Permissions: container-registry:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function robotsIndex(string $registry, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/container-registry/{registry}/robots', ['registry' => $registry], $query, null, false, true);
    }

    /**
     * Create a robot account
     * POST /products/container-registry/{registry}/robots
     * Permissions: container-registry:create
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function robotsCreate(string $registry, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/container-registry/{registry}/robots', ['registry' => $registry], $query, $body, false, true);
    }

    /**
     * Delete a robot account
     * DELETE /products/container-registry/{registry}/robots/{robot}
     * Permissions: container-registry:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  string  $robot  robot route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function robotsDelete(string $registry, string $robot, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/container-registry/{registry}/robots/{robot}', ['registry' => $registry, 'robot' => $robot], $query, $body, false, true);
    }

    /**
     * Trigger a vulnerability scan
     * POST /products/container-registry/{registry}/scan
     * Permissions: container-registry:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array{reference: string, repository: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function scan(string $registry, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/container-registry/{registry}/scan', ['registry' => $registry], $query, $body, false, true);
    }

    /**
     * List webhooks
     * GET /products/container-registry/{registry}/webhooks
     * Permissions: container-registry:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webhooksIndex(string $registry, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/container-registry/{registry}/webhooks', ['registry' => $registry], $query, null, false, true);
    }

    /**
     * Create a webhook
     * POST /products/container-registry/{registry}/webhooks
     * Permissions: container-registry:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  array{event_types?: list<string>, name: string, target_url: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webhooksCreate(string $registry, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/container-registry/{registry}/webhooks', ['registry' => $registry], $query, $body, false, true);
    }

    /**
     * Delete a webhook
     * DELETE /products/container-registry/{registry}/webhooks/{webhookId}
     * Permissions: container-registry:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $registry  registry route parameter
     * @param  string  $webhookId  webhookId route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function webhooksDelete(string $registry, string $webhookId, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/container-registry/{registry}/webhooks/{webhookId}', ['registry' => $registry, 'webhookId' => $webhookId], $query, $body, false, true);
    }
}
