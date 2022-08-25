<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN'], MP_credentials['APP_ID']);

    $response = $mp->Plan_new(//##VER## Isto ser ridículo! Jamais confiar nesse tipo de informação vindo do front!!!!
        'https://store.authenty.com.br',
        (int)$_POST['frequency'],
        (float)$_POST['amount'],
        $_POST['reason']
    );
    
    echo json_encode($response);

?>