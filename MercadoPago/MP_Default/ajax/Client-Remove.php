<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    if(isset( $_POST['id']))
    {
        $id = $_POST['id'];

        $customers = MercadoPago\Customer::search(['id'=>$id]);

        if($customers->total == 1)
        {

            $client = $customers->getIterator()[0];

            $response = [
                'success' => $client->delete()
            ];

        }
        else
        {
            $response = [ 'error' => "Code 2208171642. This ID returned {$customers->total} matches."];
        }
    }
    else
    {
        $response = ['error' => 'Code 2208171634. Impossible remove Client without ID.'];
    }

    echo json_encode($response);
?>