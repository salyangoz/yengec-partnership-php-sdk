<?php


namespace Yengec\Tests\HttpClient;


use Http\Client\Exception;
use Yengec\Tests\TestCase;

class DefaultHttpClientTest extends TestCase
{
    /**
     * Tests Default HttpClient can make GET request
     *
     * @throws Exception
     */
    public function testCanMakeHttpGet()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');

        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();

        $response = $httpClient->get("/dummy_uri");

        $this->assertSame($resp, $response);
    }

    /**
     * Tests Default HttpClient can make POST request
     *
     * @throws Exception
     */
    public function testCanMakeHttpPost()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');
        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();
        $response = $httpClient->post("/dummy_uri");

        $this->assertSame($resp, $response);
    }

    /**
     * Tests Default HttpClient can make PATCH request
     *
     * @throws Exception
     */
    public function testCanMakeHttpPatch()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');
        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();
        $response = $httpClient->patch("/dummy_uri");

        $this->assertSame($resp, $response);
    }

    /**
     * Tests Default HttpClient can make PUT request
     *
     * @throws Exception
     */
    public function testCanMakeHttpPut()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');
        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();
        $response = $httpClient->put("/dummy_uri");

        $this->assertSame($resp, $response);
    }

    /**
     * Tests Default HttpClient can make DELETE request
     *
     * @throws Exception
     */
    public function testCanMakeHttpDelete()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');
        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();
        $response = $httpClient->delete("/dummy_uri");

        $this->assertSame($resp, $response);
    }

    /**
     * Tests Default HttpClient can make OPTIONS request
     *
     * @throws Exception
     */
    public function testCanMakeHttpOptions()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');
        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();
        $response = $httpClient->options("/dummy_uri");

        $this->assertSame($resp, $response);
    }

    /**
     * Tests Default HttpClient can make HEAD request
     *
     * @throws Exception
     */
    public function testCanMakeHttpHead()
    {
        # Set desired response
        $resp = $this->createMock('Psr\Http\Message\ResponseInterface');
        $this->mockClient->addResponse($resp);
        $httpClient = $this->givenSdk()->getHttpClient();
        $response = $httpClient->head("/dummy_uri");

        $this->assertSame($resp, $response);
    }


}