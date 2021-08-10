<?php

namespace Yengec\Tests;

use Http\Client\Common\HttpMethodsClientInterface;
use Yengec\Sdk;

class SdkTest extends TestCase
{

    /**
     * Test creating sdk instance http client
     */
    public function testCreateSdkClientWithConfig()
    {
        $sdk = new Sdk($this->config);
        $this->assertInstanceOf(HttpMethodsClientInterface::class, $sdk->getHttpClient());
    }

}