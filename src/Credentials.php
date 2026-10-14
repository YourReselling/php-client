<?php

declare(strict_types=1);

namespace YourReselling;

class Credentials
{
    private string $token;

    private string $url;

    private string $version;

    public function __construct(string $token, string $version = 'v1', ?string $url = null)
    {
        $this->token = $token;
        $this->url = $url ?? 'https://resellingprovider.de/api/';
        $this->version = $version;
    }

    public function __toString(): string
    {
        return sprintf('[Host: %s], [Token: %s]', $this->url, '[redacted]');
    }

    /** Debugging never prints the API token. @return array<string,string> */
    public function __debugInfo(): array
    {
        return ['url' => $this->url, 'version' => $this->version, 'token' => '[redacted]'];
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
