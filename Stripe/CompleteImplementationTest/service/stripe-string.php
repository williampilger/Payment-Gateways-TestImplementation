<?php

    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;

    $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

    $response = objectAdvPrint($stripe);
    
    echo json_encode($response);
?>