<?php

declare(strict_types=1);

use Yengec\Request\CancelSubscriptionRequest;
use Yengec\Sdk;

require_once __DIR__ . '/../vendor/autoload.php';

# Load configuration file
require_once("Config.php");

# Instantiate sdk with config
$sdk = new Sdk(Config::get());

# create request instance
$request = new CancelSubscriptionRequest();

# Populate request with required fields
$request->setSubscriptionId(586);
$request->setReason("reason_category");
$request->setReasonDescription("reason_description");

# Add JWT auth token (When necessary)
$token = "token...";
$sdk->addAuthToken($token, Sdk::AUTH_JWT);

$response = $sdk->endpoint('subscription')->cancel($request);
print_r($response);
