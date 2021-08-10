<?php


namespace Yengec\Tests\Endpoint;

use Laminas\Diactoros\Response;
use Yengec\Request\CreatePartnershipRequest;
use Yengec\Tests\TestCase;

class PartnershipAccountCreateTest extends TestCase
{
    public function testShouldCreatePartnershipAccount()
    {
        $response = new Response\TextResponse($this->getJsonFile("partnership_account_create_success.json"), 200);
        $this->mockClient->addResponse($response);

        $request = new CreatePartnershipRequest();
        $request->setChannel("Demo");
        $request->setUserName("John Doe");
        $request->setUserEmail("demo@demo.com");
        $request->setCompanyName("Demo A.Ş.");
        $request->setCompanyRefId("Demo Company");
        $request->setCompanyAddressCity("Istanbul");
        $request->setCompanyAddressDistrict("Bakırköy");
        $request->setCompanyAddress("Demo Sok. No: 3");

        $partnership = $this->givenSdk()->endpoint("partnership")->create($request);

        $this->assertEquals(200, $partnership->getRawResponse()->getStatusCode());
        $this->assertEquals("132", $partnership->getUserId());
        $this->assertEquals("demo@demo.com", $partnership->getUserEmail());
        $this->assertEquals("John Doe", $partnership->getUserName());
        $this->assertEquals("Demo", $partnership->getUserChannel());
        $this->assertEquals("tr", $partnership->getUserLanguage());
        $this->assertEquals("2021-08-04T11:19:47.000000Z", $partnership->getUserCreatedAt());
        $this->assertEquals(null, $partnership->getUserMobile());
        $this->assertEquals(null, $partnership->getUserPermissionCallPermittedAt());
        $this->assertEquals(null, $partnership->getUserPermissionEmailPermittedAt());
        $this->assertEquals(null, $partnership->getUserPermissionPolicyPermittedAt());
        $this->assertEquals(null, $partnership->getUserProvider());
        $this->assertEquals("Demo A.Ş.", $partnership->getCompanyName());
        $this->assertIsObject($partnership->getCompanyAbilities());
        $this->assertEquals(json_decode('{
                                            "invoice": false,
                                            "e_invoice": false,
                                            "mark_as_paid": false,
                                            "invoice_category": false,
                                            "customer_category": false,
                                            "manage_subscription": false
                                          }') ,$partnership->getCompanyAbilities());
        $this->assertEquals("parasut", $partnership->getCompanyAccounting());
        $this->assertEquals("Demo Company", $partnership->getCompanyAccountingId());
        $this->assertEquals("https://uygulama.heroku-staging.parasut.com", $partnership->getCompanyAccountingUrl());
        $this->assertEquals("Demo Sok. No: 3", $partnership->getCompanyAddress());
        $this->assertEquals("İstanbul", $partnership->getCompanyCity());
        $this->assertEquals(false, $partnership->getCompanyEInvoiceCredit());
        $this->assertEquals(false, $partnership->getCompanyEInvoiceCreditSyncedAt());
        $this->assertEquals(null, $partnership->getCompanyEInvoicingActivatedAt());
        $this->assertEquals(null, $partnership->getCompanyEmail());
        $this->assertEquals("23", $partnership->getCompanyId());
        $this->assertEquals(false, $partnership->getCompanyEInvoiceProvider());
        $this->assertEquals("33", $partnership->getCompanyParasutId());
        $this->assertEquals("Demo", $partnership->getCompanyChannel());
        $this->assertEquals(null, $partnership->getCompanyLogoUrl());
        $this->assertEquals(null, $partnership->getCompanyRole());
        $this->assertEquals(null, $partnership->getCompanySettings());
        $this->assertEquals(null, $partnership->getCompanyTaxNumber());
        $this->assertEquals(null, $partnership->getCompanyTaxOffice());
        $this->assertEquals(false, $partnership->getCompanyWebsiteUrl());
    }

    public function testShouldReturnErrorResponse()
    {
        $response = new Response\TextResponse($this->getJsonFile("partnership_account_create_error.json"), 422);
        $this->mockClient->addResponse($response);

        $request = new CreatePartnershipRequest();
        $request->setChannel("Demo");
        $request->setUserName("John Doe");
        $request->setUserEmail("demo@demo.com");
        $request->setCompanyName("Demo A.Ş.");
        $request->setCompanyRefId("Demo Company");
        $request->setCompanyAddressCity("Istanbul");
        $request->setCompanyAddressDistrict("Bakırköy");
        $request->setCompanyAddress("Demo Sok. No: 3");

        $partnership = $this->givenSdk()->endpoint("partnership")->create($request);

        $this->assertEquals(422, $partnership->getRawResponse()->getStatusCode());
        $this->assertNotEmpty($partnership->getError());
        $this->assertNotEquals(null, $partnership->getError());
        $this->assertEquals('Doğrulama başarısız : user.email daha önceden kayıt edilmiş.', $partnership->getErrorMessage());
        $this->assertEquals(json_decode('{"user.email": [
                                        "user.email daha önceden kayıt edilmiş."
                                    ]}'), $partnership->getError());

    }

}