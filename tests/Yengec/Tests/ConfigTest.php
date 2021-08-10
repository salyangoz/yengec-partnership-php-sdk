<?php


namespace Yengec\Tests;

use Psr\Http\Message\UriInterface;
use Yengec\ClientBuilder;
use Yengec\Options;

class ConfigTest extends TestCase
{
    protected Options $config;

    /**
     * Test Config object can set and retrieve required fields
     */
    public function testShouldSetAndRetrieveFields(): void
    {
        $this->config = new Options(
            "id",
            "secret",
            "https://url.com"
        );

        $this->assertEquals('id', $this->config->getClientId());
        $this->assertEquals('secret', $this->config->getClientSecret());
        $this->assertEquals('https://url.com', $this->config->getBaseUrl());

        $this->assertInstanceOf(UriInterface::class, $this->config->getUriFactory());
        $this->assertInstanceOf(ClientBuilder::class, $this->config->getClientBuilder());
    }

    /**
     * Test Config object can be created without base_url
     */
    public function testCreateConfigWithoutBaseurl(): void
    {
        $this->config = new Options(
            "id",
            "secret"
        );

        $this->assertInstanceOf(Options::class, $this->config);
    }

}