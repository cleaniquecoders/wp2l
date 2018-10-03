<?php

namespace App\Services\WordPress;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

abstract class BaseService
{
    /**
     * The uri.
     *
     * @var
     */
    protected $uri;

    /**
     * The domain.
     *
     * @var
     */
    protected $domain;

    abstract public function handle();

    /**
     * Create an domain of GetPost.
     *
     * @return App\Services\WordPress\GetPost
     */
    public static function make($domain)
    {
        return new self();
    }

    /**
     * Get Domain.
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set Domain.
     *
     * @param string $domain
     *
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Set URI.
     *
     * @param string $uri
     *
     * @return $this
     */
    public function setUri(string $uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get URI.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Get new Guzzle Client.
     *
     * @return \GuzzleHttp\Client
     */
    protected function getClient()
    {
        return new Client([
            'base_uri' => $this->domain,
        ]);
    }

    /**
     * Get Guzzle/Request.
     *
     * @param int $offset
     *
     * @return GuzzleHttp\Psr7\Request
     */
    protected function getRequest($page)
    {
        return new Request('GET', $this->getUri() . '?per_page=100&page=' . $page);
    }

    /**
     * Get Download Request.
     *
     * @param string $path Path to save the downloaded file
     *
     * @return GuzzleHttp\Psr7\Request
     */
    protected function getDownloadRequest($path)
    {
        return $this->getClient()->request('GET', $this->getUri(), [
            'sink' => $path,
        ]);
    }
}
