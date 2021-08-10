<?php

declare(strict_types=1);

namespace Yengec\Endpoint;

use Http\Client\Exception;
use Psr\Http\Message\ResponseInterface;
use Yengec\Request;
use Yengec\Response;
use Yengec\Sdk;

/**
 * Class AbstractEndpoint
 * @package Yengec\Api\Endpoint
 *
 * @author Amir Ahmed <amirtheahmed@gmail.com>
 */

abstract class AbstractEndpoint
{

    /**
     *  Yengec sdk client instance
     * 
     * @var Sdk
     */
    private Sdk $sdkClient;

    /**
     * AbstractEndpoint constructor.
     * @param Sdk $sdkClient
     * @return Void
     */
    public function __construct(Sdk $sdkClient)
    {
        $this->sdkClient = $sdkClient;
    }

    /**
     * Get the client instance.
     *
     * @return Sdk
     */
    protected function getSdkClient(): Sdk
    {
        return $this->sdkClient;
    }

    /**
     * Get the API version.
     *
     * @return string
     */
    protected function getApiVersion(): string
    {
        return $this->sdkClient->getApiVersion();
    }

    /**
     * @return AbstractEndpoint
     */
    public function configure(): AbstractEndpoint
    {
        return $this;
    }

    /**
     * Send a GET request with query parameters.
     *
     * @param string $path Request path.
     * @param Request $request
     * @param array $requestHeaders Request Headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function get(string $path, Request $request, array $requestHeaders = []): Response
    {
        $path .= $request->getRequestString();

        $response = $this->sdkClient->getHttpClient()->get($path, $requestHeaders);

        return $this->createResponseObject($response);
    }

    /**
     * Send a HEAD request with query parameters.
     *
     * @param string $path Request path.
     * @param array $parameters HEAD parameters.
     * @param array $requestHeaders Request headers.
     *
     * @return ResponseInterface
     * @throws Exception
     */
    protected function head(string $path, array $parameters = [], array $requestHeaders = []): ResponseInterface
    {
        if (array_key_exists('ref', $parameters) && null === $parameters['ref']) {
            unset($parameters['ref']);
        }

        return $this->sdkClient->getHttpClient()->head($path.'?'.http_build_query($parameters, '', '&', PHP_QUERY_RFC3986), $requestHeaders);
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param string $path Request path.
     * @param array $parameters POST parameters to be JSON encoded.
     * @param array $requestHeaders Request headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function postJson(string $path, array $parameters = [], array $requestHeaders = []): Response
    {
        return $this->postRaw(
            $path,
            $this->createJsonBody($parameters),
            $requestHeaders
        );
    }

    /**
     * Send a POST request with x-www-form-urlencoded parameters.
     *
     * @param string $path Request path.
     * @param Request $request
     * @param array $requestHeaders Request headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function post(string $path, Request $request, array $requestHeaders = []): Response
    {
        return $this->postRaw(
            $path,
            $request->getRequestString(),
            $requestHeaders
        );
    }

    /**
     * Send a POST request with raw data.
     *
     * @param string $path Request path.
     * @param string $body Request body.
     * @param array $requestHeaders Request headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function postRaw(string $path, string $body, array $requestHeaders = []): Response
    {

        $response = $this->sdkClient->getHttpClient()->post(
            $path,
            $requestHeaders,
            $body
        );

        return $this->createResponseObject($response);
    }


    /**
     * Send a PATCH request with JSON-encoded parameters.
     *
     * @param string $path Request path.
     * @param array $parameters POST parameters to be JSON encoded.
     * @param array $requestHeaders Request headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function patch(string $path, array $parameters = [], array $requestHeaders = []): Response
    {
        $response = $this->sdkClient->getHttpClient()->patch(
            $path,
            $requestHeaders,
            $this->createJsonBody($parameters)
        );

        return $this->createResponseObject($response);
    }

    /**
     * Send a PUT request with JSON-encoded parameters.
     *
     * @param string $path Request path.
     * @param array $parameters POST parameters to be JSON encoded.
     * @param array $requestHeaders Request headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function put(string $path, array $parameters = [], array $requestHeaders = []): Response
    {
        $response = $this->sdkClient->getHttpClient()->put(
            $path,
            $requestHeaders,
            $this->createJsonBody($parameters)
        );

        return $this->createResponseObject($response);
    }

    /**
     * Send a DELETE request with url-encoded parameters.
     *
     * @param string $path Request path.
     * @param Request $request
     * @param array $requestHeaders Request headers.
     *
     * @return Response
     * @throws Exception
     */
    protected function delete(string $path, Request $request, array $requestHeaders = []): Response
    {
        $path .= $request->getRequestString();

        $response = $this->sdkClient->getHttpClient()->delete($path, $requestHeaders);

        return $this->createResponseObject($response);
    }

    /**
     * Create a JSON encoded version of an array of parameters.
     *
     * @param array $parameters Request parameters
     *
     * @return string|null
     */
    protected function createJsonBody(array $parameters): ?string
    {
        return (count($parameters) === 0) ? null : json_encode($parameters, empty($parameters) ? JSON_FORCE_OBJECT : 0);
    }

    /**
     * Maps ResponseInterface to Yengec response object
     *
     * @param ResponseInterface $response
     * @return Response
     */
    protected function createResponseObject(ResponseInterface $response): Response
    {
        $resp = new Response();
        $resp->setHeaders($response->getHeaders());
        $resp->setBody($response->getBody()->getContents());
        $resp->setStatusCode($response->getStatusCode());

        return $resp;
    }

}