<?php


namespace Yengec\Tests\Endpoint;

use Laminas\Diactoros\Response;
use Yengec\Model\Lists\CompanyIntegrationList;
use Yengec\Request\ListCompanyIntegrationsRequest;
use Yengec\Sdk;
use Yengec\Tests\TestCase;

class FetchCompanyIntegrationListTest extends TestCase
{
    protected ListCompanyIntegrationsRequest $request;

    public function testShouldFetchCompanyIntegrationList()
    {
        $this->request = new ListCompanyIntegrationsRequest();
        $successResponse = new Response\TextResponse('', 200);
        $this->mockClient->addResponse($successResponse);

        $integrations = $this->givenSdk()->addAuthToken($this->token, Sdk::AUTH_JWT)->endpoint('integration')->fetch($this->request);

        $this->assertEquals(200, $integrations->getRawResponse()->getStatusCode());
        $this->assertNotEmpty($integrations);
        $this->assertInstanceOf(CompanyIntegrationList::class, $integrations);
    }
}