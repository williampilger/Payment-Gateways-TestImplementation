<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $json = isset($_POST['json']);
    $userID = $_POST['id'];
    $cardToken = $_POST['card'];

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN']);
    $response = $mp->Customer_addCard($userID, $cardToken);
    

    if($json)
    {
        echo json_encode($response);
    }
    else
    {
        echo json_encode([
            'card' => [
                'expiration_month' => $response['expiration_month'],
                'expiration_year' => $response['expiration_year'],
                'payment_method' => $response['payment_method'],
                'last_four_digits' => $response['last_four_digits'],
                'id' => $response['id'],
                'issuer' => $response['issuer']
            ]
        ]);
    }

?>