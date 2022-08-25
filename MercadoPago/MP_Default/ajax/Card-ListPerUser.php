<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $json = isset($_POST['json']);

    $customer = MercadoPago\Customer::find_by_id($_POST['id']);

    if($customer)
    {

        if($json)
        {
            $response = objectAdvPrint($customer);
        }
        else
        {
            $response = [];

            $arr = $customer->toArray()['cards'];

            foreach ( $arr ? $arr : [] as $item )
            {
                $item = (array) $item;
                $response[] = [
                    'cardholder'=>$item['cardholder'],
                    'expiration_month'=>$item['expiration_month'],
                    'expiration_year'=>$item['expiration_year'],
                    'id'=>$item['id'],
                    'issuer'=>$item['issuer'],
                    'last_four_digits'=>$item['last_four_digits'],
                    'payment_method'=>$item['payment_method']
                ];
            }
        }
    }
    else
    {
        $response = ['error' => 'Code 2208180837. Impossible load informed Customer information.'];
    }

    echo json_encode($response);

?>