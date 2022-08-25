<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN']);


    $data = [
        'description' => $_POST['description'],
        'external_reference' => $_POST['external_reference'],
        'issuer_id' => $_POST['issuer_id'],
        'installments' => (int)$_POST['installments'],
        'payer' => $_POST['payer'],
        'payment_method_id' => $_POST['payment_method_id'],
        'token' => $_POST['token'],
        'transaction_amount' => (float)$_POST['transaction_amount']
    ];

    $response = $mp->Payment_new($data);
    
    echo json_encode($response);
    
?>