<?php

declare(strict_types=1);

namespace Yengec;

use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Options
{

    private array $options;

    /**
     * Options constructor.
     * @param string $client_id
     * @param string $client_secret
     * @param string|null $baseUrl
     */
    public function __construct(string $client_id, string $client_secret, string $baseUrl = null, ClientBuilder $clientBuilder = null)
    {
        $this->options["client_id"] =  $client_id;
        $this->options["client_secret"] = $client_secret;
        if($baseUrl)
            $this->options["base_url"] = $baseUrl;
        if($clientBuilder)
            $this->options["client_builder"] = $clientBuilder;

        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($this->options);
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'client_builder' => ClientBuilder::getInstance(),
                'uri_factory' => Psr17FactoryDiscovery::findUriFactory(),
                'base_url' => 'https://api-test.yengec.co/', // Todo change this to prod uri
            ]
        );

        $resolver->setDefined([
            'client_id',
            'client_secret'
        ]);

        #config fields validation
        $resolver->setAllowedTypes('client_builder', ClientBuilder::class);
        $resolver->setAllowedTypes('uri_factory', UriFactoryInterface::class);
        $resolver->setAllowedTypes('base_url', 'string');
        $resolver->setAllowedTypes('client_id', 'string');
        $resolver->setAllowedTypes('client_secret', 'string');

        # Mark fields required
        $resolver->setRequired("client_id");
        $resolver->setRequired("client_secret");
    }

    /**
     * @return ClientBuilder
     */
    public function getClientBuilder(): ClientBuilder
    {
        return $this->options["client_builder"];
    }

    /**
     * @return UriFactoryInterface
     */
    public function getUriFactoryInterface(): UriFactoryInterface
    {
        return $this->options["uri_factory"];
    }

    /**
     * @return UriInterface
     */
    public function getUriFactory(): UriInterface
    {
        return $this->getUriFactoryInterface()->createUri($this->options["base_url"]);
    }

    /**
     * @return String
     */
    public function getClientId(): String
    {
        return $this->options["client_id"];
    }

    /**
     * @return String
     */
    public function getClientSecret(): String
    {
        return $this->options["client_secret"];
    }

    /**
     * @return String
     */
    public function getBaseUrl(): String
    {
        return $this->options["base_url"];
    }


}