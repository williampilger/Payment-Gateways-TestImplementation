<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = (float)$_POST['amount'];//##VER## Isto ser ridículo! Jamais confiar nesse tipo de informação vindo do front!!!!
    $payment->token = $_POST['token'];
    $payment->installments = (int)$_POST['installments'];
    // $payment->payment_method_id = $_POST['paymentMethodId'];
    // $payment->issuer_id = (int)$_POST['issuer'];
    if(isset($_POST['description']) && $_POST['description'] != '') $payment->description = $_POST['description'];
    if(isset($_POST['external_reference']) && $_POST['external_reference'] != '') $payment->external_reference = $_POST['external_reference'];

    $payment->payer = new MercadoPago\Payer(['id'=>$_POST['customer']]);

    if( $payment->save() )
    {
        $response = [
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        ];
    }
    else
    {
        $response = [
            'error' => 'Code 2208191435. Payment Falied.'
        ];
    }

    if( $_POST['full'] )
    {
        $response['AdvInfo'] = [
            'payment' => objectAdvPrint($payment)
        ];
    }
    
    echo json_encode($response);

?>