<?php


namespace Yengec\Tests\Endpoint;

use Laminas\Diactoros\Response;
use Yengec\Model\Lists\PackageList;
use Yengec\Request\ListPackagesRequest;
use Yengec\Sdk;
use Yengec\Tests\TestCase;

class FetchPackageListTest extends TestCase
{
    protected ListPackagesRequest $request;

    public function testShouldFetchPackageList()
    {
        $this->request = new ListPackagesRequest();
        $successResponse = new Response\TextResponse($this->getJsonFile("package_list_fetch_success.json"), 200);
        $this->mockClient->addResponse($successResponse);

        $packages = $this->givenSdk()->addAuthToken($this->token, Sdk::AUTH_JWT)->endpoint('package')->fetch($this->request);

        $this->assertEquals(200, $packages->getRawResponse()->getStatusCode());
        $this->assertNotEmpty($packages);
        $this->assertNotEmpty($packages->getData());
        $this->assertInstanceOf(PackageList::class, $packages);
    }
}