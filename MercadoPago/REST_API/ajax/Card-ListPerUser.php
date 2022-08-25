<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN']);
    $response = $mp->Card_get($_POST['userid'], $_POST['cardid']);
    
    $json = isset($_POST['json']);

    if($json)
    {
        echo json_encode($response);
    }
    else
    {
        echo json_encode([
            'card_number_id' => $response['card_number_id'],
            'cardholder' => $response['cardholder'],
            'customer_id' => $response['customer_id'],
            'date_created' => $response['date_created'],
            'id' => $response['id'],
            'issuer' => $response['issuer'],
            'last_four_digits' => $response['last_four_digits'],
            'payment_method' => $response['payment_method']
        ]);
    }
    
?>