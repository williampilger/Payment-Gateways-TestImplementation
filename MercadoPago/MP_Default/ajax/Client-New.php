<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $customer = new MercadoPago\Customer();
    $customer->email = $_POST['email'];
    $r = $customer->save();

    $response = array(
        'success' => $r,
        'customer' => objectAdvPrint($customer)
    );
    
    echo json_encode($response);

?>