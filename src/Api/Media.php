<?php

declare(strict_types=1);

namespace YourReselling\Api;

use YourReselling\ApiException;
use YourReselling\Response;
use YourReselling\Transport;

/** Generated from actual routes and validation. Regenerate with tools/generate-sdks.py. */
final class Media
{
    public function __construct(private readonly Transport $transport) {}

    /**
     * Gameserver egg logo or banner (image)
     * GET /media/eggs/{egg}/{kind}
     * Permissions: Public endpoint; no API key is sent.
     * Response: binary; json() preserves the full envelope and pagination.
     * Public, no API key needed, so it can be used directly in an <img> tag. Returns the image itself (png, jpg or webp) with long-lived cache headers and an ETag (304 supported). The catalog already returns ready-made URLs in "logo_url" and "banner_url": use those, they point at the api.* host and carry a ?v= cache-busting parameter. Available as https://{api-host}/v1/media/eggs/{egg}/{kind} as well.
     *
     * @param  string  $egg  Egg ID from the catalog
     * @param  string  $kind  Which image
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function egg(string $egg, string $kind, array $query = []): Response
    {
        return $this->transport->send('GET', '/media/eggs/{egg}/{kind}', ['egg' => $egg, 'kind' => $kind], $query, null, false, false);
    }

    /**
     * Operating system or app logo or banner (image)
     * GET /media/os/{os}/{kind}
     * Permissions: Public endpoint; no API key is sent.
     * Response: binary; json() preserves the full envelope and pagination.
     * Public, no API key needed, so it can be used directly in an <img> tag. Returns the image itself (svg, png, jpg or webp) with long-lived cache headers and an ETag (304 supported). Without an uploaded logo the bundled icon is returned. GET /rootserver/os-list already returns ready-made URLs in "logo_url" and "banner_url": use those, they point at the api.* host and carry a ?v= cache-busting parameter. Available as https://{api-host}/v1/media/os/{os}/{kind} as well.
     *
     * @param  string  $os  Operating system or app ID from GET /rootserver/os-list
     * @param  string  $kind  Which image
     * @param  array<string, mixed>  $query  Query fields; null values are omitted.
     *
     * @throws ApiException
     */
    public function os(string $os, string $kind, array $query = []): Response
    {
        return $this->transport->send('GET', '/media/os/{os}/{kind}', ['os' => $os, 'kind' => $kind], $query, null, false, false);
    }
}
