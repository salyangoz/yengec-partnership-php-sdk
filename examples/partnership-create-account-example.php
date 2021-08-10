<?php

declare(strict_types=1);

use Yengec\Request\CreatePartnershipRequest;
use Yengec\Sdk;

require_once __DIR__ . '/../vendor/autoload.php';

# Load configuration file
require_once("Config.php");

# Instantiate sdk with config
$sdk = new Sdk(Config::get());

# create request instance
$request = new CreatePartnershipRequest();

# Populate request with required fields
$request->setChannel("Demo");
$request->setUserName("John Doe");
$request->setUserEmail("demo@demo.com");
$request->setCompanyName("Demo A.Ş.");
$request->setCompanyRefId("Demo Company");
$request->setCompanyAddressCity("Istanbul");
$request->setCompanyAddressDistrict("Bakırköy");
$request->setCompanyAddress("Demo Sok. No: 3");

# Add JWT auth token (When necessary)
//$token = "token...";
//$sdk->addAuthToken($token, Sdk::AUTH_JWT);

try {
    # request endpoint
    $response = $sdk->endpoint('partnership')->create($request);
    print_r($response);
} catch (\Http\Client\Exception $e) {
    var_export($e->getMessage());
}
