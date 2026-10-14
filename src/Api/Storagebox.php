<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;
use YourReselling\Upload;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Storagebox
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List StorageBox datastores
     * GET /products/storagebox
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{page?: int, per_page?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox', [], $query, null, false, true);
    }

    /**
     * List StorageBox locations
     * GET /products/storagebox/locations
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function locations(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/locations', [], $query, null, false, true);
    }

    /**
     * Order StorageBox datastore
     * POST /products/storagebox/order
     * Permissions: storagebox:create
     * Response: json; json() preserves the full envelope and pagination.
     * Provisions a new StorageBox. Speed is set via PATCH after provisioning (the remote API does not accept speed during creation).
     *
     * @param  array{friendly: string, location_id?: string|null, size_gb: int, speed?: 100|250|500|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/order', [], $query, $body, false, true);
    }

    /**
     * Get StorageBox datastore details
     * GET /products/storagebox/{datastore}
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns full datastore details including PBS connection credentials and SSH/SFTP password.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Update StorageBox (friendly, size, speed, autoscaling)
     * PATCH /products/storagebox/{datastore}
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     * Patch the datastore. All fields optional. Speed/size changes apply immediately on the remote backend.
     *
     * @param  string  $datastore  datastore
     * @param  array{friendly?: string, size_gb?: int, speed?: 100|250|500|1000, autoscaling_enabled?: bool, autoscaling_scale_up_only?: bool, autoscaling_lower_threshold?: int, autoscaling_upper_threshold?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function update(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/storagebox/{datastore}', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * List ACL entries
     * GET /products/storagebox/{datastore}/acl
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function aclIndex(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/acl', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Add ACL entry (IP/CIDR)
     * POST /products/storagebox/{datastore}/acl
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{prefix: string, comment?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function aclStore(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/acl', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Delete ACL entry
     * DELETE /products/storagebox/{datastore}/acl/{aclId}
     * Permissions: storagebox:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  string  $aclId  aclId
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function aclDestroy(string $datastore, string $aclId, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/storagebox/{datastore}/acl/{aclId}', ['datastore' => $datastore, 'aclId' => $aclId], $query, $body, false, true);
    }

    /**
     * Get PBS backup snapshots overview
     * GET /products/storagebox/{datastore}/backups-overview
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns namespaces, backup groups (VMs/CTs/Hosts), and snapshots in the queried namespace.
     *
     * @param  string  $datastore  datastore
     * @param  array{ns?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsOverview(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/backups-overview', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Delete StorageBox datastore
     * DELETE /products/storagebox/{datastore}/delete
     * Permissions: storagebox:delete
     * Response: json; json() preserves the full envelope and pagination.
     * Permanently terminates and deletes the StorageBox. All backup data is permanently lost.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/storagebox/{datastore}/delete', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * List recent webhook events
     * GET /products/storagebox/{datastore}/events
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     * Returns recent events delivered by remote-backups.com via webhook: backup completions, garbage collection, sync, verification, prune, resize.
     *
     * @param  string  $datastore  datastore
     * @param  array{limit?: int}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function events(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/events', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Get usage & I/O graph data
     * GET /products/storagebox/{datastore}/graph
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{range?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function graph(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/graph', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Request immutable backups disable (starts grace period)
     * DELETE /products/storagebox/{datastore}/immutable-backups
     * Permissions: storagebox:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function immutableBackupsDisable(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/storagebox/{datastore}/immutable-backups', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Get immutable backup config
     * GET /products/storagebox/{datastore}/immutable-backups
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function immutableBackupsIndex(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/immutable-backups', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Enable immutable backups
     * POST /products/storagebox/{datastore}/immutable-backups
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{change_timeout_days: int, retention?: array{keep_daily?: int|null, keep_last?: int|null, keep_monthly?: int|null, keep_weekly?: int|null, keep_yearly?: int|null}}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function immutableBackupsEnable(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/immutable-backups', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Cancel pending immutable backups disable
     * POST /products/storagebox/{datastore}/immutable-backups/cancel-disable
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function immutableBackupsCancelDisable(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/immutable-backups/cancel-disable', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Delete namespace
     * DELETE /products/storagebox/{datastore}/namespaces
     * Permissions: storagebox:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{namespace: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function namespacesDestroy(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/storagebox/{datastore}/namespaces', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * List namespaces
     * GET /products/storagebox/{datastore}/namespaces
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function namespacesIndex(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/namespaces', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Create namespace
     * POST /products/storagebox/{datastore}/namespaces
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{parent: string, name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function namespacesStore(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/namespaces', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Get optimal backup time slots
     * GET /products/storagebox/{datastore}/optimal-time
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function optimalTime(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/optimal-time', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Update prune / retention schedule
     * PUT /products/storagebox/{datastore}/prune
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{keep_last?: int|null, keep_hourly?: int|null, keep_daily?: int|null, keep_weekly?: int|null, keep_monthly?: int|null, keep_yearly?: int|null, schedule?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function pruneUpdate(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/storagebox/{datastore}/prune', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Disable geo-replication
     * DELETE /products/storagebox/{datastore}/replication
     * Permissions: storagebox:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function replicationDisable(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/storagebox/{datastore}/replication', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Get geo-replication status
     * GET /products/storagebox/{datastore}/replication
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function replicationIndex(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/replication', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Configure geo-replication
     * POST /products/storagebox/{datastore}/replication
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{replication_factor: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function replicationConfigure(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/replication', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Preview replication server placement
     * POST /products/storagebox/{datastore}/replication/preview
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{replication_factor: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function replicationPreview(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/replication/preview', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Get rescale history
     * GET /products/storagebox/{datastore}/rescale-log
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rescaleLog(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/rescale-log', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Rotate PBS / SSH credentials
     * POST /products/storagebox/{datastore}/rotate-credentials
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     * Generates new PBS API token and SSH password. Old credentials become invalid immediately.
     *
     * @param  string  $datastore  datastore
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rotateCredentials(string $datastore, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/rotate-credentials', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Delete file/directory via SFTP
     * DELETE /products/storagebox/{datastore}/sftp
     * Permissions: storagebox:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpDelete(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/storagebox/{datastore}/sftp', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * List SFTP directory
     * GET /products/storagebox/{datastore}/sftp
     * Permissions: storagebox:read
     * Response: json; json() preserves the full envelope and pagination.
     * Lists the contents of a remote directory via direct SFTP connection.
     *
     * @param  string  $datastore  datastore
     * @param  array{path?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpList(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/sftp', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Download file via SFTP
     * GET /products/storagebox/{datastore}/sftp/download
     * Permissions: storagebox:read
     * Response: binary; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{path: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpDownload(string $datastore, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/storagebox/{datastore}/sftp/download', ['datastore' => $datastore], $query, null, false, true);
    }

    /**
     * Create directory via SFTP
     * POST /products/storagebox/{datastore}/sftp/mkdir
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{path: string, name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpMkdir(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/sftp/mkdir', ['datastore' => $datastore], $query, $body, false, true);
    }

    /**
     * Upload file via SFTP
     * POST /products/storagebox/{datastore}/sftp/upload
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     * Multipart upload. The `file` field is the binary upload; `path` is the target directory.
     *
     * @param  string  $datastore  datastore
     * @param  array{path?: string|null, file: Upload}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpUpload(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/sftp/upload', ['datastore' => $datastore], $query, $body, true, true);
    }

    /**
     * Add SSH public keys
     * POST /products/storagebox/{datastore}/ssh-keys
     * Permissions: storagebox:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $datastore  datastore
     * @param  array{keys: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sshKeysStore(string $datastore, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/storagebox/{datastore}/ssh-keys', ['datastore' => $datastore], $query, $body, false, true);
    }
}
