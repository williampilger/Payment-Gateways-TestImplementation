<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $plan = new MercadoPago\Plan();
    
    $plan->back_url = 'https://store.authenty.com.br';
    $plan->auto_recurring = [
        'frequency' => (int)$_POST['frequency']
        ,'frequency_type' => 'months'
        ,'transaction_amount' => (float)$_POST['amount']//##VER## Isto ser ridículo! Jamais confiar nesse tipo de informação vindo do front!!!!
        ,'currency_id' => 'BRL'
    ];
    
    if( $plan->save() )
    {
        $response = [
            'status' => $plan->status,
            'status_detail' => $plan->status_detail,
            'id' => $plan->id
        ];
    }
    else
    {
        $response = [
            'error' => 'Code 2208221600. Falied to create a new Plan.'
        ];
    }

    if( $_POST['full'] )
    {
        $response['AdvInfo'] = [
            'payment' => objectAdvPrint($plan)
        ];
    }
    
    echo json_encode($response);

?>