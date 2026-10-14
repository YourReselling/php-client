<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Kubernetes
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List all Kubernetes clusters
     * GET /products/kubernetes
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns a paginated list of all Kubernetes clusters for the authenticated reseller.
     *
     * @param  array{status?: string, search?: string, page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes', [], $query, null, false, true);
    }

    /**
     * Create a Kubernetes cluster
     * POST /products/kubernetes/create
     * Permissions: kubernetes:create
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new Kubernetes cluster. Returns 202 as provisioning is asynchronous.
     *
     * @param  array{cluster_id: string, control_plane_plan_id: string, ha_control_plane?: bool, location_id: string, name: string, version_id: string, worker_pools: list<array{auto_scale?: bool, infrastructure_cluster_id: string, label_key?: string|null, label_value?: string|null, max_nodes: int, min_nodes: int, name: string, plan_id: string}>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/create', [], $query, $body, false, true);
    }

    /**
     * List Kubernetes locations
     * GET /products/kubernetes/locations
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available locations for Kubernetes clusters.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locations(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/locations', [], $query, null, false, true);
    }

    /**
     * List Kubernetes plans with pricing
     * GET /products/kubernetes/plans
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available Kubernetes plans with pricing. Uses reseller-specific pricing if available.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function plans(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/plans', [], $query, null, false, true);
    }

    /**
     * List Kubernetes versions
     * GET /products/kubernetes/versions
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all available Kubernetes versions.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function versions(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/versions', [], $query, null, false, true);
    }

    /**
     * Show Kubernetes cluster details
     * GET /products/kubernetes/{cluster}
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns detailed information about a specific Kubernetes cluster.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * Delete Kubernetes cluster
     * POST /products/kubernetes/{cluster}/delete
     * Permissions: kubernetes:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Marks a cluster for deletion with a 48h grace period.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $cluster, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/delete', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * List firewall rules
     * GET /products/kubernetes/{cluster}/firewall/rules
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all firewall rules for a Kubernetes cluster.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRules(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/firewall/rules', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * Create firewall rule
     * POST /products/kubernetes/{cluster}/firewall/rules/create
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Creates a new firewall rule and syncs to all cluster nodes.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{action: 'accept'|'drop'|'reject', description?: string|null, destination?: string|null, direction: 'inbound'|'outbound', port_range?: string|null, protocol: 'tcp'|'udp'|'icmp'|'any', source?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRulesCreate(string $cluster, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/firewall/rules/create', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Delete firewall rule
     * POST /products/kubernetes/{cluster}/firewall/rules/{rule}/delete
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a firewall rule and syncs to all cluster nodes.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $rule  rule route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function firewallRulesDelete(string $cluster, string $rule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/firewall/rules/{rule}/delete', ['cluster' => $cluster, 'rule' => $rule], $query, $body, false, true);
    }

    /**
     * Get Kubeconfig
     * GET /products/kubernetes/{cluster}/kubeconfig
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns the kubeconfig YAML for connecting to the cluster.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function kubeconfig(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/kubeconfig', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * List node pools
     * GET /products/kubernetes/{cluster}/node-pools
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns all node pools for a cluster.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodePoolsIndex(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/node-pools', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * Create node pool
     * POST /products/kubernetes/{cluster}/node-pools/create
     * Permissions: kubernetes:create
     * Response: json; json() preserves the full envelope and pagination.
     * Adds a new worker node pool to a cluster.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{auto_scale?: bool, autoscale_cooldown_minutes?: int|null, autoscale_cpu_percent?: int|null, autoscale_memory_percent?: int|null, infrastructure_cluster_id: string, label_key?: string|null, label_value?: string|null, max_nodes: int, min_nodes: int, name: string, plan_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodePoolsCreate(string $cluster, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/node-pools/create', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Delete node pool
     * POST /products/kubernetes/{cluster}/node-pools/{pool}/delete
     * Permissions: kubernetes:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Deletes a worker node pool. Control plane pools cannot be deleted.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $pool  pool route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodePoolsDelete(string $cluster, string $pool, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/node-pools/{pool}/delete', ['cluster' => $cluster, 'pool' => $pool], $query, $body, false, true);
    }

    /**
     * Scale down node pool
     * POST /products/kubernetes/{cluster}/node-pools/{pool}/scale-down
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Removes nodes from a node pool.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $pool  pool route parameter
     * @param  array{count: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodePoolsScaleDown(string $cluster, string $pool, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/node-pools/{pool}/scale-down', ['cluster' => $cluster, 'pool' => $pool], $query, $body, false, true);
    }

    /**
     * Scale up node pool
     * POST /products/kubernetes/{cluster}/node-pools/{pool}/scale-up
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Adds nodes to a node pool.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $pool  pool route parameter
     * @param  array{count: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodePoolsScaleUp(string $cluster, string $pool, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/node-pools/{pool}/scale-up', ['cluster' => $cluster, 'pool' => $pool], $query, $body, false, true);
    }

    /**
     * Update node pool
     * POST /products/kubernetes/{cluster}/node-pools/{pool}/update
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates node pool settings.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $pool  pool route parameter
     * @param  array{auto_scale?: bool, autoscale_cooldown_minutes?: int, autoscale_cpu_percent?: int, autoscale_memory_percent?: int, label_key?: string|null, label_value?: string|null, max_nodes?: int, min_nodes?: int, name?: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodePoolsUpdate(string $cluster, string $pool, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/node-pools/{pool}/update', ['cluster' => $cluster, 'pool' => $pool], $query, $body, false, true);
    }

    /**
     * Cordon a node
     * POST /products/kubernetes/{cluster}/nodes/{node}/cordon
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Marks a node as unschedulable. Existing pods continue running.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $node  node route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodesCordon(string $cluster, string $node, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/nodes/{node}/cordon', ['cluster' => $cluster, 'node' => $node], $query, $body, false, true);
    }

    /**
     * Drain a node
     * POST /products/kubernetes/{cluster}/nodes/{node}/drain
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Cordons the node and evicts all non-system pods.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $node  node route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodesDrain(string $cluster, string $node, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/nodes/{node}/drain', ['cluster' => $cluster, 'node' => $node], $query, $body, false, true);
    }

    /**
     * Uncordon a node
     * POST /products/kubernetes/{cluster}/nodes/{node}/uncordon
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Marks a node as schedulable again.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $node  node route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function nodesUncordon(string $cluster, string $node, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/nodes/{node}/uncordon', ['cluster' => $cluster, 'node' => $node], $query, $body, false, true);
    }

    /**
     * List Kubernetes workloads
     * GET /products/kubernetes/{cluster}/operations
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{namespace?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsIndex(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/operations', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * Apply Kubernetes manifest
     * POST /products/kubernetes/{cluster}/operations/apply
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{manifest: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsApply(string $cluster, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/operations/apply', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Get Kubernetes events for a resource
     * GET /products/kubernetes/{cluster}/operations/events/{namespace}/{kind}/{name}
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $kind  kind route parameter
     * @param  string  $name  name route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsEvents(string $cluster, string $namespace, string $kind, string $name, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/operations/events/{namespace}/{kind}/{name}', ['cluster' => $cluster, 'namespace' => $namespace, 'kind' => $kind, 'name' => $name], $query, null, false, true);
    }

    /**
     * Get live Kubernetes CPU/RAM metrics
     * GET /products/kubernetes/{cluster}/operations/metrics
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsMetrics(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/operations/metrics', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * Delete Kubernetes deployment
     * DELETE /products/kubernetes/{cluster}/operations/namespaces/{namespace}/deployments/{deployment}
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $deployment  deployment route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsDeleteDeployment(string $cluster, string $namespace, string $deployment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/kubernetes/{cluster}/operations/namespaces/{namespace}/deployments/{deployment}', ['cluster' => $cluster, 'namespace' => $namespace, 'deployment' => $deployment], $query, $body, false, true);
    }

    /**
     * Restart Kubernetes deployment
     * POST /products/kubernetes/{cluster}/operations/namespaces/{namespace}/deployments/{deployment}/restart
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $deployment  deployment route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsRestart(string $cluster, string $namespace, string $deployment, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/operations/namespaces/{namespace}/deployments/{deployment}/restart', ['cluster' => $cluster, 'namespace' => $namespace, 'deployment' => $deployment], $query, $body, false, true);
    }

    /**
     * Scale Kubernetes deployment
     * POST /products/kubernetes/{cluster}/operations/namespaces/{namespace}/deployments/{deployment}/scale
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $deployment  deployment route parameter
     * @param  array{replicas: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsScale(string $cluster, string $namespace, string $deployment, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/operations/namespaces/{namespace}/deployments/{deployment}/scale', ['cluster' => $cluster, 'namespace' => $namespace, 'deployment' => $deployment], $query, $body, false, true);
    }

    /**
     * Delete a bare pod
     * DELETE /products/kubernetes/{cluster}/operations/namespaces/{namespace}/pods/{pod}
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $pod  pod route parameter
     * @param  array{grace_period_seconds?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsPodsDelete(string $cluster, string $namespace, string $pod, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/kubernetes/{cluster}/operations/namespaces/{namespace}/pods/{pod}', ['cluster' => $cluster, 'namespace' => $namespace, 'pod' => $pod], $query, $body, false, true);
    }

    /**
     * Evict a pod (reschedules onto another node)
     * POST /products/kubernetes/{cluster}/operations/namespaces/{namespace}/pods/{pod}/evict
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $pod  pod route parameter
     * @param  array{grace_period_seconds?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsPodsEvict(string $cluster, string $namespace, string $pod, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/operations/namespaces/{namespace}/pods/{pod}/evict', ['cluster' => $cluster, 'namespace' => $namespace, 'pod' => $pod], $query, $body, false, true);
    }

    /**
     * Get Kubernetes pod logs
     * GET /products/kubernetes/{cluster}/operations/namespaces/{namespace}/pods/{pod}/logs
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $namespace  namespace route parameter
     * @param  string  $pod  pod route parameter
     * @param  array{container?: string|null, tail_lines?: int|null}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsLogs(string $cluster, string $namespace, string $pod, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/operations/namespaces/{namespace}/pods/{pod}/logs', ['cluster' => $cluster, 'namespace' => $namespace, 'pod' => $pod], $query, null, false, true);
    }

    /**
     * Get historical CPU/RAM stats for a node, pod or container
     * GET /products/kubernetes/{cluster}/operations/stats/{kind}/{identifier}
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  string  $kind  kind route parameter
     * @param  string  $identifier  identifier route parameter
     * @param  array{hours?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsStats(string $cluster, string $kind, string $identifier, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/operations/stats/{kind}/{identifier}', ['cluster' => $cluster, 'kind' => $kind, 'identifier' => $identifier], $query, null, false, true);
    }

    /**
     * Get Kubernetes cluster topology snapshot
     * GET /products/kubernetes/{cluster}/operations/topology
     * Permissions: kubernetes:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function operationsTopology(string $cluster, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/kubernetes/{cluster}/operations/topology', ['cluster' => $cluster], $query, null, false, true);
    }

    /**
     * Restore Kubernetes cluster
     * POST /products/kubernetes/{cluster}/restore
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Restores a cluster from pending deletion. Costs 4.99 EUR.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function restore(string $cluster, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/restore', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Update Kubernetes cluster
     * POST /products/kubernetes/{cluster}/update
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Updates cluster settings (name, auto_upgrade).
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{auto_upgrade?: bool, name?: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $cluster, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/update', ['cluster' => $cluster], $query, $body, false, true);
    }

    /**
     * Upgrade Kubernetes version
     * POST /products/kubernetes/{cluster}/upgrade
     * Permissions: kubernetes:update
     * Response: json; json() preserves the full envelope and pagination.
     * Initiates a Kubernetes version upgrade.
     *
     * @param  string  $cluster  cluster route parameter
     * @param  array{version_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function upgrade(string $cluster, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/kubernetes/{cluster}/upgrade', ['cluster' => $cluster], $query, $body, false, true);
    }
}
