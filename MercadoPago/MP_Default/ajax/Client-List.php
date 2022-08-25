<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $search = [];
    if(isset( $_POST['email']) && $_POST['email']!='' ) $search['email'] = $_POST['email'];
    if(isset( $_POST['id']) && $_POST['id']!='' ) $search['id'] = $_POST['id'];

    $json = isset($_POST['json']);

    $customers = MercadoPago\Customer::search($search);

    $results = $customers->getArrayCopy();
    
    if($json)
    {
        $resarr = [];
        foreach( $results as $result )
        {
            $resarr[] = objectAdvPrint($result);
        }

        $response = [
            'customers_obj' => objectAdvPrint($customers),
            'iterator' => $resarr
        ];    
    }
    else
    {
        $response = [];
        foreach ( $results as $item )
        {
            $item = $item->toArray();

            $response[] = [
                'email'=>$item['email'],
                'id'=>$item['id'],
                'Ncards' => isset($item['cards']) ? count($item['cards']) : 0
            ];
        }

    }

    echo json_encode($response);
?>