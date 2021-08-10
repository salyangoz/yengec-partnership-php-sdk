<?php


namespace Yengec\Tests\Endpoint;

use Laminas\Diactoros\Response;
use Yengec\Request\CreatePackageSubscriptionRequest;
use Yengec\Sdk;
use Yengec\Tests\TestCase;

class SubscribeToPackageTest extends TestCase
{
    protected CreatePackageSubscriptionRequest $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = new CreatePackageSubscriptionRequest();

        $this->request->setCardName("John Doe");
        $this->request->setCardNumber("5400010000000004");
        $this->request->setCardMonth(12);
        $this->request->setCardYear(2023);
        $this->request->setCardCvc(1);

        $this->request->setBillingType("personal");
        $this->request->setBillingName("John Doe");
        $this->request->setBillingTaxNumber("2390666378");
        $this->request->setBillingAddress("bakir sk. Bakırköy, Istanbul");
        $this->request->setBillingDistrict("12");
        $this->request->setBillingPostalCode(12);
        $this->request->setBillingTaxOffice("Bakırköy");
        $this->request->setBillingCity("Istanbul");

        $this->request->setPackageId(1);
        #$request->setPromotionCode("1");
        #$request->setTrial(false);
        $this->request->setChannel("kolaybi");
        $this->request->setRenewMonth(12);
        $this->request->setPaymentMethod("partnership");
    }

    public function testShouldCreatePartnershipAccount()
    {
        $successResponse = new Response\TextResponse($this->getJsonFile("subscribe_to_package_success.json"), 200);
        $this->mockClient->addResponse($successResponse);

        $subscription = $this->givenSdk()->addAuthToken($this->token, Sdk::AUTH_JWT)->endpoint('subscription')->create($this->request);

        $this->assertEquals(200, $subscription->getRawResponse()->getStatusCode());
        $this->assertEquals(565, $subscription->getId());
        $this->assertEquals(null, $subscription->getCardId());
        $this->assertEquals("480", $subscription->getPrice());
        $this->assertEquals("kolaybi", $subscription->getChannel());
        $this->assertEquals(json_decode(
            '{
                      "used_month": "",
                      "remaining_month": "",
                      "discounted_price": "",
                      "discounted_readable": "",
                      "promotion_code": ""
                  }'
        ), $subscription->getPromotion());
        $this->assertEquals("2021-08-05 15:30:41", $subscription->getCreatedAt());
        $this->assertEquals("2022-08-05", $subscription->getRenewalAt());
        $this->assertEquals(null, $subscription->getDeletedAt());
        $this->assertEquals(false, $subscription->getIsExpired());
        $this->assertEquals("12", $subscription->getRenewMonth());
        $this->assertEquals(false, $subscription->getRecoverable());
        $this->assertEquals("480,00 ₺", $subscription->getPriceReadable());
        $this->assertEquals("partnership", $subscription->getPaymentMethod());
        $this->assertEquals(null, $subscription->getPromotionCode());
        $this->assertEquals("Kolaybi", $subscription->getChannelReadable());
        $this->assertEquals(0, $subscription->getIntegrationCount());
        $this->assertEquals(false, $subscription->getCancelable());
        $this->assertEquals(null, $subscription->getCancelableReason());
        $this->assertEquals("05.08.2022", $subscription->getRenewalAtReadable());
        $this->assertEquals("Kolaybi üzerinden açılan abonelikler kurtarılamaz.", $subscription->getNotRecoverableReason());
        $this->assertEquals(false, $subscription->getPayableWithCreditCard());
        $this->assertIsObject($subscription->getPackage());
        $this->assertEquals($subscription->getPackage(), $subscription->getPackage());
    }

    public function testShouldReturnErrorResponse()
    {
        $errorResponse = new Response\TextResponse($this->getJsonFile("subscribe_to_package_error.json"), 422);
        $this->mockClient->addResponse($errorResponse);
        $subscription = $this->givenSdk()->addAuthToken($this->token, Sdk::AUTH_JWT)->endpoint('subscription')->create($this->request);
        $this->assertEquals(422, $subscription->getRawResponse()->getStatusCode());
        $this->assertNotEmpty($subscription->getError());
        $this->assertNotEquals(null, $subscription->getError());
        $this->assertEquals('Doğrulama başarısız : Referans değeri geçersiz.', $subscription->getErrorMessage());
        $this->assertEquals(json_decode('{"channel": [
                          "Referans değeri geçersiz."
                        ]}'), $subscription->getError());

    }

}