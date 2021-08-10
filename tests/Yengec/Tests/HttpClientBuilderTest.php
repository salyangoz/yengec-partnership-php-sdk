<?php


namespace Yengec\Tests;

use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Psr\Http\Client\ClientInterface;
use Yengec\ClientBuilder;

class HttpClientBuilderTest extends TestCase
{
    protected ClientBuilder $builder;

    /**
     * Tests ClientBuilder can return singleton
     */
    public function testCreateHttpClient()
    {
        $this->builder = ClientBuilder::getInstance();

        $this->assertInstanceOf(ClientBuilder::class, $this->builder);
    }

    /**
     * Tests ClientBuilder accepts and applies httpClient plugins
     */
    public function testShouldAddApplyPlugins()
    {
        $this->builder = ClientBuilder::getInstance();

        $defaultUserAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1';
        $defaultHeaderPlugin = new HeaderDefaultsPlugin(array('User-Agent' => $defaultUserAgent));

        $this->builder->addPlugin($defaultHeaderPlugin);
        $client = $this->builder->getHttpClient();
        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    /**
     * Tests ClientBuilder removes applied httpClient plugins via fqcn
     */
    public function testShouldRemovePlugins()
    {
        $this->builder = ClientBuilder::getInstance();

        $defaultUserAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1';
        $defaultHeaderPlugin = new HeaderDefaultsPlugin(array('User-Agent' => $defaultUserAgent));
        $this->builder->addPlugin($defaultHeaderPlugin);

        $this->builder->removePlugin("HeaderDefaultsPlugin");
        $client = $this->builder->getHttpClient();
        $this->assertInstanceOf(ClientInterface::class, $client);
    }

}