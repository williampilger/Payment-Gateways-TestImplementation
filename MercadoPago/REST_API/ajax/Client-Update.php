<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN']);

    $changes = [];
    if(isset($_POST['email']) && $_POST['email']!='') $changes['email'] = $_POST['email'];
    if(isset($_POST['cpf']) && $_POST['cpf']!='') $changes['identification'] = ['type'=>'CPF', 'number'=>$_POST['cpf']];
    if(isset($_POST['zip']) && $_POST['zip']!='') $changes['address']['zip_code'] = $_POST['zip'];
    if(isset($_POST['street']) && $_POST['street']!='') $changes['address']['street_name'] = $_POST['street'];
    if(isset($_POST['number']) && $_POST['number']!='') $changes['address']['street_number'] = $_POST['number'];
    
    $response = $mp->Customer_update( $_POST['id'], $changes );
    
    echo json_encode($response);

?>