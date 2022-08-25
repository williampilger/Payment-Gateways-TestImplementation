<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN'], MP_credentials['APP_ID']);

    $filters = [];
    if(isset($_POST['onlyActives'])) $filters['status'] = 'active';
    
    $response = $mp->Plan_Search( $filters );
    
    echo json_encode($response);

?>