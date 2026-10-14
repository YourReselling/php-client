<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;
use YourReselling\Upload;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Gameserver
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * List gameservers
     * GET /products/gameserver
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{per_page?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function list(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver', [], $query, null, false, true);
    }

    /**
     * Order gameserver
     * POST /products/gameserver
     * Permissions: gameservers:create
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{location_id: string, egg_id: string, name: string, cores: int, ram_mb: int, disk_gb: int, network_mode: 'shared_port'|'dedicated_ip', variables?: array<string, mixed>|null, extra_ports?: list<array{protocol: 'tcp'|'udp'}>|null, subdomain_zone_id?: string|null, subdomain?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function create(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver', [], $query, $body, false, true);
    }

    /**
     * Gameserver catalog
     * GET /products/gameserver/catalog
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     * Every game (egg) with description, logo_url and banner_url (public image URLs on the api host), dedicated_ip_recommended, the selectable versions (incl. java_major) and its variables. Each variable states input_type (text, password, number, select, toggle), value_type, the exact choices for selects, and its limits (min, max, min_length, max_length, pattern), so clients can render the right input without guessing.
     *
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catalog(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/catalog', [], $query, null, false, true);
    }

    /**
     * Egg variables
     * GET /products/gameserver/catalog/eggs/{egg}
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $egg  Egg ID from the catalog
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function catalogEgg(string $egg, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/catalog/eggs/{egg}', ['egg' => $egg], $query, null, false, true);
    }

    /**
     * Price quote
     * POST /products/gameserver/quote
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{location_id: string, cores: int, ram_mb: int, disk_gb: int, network_mode: 'shared_port'|'dedicated_ip', extra_ports?: list<array{protocol: 'tcp'|'udp'}>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function quote(array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/quote', [], $query, $body, false, true);
    }

    /**
     * Check subdomain
     * GET /products/gameserver/subdomain-check
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  array{zone_id: string, subdomain: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function subdomainCheck(array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/subdomain-check', [], $query, null, false, true);
    }

    /**
     * Delete gameserver
     * DELETE /products/gameserver/{server}
     * Permissions: gameservers:delete
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function delete(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Show gameserver
     * GET /products/gameserver/{server}
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function get(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}', ['server' => $server], $query, null, false, true);
    }

    /**
     * Rename gameserver
     * PATCH /products/gameserver/{server}
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array{name: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function rename(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/gameserver/{server}', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete a plugin or mod
     * DELETE /products/gameserver/{server}/addons
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{file: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array{file: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function addonsDestroy(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/addons', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List installed plugins or mods
     * GET /products/gameserver/{server}/addons
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function addonsIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/addons', ['server' => $server], $query, null, false, true);
    }

    /**
     * Install a Modrinth plugin or mod
     * POST /products/gameserver/{server}/addons/install
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{slug: string, version?: string|null, replace_file?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function addonsInstall(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/addons/install', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Search Modrinth for plugins or mods
     * GET /products/gameserver/{server}/addons/search
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{q: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function addonsSearch(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/addons/search', ['server' => $server], $query, null, false, true);
    }

    /**
     * Enable or disable a plugin/mod
     * POST /products/gameserver/{server}/addons/toggle
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{file: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function addonsToggle(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/addons/toggle', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List Modrinth versions for a plugin or mod
     * GET /products/gameserver/{server}/addons/versions
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{slug: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function addonsVersions(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/addons/versions', ['server' => $server], $query, null, false, true);
    }

    /**
     * Add extra port
     * POST /products/gameserver/{server}/allocations
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{port?: int|null, protocol: 'tcp'|'udp'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function allocationsStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/allocations', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Remove extra port
     * DELETE /products/gameserver/{server}/allocations/{allocation}
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  string  $allocation  allocation route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function allocationsDestroy(string $server, string $allocation, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/allocations/{allocation}', ['server' => $server, 'allocation' => $allocation], $query, $body, false, true);
    }

    /**
     * List backups
     * GET /products/gameserver/{server}/backups
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/backups', ['server' => $server], $query, null, false, true);
    }

    /**
     * Create backup
     * POST /products/gameserver/{server}/backups
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsStore(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/backups', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete backup
     * DELETE /products/gameserver/{server}/backups/{backup}
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  string  $backup  backup ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsDestroy(string $server, string $backup, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/backups/{backup}', ['server' => $server, 'backup' => $backup], $query, $body, false, true);
    }

    /**
     * Download backup
     * GET /products/gameserver/{server}/backups/{backup}/download
     * Permissions: gameservers:read
     * Response: binary; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  string  $backup  backup ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsDownload(string $server, string $backup, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/backups/{backup}/download', ['server' => $server, 'backup' => $backup], $query, null, false, true);
    }

    /**
     * Restore backup
     * POST /products/gameserver/{server}/backups/{backup}/restore
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  string  $backup  backup route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function backupsRestore(string $server, string $backup, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/backups/{backup}/restore', ['server' => $server, 'backup' => $backup], $query, $body, false, true);
    }

    /**
     * Send console command
     * POST /products/gameserver/{server}/command
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{command: string, mode?: 'console'|'exec'|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function command(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/command', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Open PTY console
     * GET /products/gameserver/{server}/console
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function console(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/console', ['server' => $server], $query, null, false, true);
    }

    /**
     * List databases
     * GET /products/gameserver/{server}/database
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/database', ['server' => $server], $query, null, false, true);
    }

    /**
     * Create plugin database
     * POST /products/gameserver/{server}/database
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{engine: 'mariadb'|'postgres'}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/database', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete database
     * DELETE /products/gameserver/{server}/database/{database}
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  string  $database  database ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseDestroy(string $server, string $database, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/database/{database}', ['server' => $server, 'database' => $database], $query, $body, false, true);
    }

    /**
     * Rotate database password
     * POST /products/gameserver/{server}/database/{database}/rotate
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  string  $database  database ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function databaseRotate(string $server, string $database, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/database/{database}/rotate', ['server' => $server, 'database' => $database], $query, $body, false, true);
    }

    /**
     * Delete file
     * DELETE /products/gameserver/{server}/file
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function fileDestroy(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/file', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Read file
     * GET /products/gameserver/{server}/file
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{path?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function fileShow(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/file', ['server' => $server], $query, null, false, true);
    }

    /**
     * Write file
     * PUT /products/gameserver/{server}/file
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{contents: string, path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function fileUpdate(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('PUT', '/products/gameserver/{server}/file', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List files
     * GET /products/gameserver/{server}/files
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{path?: mixed}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function files(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/files', ['server' => $server], $query, null, false, true);
    }

    /**
     * Zip selected files
     * POST /products/gameserver/{server}/files/archive
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{paths: list<string>, dest?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesArchive(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/files/archive', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Bulk delete files
     * POST /products/gameserver/{server}/files/bulk-delete
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{paths: list<string>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesBulkDelete(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/files/bulk-delete', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Change file mode
     * POST /products/gameserver/{server}/files/chmod
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{mode: string, path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesChmod(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/files/chmod', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Download a file
     * GET /products/gameserver/{server}/files/download
     * Permissions: gameservers:read
     * Response: binary; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{path: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesDownload(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/files/download', ['server' => $server], $query, null, false, true);
    }

    /**
     * Extract a zip or tar.gz
     * POST /products/gameserver/{server}/files/extract
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{path: string, dest?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesExtract(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/files/extract', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Rename file
     * POST /products/gameserver/{server}/files/rename
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{from: string, to: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesRename(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/files/rename', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Upload file
     * POST /products/gameserver/{server}/files/upload
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{contents?: string|null, file?: Upload|null, path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesUpload(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/files/upload', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Stop file IDE
     * DELETE /products/gameserver/{server}/ide
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ideStop(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/ide', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Open file IDE (legacy, use POST ide)
     * GET /products/gameserver/{server}/ide
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ide(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/ide', ['server' => $server], $query, null, false, true);
    }

    /**
     * Start file IDE
     * POST /products/gameserver/{server}/ide
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ideStart(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/ide', ['server' => $server], $query, $body, false, true);
    }

    /**
     * File IDE status
     * GET /products/gameserver/{server}/ide/status
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function ideStatus(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/ide/status', ['server' => $server], $query, null, false, true);
    }

    /**
     * Container logs
     * GET /products/gameserver/{server}/logs
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function logs(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/logs', ['server' => $server], $query, null, false, true);
    }

    /**
     * Enable mitigation
     * POST /products/gameserver/{server}/mitigate
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function mitigate(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/mitigate', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Create directory
     * POST /products/gameserver/{server}/mkdir
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{path: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function filesMkdir(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/mkdir', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List players
     * GET /products/gameserver/{server}/players
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function playersIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/players', ['server' => $server], $query, null, false, true);
    }

    /**
     * Kick, op, deop, ban or pardon a player
     * POST /products/gameserver/{server}/players
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{action: 'kick'|'op'|'deop'|'ban'|'pardon'|'whitelist'|'unwhitelist', player: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function playersAction(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/players', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Reinstall gameserver
     * POST /products/gameserver/{server}/reinstall
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{egg_id?: string|null, egg_version_id?: string|null, variables?: array<string, mixed>|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function reinstall(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/reinstall', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Resize CPU, RAM or disk
     * POST /products/gameserver/{server}/resize
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{cores: int, ram_mb: int, disk_gb?: int|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function resize(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/resize', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Restart gameserver
     * POST /products/gameserver/{server}/restart
     * Permissions: gameservers:power
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function restart(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/restart', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Malware scan
     * POST /products/gameserver/{server}/scan
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function scan(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/scan', ['server' => $server], $query, $body, false, true);
    }

    /**
     * List schedules
     * GET /products/gameserver/{server}/schedules
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/schedules', ['server' => $server], $query, null, false, true);
    }

    /**
     * Create schedule
     * POST /products/gameserver/{server}/schedules
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{action: 'backup'|'start'|'stop'|'restart'|'command', cron: string, name: string, payload?: string|null}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/schedules', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Delete schedule
     * DELETE /products/gameserver/{server}/schedules/{schedule}
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  string  $schedule  schedule route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesDestroy(string $server, string $schedule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/schedules/{schedule}', ['server' => $server, 'schedule' => $schedule], $query, $body, false, true);
    }

    /**
     * Update schedule
     * PATCH /products/gameserver/{server}/schedules/{schedule}
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  string  $schedule  schedule ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesUpdate(string $server, string $schedule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/gameserver/{server}/schedules/{schedule}', ['server' => $server, 'schedule' => $schedule], $query, $body, false, true);
    }

    /**
     * Run schedule now
     * POST /products/gameserver/{server}/schedules/{schedule}/run
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  string  $schedule  schedule ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function schedulesRun(string $server, string $schedule, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/schedules/{schedule}/run', ['server' => $server, 'schedule' => $schedule], $query, $body, false, true);
    }

    /**
     * Rotate SFTP password
     * POST /products/gameserver/{server}/sftp/rotate
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function sftpRotate(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/sftp/rotate', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Start gameserver
     * POST /products/gameserver/{server}/start
     * Permissions: gameservers:power
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function start(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/start', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Live stats
     * GET /products/gameserver/{server}/stats
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function stats(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/stats', ['server' => $server], $query, null, false, true);
    }

    /**
     * Historical resource stats
     * GET /products/gameserver/{server}/stats/history
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{period?: string}  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function statsHistory(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/stats/history', ['server' => $server], $query, null, false, true);
    }

    /**
     * Stop gameserver
     * POST /products/gameserver/{server}/stop
     * Permissions: gameservers:power
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function stop(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/stop', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Release subdomain
     * DELETE /products/gameserver/{server}/subdomain
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function subdomainDestroy(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('DELETE', '/products/gameserver/{server}/subdomain', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Assign subdomain
     * POST /products/gameserver/{server}/subdomain
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array{subdomain: string, subdomain_zone_id: string}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function subdomainStore(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/subdomain', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Disable mitigation
     * POST /products/gameserver/{server}/unmitigate
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function unmitigate(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/unmitigate', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Upgrade to dedicated IP
     * POST /products/gameserver/{server}/upgrade-dedicated
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  server route parameter
     * @param  array<string, mixed>  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function upgradeDedicated(string $server, array $body = [], array $query = []): Response
    {
        return $this->transport->send('POST', '/products/gameserver/{server}/upgrade-dedicated', ['server' => $server], $query, $body, false, true);
    }

    /**
     * Show server variables
     * GET /products/gameserver/{server}/variables
     * Permissions: gameservers:read
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function variablesIndex(string $server, array $query = []): Response
    {
        return $this->transport->send('GET', '/products/gameserver/{server}/variables', ['server' => $server], $query, null, false, true);
    }

    /**
     * Update server variables
     * PATCH /products/gameserver/{server}/variables
     * Permissions: gameservers:update
     * Response: json; json() preserves the full envelope and pagination.
     *
     * @param  string  $server  Gameserver ID
     * @param  array{variables: array<string, mixed>}  $body  Request fields; conditional rules are enforced by the API.
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function variablesUpdate(string $server, array $body, array $query = []): Response
    {
        return $this->transport->send('PATCH', '/products/gameserver/{server}/variables', ['server' => $server], $query, $body, false, true);
    }
}
