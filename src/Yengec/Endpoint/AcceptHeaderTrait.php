<?php

declare(strict_types=1);

namespace Yengec\Endpoint;

use Http\Client\Exception;
use Psr\Http\Message\ResponseInterface;
use Yengec\Request;
use Yengec\Response;

/**
 * A trait to make sure we add accept headers on all requests.
 *
 */
trait AcceptHeaderTrait
{
    /** @var string */
    protected string $acceptHeaderValue;

    /**
     * @param string $path
     * @param Request $request
     * @param array $requestHeaders
     * @return array|string
     * @throws Exception
     */
    protected function get(string $path, Request $request, array $requestHeaders = []): Response
    {
        return parent::get($path, $request, $this->mergeHeaders($requestHeaders));
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param array $requestHeaders
     * @return ResponseInterface
     * @throws Exception
     */
    protected function head(string $path, array $parameters = [], array $requestHeaders = []): ResponseInterface
    {
        return parent::head($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    /**
     * @param string $path
     * @param Request $request
     * @param array $requestHeaders
     * @return Response
     * @throws Exception
     */
    protected function post(string $path, Request $request, array $requestHeaders = []): Response
    {
        return parent::post($path, $request, $this->mergeHeaders($requestHeaders));
    }

    /**
     * @param string $path
     * @param $body
     * @param array $requestHeaders
     * @return Response
     * @throws Exception
     */
    protected function postRaw(string $path, $body, array $requestHeaders = []): Response
    {
        return parent::postRaw($path, $body, $this->mergeHeaders($requestHeaders));
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param array $requestHeaders
     * @return Response
     * @throws Exception
     */
    protected function patch(string $path, array $parameters = [], array $requestHeaders = []): Response
    {
        return parent::patch($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    protected function put(string $path, array $parameters = [], array $requestHeaders = []): Response
    {
        return parent::put($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    protected function delete(string $path, Request $request, array $requestHeaders = []): Response
    {
        return parent::delete($path, $request, $this->mergeHeaders($requestHeaders));
    }

    /**
     * Append a new accept header on all requests.
     *
     * @param array $headers
     * @return array
     */
    private function mergeHeaders(array $headers = []): array
    {
        $default = [];
        if ($this->acceptHeaderValue) {
            $default = ['Accept' => $this->acceptHeaderValue];
        }

        return array_merge($default, $headers);
    }
}
