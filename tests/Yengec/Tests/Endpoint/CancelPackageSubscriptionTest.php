<?php


namespace Yengec\Tests\Endpoint;

use Laminas\Diactoros\Response;
use Yengec\Request\CancelSubscriptionRequest;
use Yengec\Sdk;
use Yengec\Tests\TestCase;

class CancelPackageSubscriptionTest extends TestCase
{
    protected CancelSubscriptionRequest $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = new CancelSubscriptionRequest();

        $this->request->setSubscriptionId(585);
        $this->request->setReason("reason_category");
        $this->request->setReasonDescription("reason_description");
    }

    public function testShouldCancelPackageSubscription()
    {
        $successResponse = new Response\TextResponse('',204);
        $this->mockClient->addResponse($successResponse);

        $subscription = $this->givenSdk()->addAuthToken($this->token, Sdk::AUTH_JWT)->endpoint('subscription')->cancel($this->request);

        $this->assertEquals(204, $subscription->getRawResponse()->getStatusCode());
    }

    public function testShouldReturnErrorResponse()
    {

        $errorResponse = new Response\TextResponse('', 500);
        $this->mockClient->addResponse($errorResponse);

        $subscription = $this->givenSdk()->addAuthToken($this->token, Sdk::AUTH_JWT)->endpoint('subscription')->cancel($this->request);

        $this->assertNotEquals(500, $subscription->getRawResponse()->getStatusCode());
    }

}