<?php

declare(strict_types=1);

use Yengec\Request\ListCompanyIntegrationsRequest;
use Yengec\Sdk;

require_once __DIR__ . '/../vendor/autoload.php';

# Load configuration file
require_once("Config.php");

# Instantiate sdk with config
$sdk = new Sdk(Config::get());

# create request instance
$request = new ListCompanyIntegrationsRequest();
$request->setInclude("company");
$request->setConfigCompleted(true);
$request->setIsCompleted(true);

# Add JWT auth token (When necessary)
$token = "token...";
$sdk->addAuthToken($token, Sdk::AUTH_JWT);

try {
    # request endpoint
    $response = $sdk->endpoint('integration')->fetch($request);
    print_r($response);
} catch (\Http\Client\Exception $e) {
    var_export($e->getMessage());
}
