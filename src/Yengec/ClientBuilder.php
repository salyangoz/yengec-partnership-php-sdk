<?php

declare(strict_types=1);

namespace Yengec;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class ClientBuilder
{
    //Singleton
    private static ?ClientBuilder $clientInstance = null;

    private ?ClientInterface $httpClient = null;
    
    private ?RequestFactoryInterface $requestFactoryInterface = null;
    
    private ?StreamFactoryInterface $streamFactoryInterface = null;
    
    private array $plugins = [];

    /**
     * ClientBuilder constructor.
     */
    private function __construct(ClientInterface $client = null) {
        if($this->httpClient === null)
            $this->httpClient = $client ?? HttpClientDiscovery::find();
        if($this->requestFactoryInterface === null)
            $this->requestFactoryInterface = Psr17FactoryDiscovery::findRequestFactory();
        if($this->streamFactoryInterface === null)
            $this->streamFactoryInterface = Psr17FactoryDiscovery::findStreamFactory();
    }

    public static function getInstance(ClientInterface $client = null): ClientBuilder
    {
        if(self::$clientInstance == null)
            self::$clientInstance = new ClientBuilder($client);

        return self::$clientInstance;
    }

    /**
     * @param Plugin $plugin
     */
    public function addPlugin(Plugin $plugin): void
    {
        $this->plugins[] = $plugin;   
    }

    /**
     * Remove a plugin by its fully qualified class name (FQCN).
     *
     * @param string $fqcn
     *
     * @return void
     */
    public function removePlugin(string $fqcn): void
    {
        foreach ($this->plugins as $idx => $plugin) {
            if ($plugin instanceof $fqcn) {
                unset($this->plugins[$idx]);
            }
        }
    }

    /**
     * @return HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        $pluginClient = (new PluginClientFactory())->createClient($this->httpClient, $this->plugins);

        return new HttpMethodsClient(
            $pluginClient,
            $this->requestFactoryInterface,
            $this->streamFactoryInterface
        );
    }

}
