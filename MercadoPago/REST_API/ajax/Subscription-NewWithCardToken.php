<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN'], MP_credentials['APP_ID']);

    $response = $mp->Subscription_new(
        $_POST['plan'],
        $_POST['email'],
        $_POST['cardToken']
    );
    
    echo json_encode($response);
    
?>