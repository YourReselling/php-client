<?php

declare(strict_types=1);

namespace YourReselling;

/** Generated resource groups for all registered public v1 endpoints. */
final class Api
{
    public function __construct(private readonly Transport $transport) {}

    public function account(): Api\Account
    {
        return new Api\Account($this->transport);
    }

    public function announcements(): Api\Announcements
    {
        return new Api\Announcements($this->transport);
    }

    public function asn(): Api\Asn
    {
        return new Api\Asn($this->transport);
    }

    public function billing(): Api\Billing
    {
        return new Api\Billing($this->transport);
    }

    public function containerRegistry(): Api\ContainerRegistry
    {
        return new Api\ContainerRegistry($this->transport);
    }

    public function ddos(): Api\Ddos
    {
        return new Api\Ddos($this->transport);
    }

    public function dedicated(): Api\Dedicated
    {
        return new Api\Dedicated($this->transport);
    }

    public function domains(): Api\Domains
    {
        return new Api\Domains($this->transport);
    }

    public function gameserver(): Api\Gameserver
    {
        return new Api\Gameserver($this->transport);
    }

    public function inference(): Api\Inference
    {
        return new Api\Inference($this->transport);
    }

    public function ipTunnels(): Api\IpTunnels
    {
        return new Api\IpTunnels($this->transport);
    }

    public function ipv6(): Api\Ipv6
    {
        return new Api\Ipv6($this->transport);
    }

    public function kubernetes(): Api\Kubernetes
    {
        return new Api\Kubernetes($this->transport);
    }

    public function licenses(): Api\Licenses
    {
        return new Api\Licenses($this->transport);
    }

    public function loadbalancer(): Api\Loadbalancer
    {
        return new Api\Loadbalancer($this->transport);
    }

    public function mailserver(): Api\Mailserver
    {
        return new Api\Mailserver($this->transport);
    }

    public function media(): Api\Media
    {
        return new Api\Media($this->transport);
    }

    public function plesk(): Api\Plesk
    {
        return new Api\Plesk($this->transport);
    }

    public function ripe(): Api\Ripe
    {
        return new Api\Ripe($this->transport);
    }

    public function rootserver(): Api\Rootserver
    {
        return new Api\Rootserver($this->transport);
    }

    public function s3Storage(): Api\S3Storage
    {
        return new Api\S3Storage($this->transport);
    }

    public function sslCertificates(): Api\SslCertificates
    {
        return new Api\SslCertificates($this->transport);
    }

    public function storagebox(): Api\Storagebox
    {
        return new Api\Storagebox($this->transport);
    }

    public function subResellers(): Api\SubResellers
    {
        return new Api\SubResellers($this->transport);
    }

    public function teamspeak(): Api\Teamspeak
    {
        return new Api\Teamspeak($this->transport);
    }

    public function vpn(): Api\Vpn
    {
        return new Api\Vpn($this->transport);
    }

    public function webspace(): Api\Webspace
    {
        return new Api\Webspace($this->transport);
    }
}
