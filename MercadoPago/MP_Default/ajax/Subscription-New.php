<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $subscription = new MercadoPago\Preapproval();
    $subscription->back_url = 'https://store.authenty.com.br';
    $subscription->payer_email = $_POST['email'];
    if(isset($_POST['description']) && $_POST['description'] != '') $subscription->reason = $_POST['description'];
    if(isset($_POST['external_reference']) && $_POST['external_reference'] != '') $subscription->external_reference = $_POST['external_reference'];
    $subscription->auto_recurring = [
        'frequency' => 1
        ,'frequency_type' => 'months'
        ,'transaction_amount' => (float)$_POST['amount']//##VER## Isto ser ridículo! Jamais confiar nesse tipo de informação vindo do front!!!!
        ,'currency_id' => 'BRL'
        // ,'start_date' => date(DATE_ISO8601)
        // ,'end_date' => date(DATE_ISO8601, strtotime('+5 years'))
    ];
    $subscription->status = 'authorized';
    $subscription->card_token_id = $_POST['token'];

    if( $subscription->save() )
    {
        $response = [
            'status' => $subscription->status,
            'status_detail' => $subscription->status_detail,
            'id' => $subscription->id
        ];
    }
    else
    {
        $response = [
            'error' => 'Code 2208221007. Subscription Falied.'
        ];
    }

    if( $_POST['full'] )
    {
        $response['AdvInfo'] = [
            'payment' => objectAdvPrint($subscription)
        ];
    }
    
    echo json_encode($response);

?>