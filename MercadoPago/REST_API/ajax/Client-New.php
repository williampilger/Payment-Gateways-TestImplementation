<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN']);

    $response = $mp->Customer_new($_POST['email'], $_POST['cpf'], ['zip_code' => $_POST['zip'], 'street_name'=>$_POST['street'], 'street_number'=>(int)$_POST['number']]);
    
    echo json_encode($response);

?>