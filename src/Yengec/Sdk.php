<?php

declare(strict_types=1);

namespace Yengec;

use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Yengec\Endpoint\Integration\Integration;
use Yengec\Endpoint\Package\Package;
use Yengec\Endpoint\Partnership\Account;
use Yengec\Endpoint\Subscription\Subscribe;
use Yengec\Exception\InvalidArgumentException;
use Yengec\HttpClient\Plugin\Authentication;

final class Sdk
{

    /**
     * Authenticate using JSON Web Token
     *
     * @var string
     */
    const AUTH_JWT = 'jwt';

    /**
     * @var string
     */
    private string $apiVersion;

    /**
     * @var Options
     */
    private Options $option;


    /**
     * @var ClientBuilder
     */
    private ClientBuilder $clientBuilder;


    /**
     * Instantiates a new Yengeç Api client.
     *
     * @param Options $option
     * @param string|null $apiVersion
     */
    public function __construct(Options $option, string $apiVersion = null)
    {
        $this->option = $option;
        $this->apiVersion = $apiVersion ?? 'v1.0';
        $this->clientBuilder = $this->option->getClientBuilder();

        # Adding default plugins to http client
        $this->clientBuilder->addPlugin(new BaseUriPlugin($option->getUriFactory()));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'User-Agent' => 'php-yengec-api',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            )
        );

        # Add authentication plugin
        $this->authenticate($this->option);
    }

    /**
     * @param string $token
     * @param string $authMethod
     * @return Sdk
     */
    public function addAuthToken(string $token, string $authMethod): Sdk
    {
        $this->authenticate($this->option, $token, $authMethod);
        return $this;
    }

    /**
     * @return HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->clientBuilder->getHttpClient();
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * Authenticate a user for all next requests.
     *
     * @param Options $option
     * @param string|null $token
     * @param string|null $authMethod One of the AUTH_* class constants
     *
     * @return void
     */
    public function authenticate(Options $option, string $token = null, string $authMethod = null): void
    {
        $this->getClientBuilder()->removePlugin(Authentication::class);
        $this->getClientBuilder()->addPlugin(new Authentication($option->getClientId(), $option->getClientSecret(), $token, $authMethod));
    }

    /**
     * return requested endpoint instance
     *
     * @param $name
     * @return Account|Subscribe|Package|Integration|InvalidArgumentException
     */
    public function endpoint($name): Account|Subscribe|Package|Integration|InvalidArgumentException
    {
        switch (strtolower($name)){
            case 'partnership':
                $endpoint = new Account($this);
                break;
            case 'subscription':
                $endpoint = new Subscribe($this);
                break;
            case 'package':
                $endpoint = new Package($this);
                break;
            case 'integration':
                $endpoint = new Integration($this);
                break;
            default:
                return new InvalidArgumentException(sprintf('undefined endpoint api instance is called: %s', $name));
        }

        return $endpoint;
    }

    /**
     * @return ClientBuilder
     */
    protected function getClientBuilder(): ClientBuilder
    {
        return $this->clientBuilder;
    }
}