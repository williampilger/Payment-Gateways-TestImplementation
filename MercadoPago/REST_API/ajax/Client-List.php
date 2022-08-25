<?php

    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/MercadoPago.class.php';

    $search = [];
    if(isset( $_POST['email']) && $_POST['email']!='' ) $search['email'] = $_POST['email'];
    if(isset( $_POST['id']) && $_POST['id']!='' ) $search['id'] = $_POST['id'];
    $json = isset($_POST['json']);

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN']);
    $response = $mp->Customer_search($search);
    
    if($json)
    {
        echo json_encode($response);
    }
    else
    {
        $arr = [];
        foreach ( $response['results'] as $item )
        {
            $arr[] = [
                'email'=>$item['email'],
                'id'=>$item['id']
            ];
        }

        echo json_encode($arr);
    }

?>