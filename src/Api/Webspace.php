<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;
use YourReselling\Upload;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Webspace
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List webspaces
     * GET /products/webspace
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{per_page?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace', [], $query, null, false, true);
    }

    /**
     * Order webspace
     * POST /products/webspace
     * Permissions: webspaces:create
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{location_id: string, egg_id: string, name: string, cores?: int|null, ram_mb?: int|null, disk_gb?: int|null, variables?: array<string, mixed>|null, dedicated_ip?: mixed, network_mode?: mixed}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace', [], $query, $body, false, true);
    }

    /**
     * Webspace catalog
     * GET /products/webspace/catalog
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catalog(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/catalog', [], $query, null, false, true);
    }

    /**
     * Egg variables
     * GET /products/webspace/catalog/eggs/{egg}
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $egg  Egg ID from the catalog
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catalogEgg(string $egg, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/catalog/eggs/{egg}', ['egg' => $egg], $query, null, false, true);
    }

    /**
     * Price quote
     * POST /products/webspace/quote
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{location_id: string, egg_id?: string, cores?: int, ram_mb?: int, disk_gb?: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function quote(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/quote', [], $query, $body, false, true);
    }

    /**
     * Delete webspace
     * DELETE /products/webspace/{webspace}
     * Permissions: webspaces:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Show webspace
     * GET /products/webspace/{webspace}
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Rename webspace
     * PATCH /products/webspace/{webspace}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rename(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/webspace/{webspace}', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * List backups
     * GET /products/webspace/{webspace}/backups
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsIndex(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/backups', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Create backup
     * POST /products/webspace/{webspace}/backups
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsStore(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/backups', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Delete backup
     * DELETE /products/webspace/{webspace}/backups/{backup}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  string  $backup  backup ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsDestroy(string $webspace, string $backup, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/backups/{backup}', ['webspace' => $webspace, 'backup' => $backup], $query, $body, false, true);
    }

    /**
     * Download backup
     * GET /products/webspace/{webspace}/backups/{backup}/download
     * Permissions: webspaces:read
     * Response: binary; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  string  $backup  backup ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsDownload(string $webspace, string $backup, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/backups/{backup}/download', ['webspace' => $webspace, 'backup' => $backup], $query, null, false, true);
    }

    /**
     * Restore backup
     * POST /products/webspace/{webspace}/backups/{backup}/restore
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $backup  backup route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsRestore(string $webspace, string $backup, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/backups/{backup}/restore', ['webspace' => $webspace, 'backup' => $backup], $query, $body, false, true);
    }

    /**
     * List databases
     * GET /products/webspace/{webspace}/database
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseIndex(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/database', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Create webspace database
     * POST /products/webspace/{webspace}/database
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{engine: 'mariadb'|'postgres'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseStore(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/database', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Delete database
     * DELETE /products/webspace/{webspace}/database/{database}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  string  $database  database ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseDestroy(string $webspace, string $database, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/database/{database}', ['webspace' => $webspace, 'database' => $database], $query, $body, false, true);
    }

    /**
     * Rotate database password
     * POST /products/webspace/{webspace}/database/{database}/rotate
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  string  $database  database ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseRotate(string $webspace, string $database, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/database/{database}/rotate', ['webspace' => $webspace, 'database' => $database], $query, $body, false, true);
    }

    /**
     * Add domain
     * POST /products/webspace/{webspace}/domains
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{hostname: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsStore(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/domains', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Remove domain
     * DELETE /products/webspace/{webspace}/domains/{domain}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $domain  domain route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsDestroy(string $webspace, string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/domains/{domain}', ['webspace' => $webspace, 'domain' => $domain], $query, $body, false, true);
    }

    /**
     * Verify domain DNS
     * POST /products/webspace/{webspace}/domains/{domain}/verify
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $domain  domain route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function domainsVerify(string $webspace, string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/domains/{domain}/verify', ['webspace' => $webspace, 'domain' => $domain], $query, $body, false, true);
    }

    /**
     * Delete file
     * DELETE /products/webspace/{webspace}/file
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function fileDestroy(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/file', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Read file
     * GET /products/webspace/{webspace}/file
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{path?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function fileShow(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/file', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Write file
     * PUT /products/webspace/{webspace}/file
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{contents: string, path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function fileUpdate(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/webspace/{webspace}/file', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * List files
     * GET /products/webspace/{webspace}/files
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{path?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function files(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/files', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Archive files
     * POST /products/webspace/{webspace}/files/archive
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{dest?: string|null, paths: list<string>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesArchive(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/files/archive', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Bulk delete files
     * POST /products/webspace/{webspace}/files/bulk-delete
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{paths: list<string>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesBulkDelete(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/files/bulk-delete', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Change file mode
     * POST /products/webspace/{webspace}/files/chmod
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{path: string, mode: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesChmod(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/files/chmod', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Download file
     * GET /products/webspace/{webspace}/files/download
     * Permissions: webspaces:read
     * Response: binary; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{path: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesDownload(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/files/download', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Extract archive
     * POST /products/webspace/{webspace}/files/extract
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{dest?: string|null, path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesExtract(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/files/extract', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Rename file
     * POST /products/webspace/{webspace}/files/rename
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{from: string, to: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesRename(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/files/rename', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Upload file
     * POST /products/webspace/{webspace}/files/upload
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{contents?: string|null, file?: Upload|null, path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesUpload(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/files/upload', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Stop file IDE
     * DELETE /products/webspace/{webspace}/ide
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ideStop(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/ide', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Open file IDE (legacy, use POST ide)
     * GET /products/webspace/{webspace}/ide
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ide(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/ide', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Start file IDE
     * POST /products/webspace/{webspace}/ide
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ideStart(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/ide', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * File IDE status
     * GET /products/webspace/{webspace}/ide/status
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ideStatus(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/ide/status', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Container logs
     * GET /products/webspace/{webspace}/logs
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function logs(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/logs', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Attach mailbox
     * POST /products/webspace/{webspace}/mail
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{mail_mailbox_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mailAttach(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/mail', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Create directory
     * POST /products/webspace/{webspace}/mkdir
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesMkdir(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/mkdir', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Update PHP limits
     * PATCH /products/webspace/{webspace}/php
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{php_memory_limit: '128M'|'256M'|'512M'|'1024M', php_upload_mb: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function phpUpdate(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/webspace/{webspace}/php', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Reinstall webspace
     * POST /products/webspace/{webspace}/reinstall
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reinstall(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/reinstall', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Resize webspace
     * POST /products/webspace/{webspace}/resize
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{cores: int, disk_gb?: int|null, ram_mb: int}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function resize(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/resize', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * List schedules
     * GET /products/webspace/{webspace}/schedules
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesIndex(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/schedules', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Create schedule
     * POST /products/webspace/{webspace}/schedules
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{action: 'backup'|'start'|'stop'|'restart'|'command', cron: string, name: string, payload?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesStore(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/schedules', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Delete schedule
     * DELETE /products/webspace/{webspace}/schedules/{schedule}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $schedule  schedule route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesDestroy(string $webspace, string $schedule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/schedules/{schedule}', ['webspace' => $webspace, 'schedule' => $schedule], $query, $body, false, true);
    }

    /**
     * Update schedule
     * PATCH /products/webspace/{webspace}/schedules/{schedule}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  string  $schedule  schedule ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesUpdate(string $webspace, string $schedule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/webspace/{webspace}/schedules/{schedule}', ['webspace' => $webspace, 'schedule' => $schedule], $query, $body, false, true);
    }

    /**
     * Run schedule now
     * POST /products/webspace/{webspace}/schedules/{schedule}/run
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  Webspace ID
     * @param  string  $schedule  schedule ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesRun(string $webspace, string $schedule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/schedules/{schedule}/run', ['webspace' => $webspace, 'schedule' => $schedule], $query, $body, false, true);
    }

    /**
     * Rotate SFTP password
     * POST /products/webspace/{webspace}/sftp/rotate
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpRotate(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/sftp/rotate', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * List websites in a resource pool
     * GET /products/webspace/{webspace}/sites
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesIndex(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/sites', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Create website or subdomain
     * POST /products/webspace/{webspace}/sites
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{document_root?: string, egg_id: string, hostname?: string|null, name: string, parent_domain_id?: string|null, subdomain?: string|null, variables?: list<mixed>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesStore(string $webspace, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/sites', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Enable website management for an existing webspace
     * POST /products/webspace/{webspace}/sites/initialize
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesInitialize(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/sites/initialize', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Remove website and retain project files
     * DELETE /products/webspace/{webspace}/sites/{site}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesDestroy(string $webspace, string $site, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/sites/{site}', ['webspace' => $webspace, 'site' => $site], $query, $body, false, true);
    }

    /**
     * Update website runtime and settings
     * PATCH /products/webspace/{webspace}/sites/{site}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  array{document_root?: string, egg_id?: string, name?: string, php_memory_limit?: '128M'|'256M'|'512M'|'1024M', php_upload_mb?: int, status?: 'active'|'suspended', variables?: list<mixed>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesUpdate(string $webspace, string $site, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/webspace/{webspace}/sites/{site}', ['webspace' => $webspace, 'site' => $site], $query, $body, false, true);
    }

    /**
     * Attach a domain or subdomain to a website
     * POST /products/webspace/{webspace}/sites/{site}/domains
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  array{hostname?: string|null, parent_domain_id?: string|null, subdomain?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesStoreDomain(string $webspace, string $site, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/sites/{site}/domains', ['webspace' => $webspace, 'site' => $site], $query, $body, false, true);
    }

    /**
     * Remove a website domain
     * DELETE /products/webspace/{webspace}/sites/{site}/domains/{domain}
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  string  $domain  domain route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesDestroyDomain(string $webspace, string $site, string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/webspace/{webspace}/sites/{site}/domains/{domain}', ['webspace' => $webspace, 'site' => $site, 'domain' => $domain], $query, $body, false, true);
    }

    /**
     * Verify website domain DNS
     * POST /products/webspace/{webspace}/sites/{site}/domains/{domain}/verify
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  string  $domain  domain route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesVerifyDomain(string $webspace, string $site, string $domain, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/sites/{site}/domains/{domain}/verify', ['webspace' => $webspace, 'site' => $site, 'domain' => $domain], $query, $body, false, true);
    }

    /**
     * Website logs
     * GET /products/webspace/{webspace}/sites/{site}/logs
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesLogs(string $webspace, string $site, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/sites/{site}/logs', ['webspace' => $webspace, 'site' => $site], $query, null, false, true);
    }

    /**
     * Configure automatic or custom TLS certificate
     * PUT /products/webspace/{webspace}/sites/{site}/ssl
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  array{custom_cert?: string|null, custom_key?: string|null, ssl_mode: 'acme'|'custom'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesSsl(string $webspace, string $site, array $body, array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/webspace/{webspace}/sites/{site}/ssl', ['webspace' => $webspace, 'site' => $site], $query, $body, false, true);
    }

    /**
     * Website live resource usage
     * GET /products/webspace/{webspace}/sites/{site}/stats
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  string  $site  site route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sitesStats(string $webspace, string $site, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/sites/{site}/stats', ['webspace' => $webspace, 'site' => $site], $query, null, false, true);
    }

    /**
     * Traffic stats
     * GET /products/webspace/{webspace}/stats
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function stats(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/stats', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Traffic history
     * GET /products/webspace/{webspace}/stats/history
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array{period?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function statsHistory(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/stats/history', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Live resource usage
     * GET /products/webspace/{webspace}/stats/live
     * Permissions: webspaces:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function statsLive(string $webspace, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/webspace/{webspace}/stats/live', ['webspace' => $webspace], $query, null, false, true);
    }

    /**
     * Suspend webspace
     * POST /products/webspace/{webspace}/suspend
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function suspend(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/suspend', ['webspace' => $webspace], $query, $body, false, true);
    }

    /**
     * Unsuspend webspace
     * POST /products/webspace/{webspace}/unsuspend
     * Permissions: webspaces:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $webspace  webspace route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function unsuspend(string $webspace, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/webspace/{webspace}/unsuspend', ['webspace' => $webspace], $query, $body, false, true);
    }
}
