<?php

declare(strict_types=1);

use Yengec\Request\CreatePackageSubscriptionRequest;
use Yengec\Sdk;

require_once __DIR__ . '/../vendor/autoload.php';

# Load configuration file
require_once("Config.php");

# Instantiate sdk with config
$sdk = new Sdk(Config::get());

# create request instance
$request = new CreatePackageSubscriptionRequest();

# Populate request with required fields
# Card and billing details are not mandatory if the payment_method is set to `partnership`
$request->setCardName("John Doe");
$request->setCardNumber("5400010000000004");
$request->setCardMonth(12);
$request->setCardYear(2023);
$request->setCardCvc(1);

$request->setBillingType("personal");
$request->setBillingName("John Doe");
$request->setBillingTaxNumber("2390666378");
$request->setBillingAddress("bakir sk. Bakırköy, Istanbul");
$request->setBillingDistrict("12");
$request->setBillingPostalCode(12);
$request->setBillingTaxOffice("Bakırköy");
$request->setBillingCity("Istanbul");

$request->setPackageId(1);
#$request->setPromotionCode("1");
#$request->setTrial(false);
$request->setChannel("kolaybi");
$request->setRenewMonth(12);
$request->setPaymentMethod("partnership");

# Add JWT auth token (When necessary)
$token = "token...";
$sdk->addAuthToken($token, Sdk::AUTH_JWT);

try {
    # request endpoint
    $response = $sdk->endpoint('subscription')->create($request);
    print_r($response);
} catch (\Http\Client\Exception $e) {
    var_export($e->getMessage());
}
