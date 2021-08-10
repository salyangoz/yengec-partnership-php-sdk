<?php

declare(strict_types=1);

namespace Yengec\HttpClient\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Yengec\Exception\RuntimeException;
use Psr\Http\Message\RequestInterface;
use Yengec\Sdk;

final class Authentication implements Plugin
{

    /**
     * @var string
     */
    private string $client_id;

    /**
     * @var string
     */
    private string $client_secret;

    /**
     * @var string|null
     */
    private ?string $token;

    /**
     * @var string|null
     */
    private ?string $method;

    /**
     * Authentication constructor.
     * @param string           $client_id Yengeç client_id/token
     * @param string $client_secret   Yengeç client_secret/
     * @param string|null $token      Yengeç jwt token
     * @param string|null $method     one of AUTH_* constants in Sdk
     */
    public function __construct(string $client_id,
                                string $client_secret,
                                ?string $token,
                                ?string $method)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
        $this->token = $token;
        $this->method = $method;
    }

    /**
     * @param RequestInterface $request
     * @param callable $next
     * @param callable $first
     * @return Promise
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {

        //Default required auth parameters
        $request = $request->withHeader(
            'client-id',
            $this->client_id,
        );

        $request = $request->withAddedHeader(
            'client-secret',
            $this->client_secret
        );

        switch ($this->method) {
            case Sdk::AUTH_JWT:
                $request = $request->withAddedHeader(
                    'Authorization',
                    sprintf('Bearer %s', $this->token)
                );
                break;

            case null:
                break;

            default:
                throw new RuntimeException(sprintf('%s not yet implemented', $this->method));
        }

        return $next($request);
    }

}