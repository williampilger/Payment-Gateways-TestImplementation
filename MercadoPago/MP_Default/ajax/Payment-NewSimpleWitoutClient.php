<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = (float)$_POST['transactionAmount'];// Isto ser ridículo! Jamais confiar nesse tipo de informação vindo do front. Aqui é feito pra testes!!!!
    $payment->token = $_POST['token'];
    $payment->description = $_POST['description'];
    $payment->installments = (int)$_POST['installments'];
    $payment->payment_method_id = $_POST['paymentMethodId'];
    $payment->issuer_id = (int)$_POST['issuer'];

    $payer = new MercadoPago\Payer();
    $payer->email = $_POST['email'];
    $payer->identification = array(
        "type" => $_POST['identificationType'],
        "number" => $_POST['identificationNumber']
    );
    $payment->payer = $payer;

    $payment->save();

    $customer = new MercadoPago\Customer();
    $customer->email = $_POST['email'];
    $customer->save();


    $response = array(
        'status' => $payment->status,
        'status_detail' => $payment->status_detail,
        'id' => $payment->id,
        'customer' => $customer->id
    );
    
    echo json_encode($response);

?>