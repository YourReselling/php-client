<?php

declare(strict_types=1);

namespace YourReselling;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use YourReselling\Account\Account;
use YourReselling\Announcements\Announcements;
use YourReselling\Asn\Asn;
use YourReselling\Billing\Billing;
use YourReselling\ContainerRegistry\ContainerRegistry;
use YourReselling\DDoS\DDoS;
use YourReselling\Dedicated\Dedicated;
use YourReselling\Domains\Domains;
use YourReselling\Inference\Inference;
use YourReselling\IpTunnels\IpTunnels;
use YourReselling\Ipv6\Ipv6;
use YourReselling\Kubernetes\Kubernetes;
use YourReselling\LoadBalancer\LoadBalancer;
use YourReselling\Plesk\Plesk;
use YourReselling\Ripe\Ripe;
use YourReselling\Rootserver\Rootserver;
use YourReselling\S3Storage\S3Storage;
use YourReselling\Ssl\Ssl;
use YourReselling\StorageBox\StorageBox;
use YourReselling\SubReseller\SubReseller;
use YourReselling\TeamSpeak\TeamSpeak;
use YourReselling\VPN\VPN;

/**
 * Reseller API client. api() exposes the complete, documented current API.
 * Existing resource helpers remain available for migration from version 2.
 */
class Client extends Transport
{
    private ?Account $accountHandler = null;

    private ?Announcements $announcementsHandler = null;

    private ?Billing $billingHandler = null;

    private ?DDoS $ddosHandler = null;

    private ?Domains $domainHandler = null;

    private ?Inference $inferenceHandler = null;

    private ?IpTunnels $ipTunnelsHandler = null;

    private ?Kubernetes $kubernetesHandler = null;

    private ?LoadBalancer $loadBalancerHandler = null;

    private ?Plesk $pleskHandler = null;

    private ?Rootserver $rootserverHandler = null;

    private ?SubReseller $subResellerHandler = null;

    private ?TeamSpeak $teamspeakHandler = null;

    private ?VPN $vpnHandler = null;

    private ?Asn $asnHandler = null;

    private ?ContainerRegistry $containerRegistryHandler = null;

    private ?Dedicated $dedicatedHandler = null;

    private ?Ipv6 $ipv6Handler = null;

    private ?Ripe $ripeHandler = null;

    private ?S3Storage $s3StorageHandler = null;

    private ?Ssl $sslHandler = null;

    private ?StorageBox $storageBoxHandler = null;

    /** $baseUrl is the URL before the version, e.g. https://resellingprovider.de/api/. */
    public function __construct(string $token, string $version = 'v1', ?ClientInterface $httpClient = null, ?string $baseUrl = null)
    {
        if (! preg_match('/^v[0-9]+$/', $version)) {
            throw new \InvalidArgumentException('Version must have the form v1.');
        }
        parent::__construct($token, rtrim($baseUrl ?? 'https://resellingprovider.de/api/', '/').'/'.$version, $httpClient);
    }

    /** Access all registered endpoints with current request shapes and permission documentation. */
    public function api(): Api
    {
        return new Api($this);
    }

    /** @return array<string|int, mixed> Legacy data-only decoder; send()->json() preserves pagination. */
    public function processRequest(ResponseInterface $response): array
    {
        return $this->legacyData($this->checked($response));
    }

    /** @return array<string|int, mixed> */
    private function legacyData(Response $response): array
    {
        $data = $response->data();

        return is_array($data) ? $data : [];
    }

    /** @param array<string,mixed> $params @return array<string|int,mixed> */
    public function get(string $actionPath, array $params = []): array
    {
        return $this->legacyData($this->send('GET', $actionPath, [], $params));
    }

    /** @param array<string,mixed> $params @return array<string|int,mixed> */
    public function post(string $actionPath, array $params = []): array
    {
        return $this->legacyData($this->send('POST', $actionPath, [], [], $params));
    }

    /** @param array<string,mixed> $params @return array<string|int,mixed> */
    public function put(string $actionPath, array $params = []): array
    {
        return $this->legacyData($this->send('PUT', $actionPath, [], [], $params));
    }

    /** @param array<string,mixed> $params @return array<string|int,mixed> */
    public function patch(string $actionPath, array $params = []): array
    {
        return $this->legacyData($this->send('PATCH', $actionPath, [], [], $params));
    }

    /** @param array<string,mixed> $params @return array<string|int,mixed> */
    public function delete(string $actionPath, array $params = []): array
    {
        return $this->legacyData($this->send('DELETE', $actionPath, [], [], $params));
    }

    /** @param array<string,mixed> $params */
    public function getRaw(string $actionPath, array $params = []): string
    {
        return $this->send('GET', $actionPath, [], $params)->text();
    }

    /** @param array<string,mixed> $params */
    public function postRaw(string $actionPath, array $params = []): string
    {
        return $this->send('POST', $actionPath, [], [], $params)->text();
    }

    /** @param list<array{name:string,contents:mixed,filename?:string,headers?:array<string,string>}> $multipart */
    public function postMultipart(string $actionPath, array $multipart): array
    {
        $body = [];
        foreach ($multipart as $part) {
            $body[$part['name']] = isset($part['filename'])
                ? new Upload($part['contents'], $part['filename'], $part['headers']['Content-Type'] ?? 'application/octet-stream')
                : $part['contents'];
        }

        return $this->legacyData($this->send('POST', $actionPath, [], [], $body, true));
    }

    public function account(): Account
    {
        return $this->accountHandler ??= new Account($this);
    }

    public function announcements(): Announcements
    {
        return $this->announcementsHandler ??= new Announcements($this);
    }

    public function billing(): Billing
    {
        return $this->billingHandler ??= new Billing($this);
    }

    public function ddos(): DDoS
    {
        return $this->ddosHandler ??= new DDoS($this);
    }

    public function domain(): Domains
    {
        return $this->domainHandler ??= new Domains($this);
    }

    public function inference(): Inference
    {
        return $this->inferenceHandler ??= new Inference($this);
    }

    public function ipTunnels(): IpTunnels
    {
        return $this->ipTunnelsHandler ??= new IpTunnels($this);
    }

    public function kubernetes(): Kubernetes
    {
        return $this->kubernetesHandler ??= new Kubernetes($this);
    }

    public function loadBalancer(): LoadBalancer
    {
        return $this->loadBalancerHandler ??= new LoadBalancer($this);
    }

    public function plesk(): Plesk
    {
        return $this->pleskHandler ??= new Plesk($this);
    }

    public function rootserver(): Rootserver
    {
        return $this->rootserverHandler ??= new Rootserver($this);
    }

    public function asn(): Asn
    {
        return $this->asnHandler ??= new Asn($this);
    }

    public function containerRegistry(): ContainerRegistry
    {
        return $this->containerRegistryHandler ??= new ContainerRegistry($this);
    }

    public function dedicated(): Dedicated
    {
        return $this->dedicatedHandler ??= new Dedicated($this);
    }

    public function ipv6(): Ipv6
    {
        return $this->ipv6Handler ??= new Ipv6($this);
    }

    public function ripe(): Ripe
    {
        return $this->ripeHandler ??= new Ripe($this);
    }

    public function s3Storage(): S3Storage
    {
        return $this->s3StorageHandler ??= new S3Storage($this);
    }

    public function ssl(): Ssl
    {
        return $this->sslHandler ??= new Ssl($this);
    }

    public function storageBox(): StorageBox
    {
        return $this->storageBoxHandler ??= new StorageBox($this);
    }

    public function subReseller(): SubReseller
    {
        return $this->subResellerHandler ??= new SubReseller($this);
    }

    public function teamspeak(): TeamSpeak
    {
        return $this->teamspeakHandler ??= new TeamSpeak($this);
    }

    public function vpn(): VPN
    {
        return $this->vpnHandler ??= new VPN($this);
    }
}
