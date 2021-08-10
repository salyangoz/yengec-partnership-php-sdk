<?php

namespace Yengec\Tests;

use Http\Mock\Client;
use Yengec\ClientBuilder;
use Yengec\Options;
use Yengec\Sdk;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected Options $config;
    protected Client $mockClient;
    protected String $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();
        $this->config = new Options(
            "clientId",
            "clientSecret",
            "https://baseurl.com/",
            ClientBuilder::getInstance($this->mockClient)
        );

        $this->token = "token...";
    }

    /**
     * Returns Sdk instance with supplied mock client
     *
     * @return Sdk
     */
    protected function givenSdk(): Sdk
    {
        return new Sdk($this->config);
    }

    public function getJsonFile($file): bool|string
    {
        return file_get_contents(dirname( __FILE__ ) . '/Mock/' . $file, true);
    }
}