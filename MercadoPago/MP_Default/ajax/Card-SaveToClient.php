<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';
    require_once __DIR__.'/../_local/tools.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $json = isset($_POST['json']);
    $userID = $_POST['id'];
    $cardToken = $_POST['card'];

    if($userID && $cardToken)
    {
        $card = new MercadoPago\Card();
        $card->token = $cardToken;
        $card->customer_id = $userID;
        
        if( $card->save() )
        {
            $customer = MercadoPago\Customer::find_by_id($userID);

            if($customer)
            {
                //SUCCESS

                $response = [
                    'status' => 'Success'
                ];

                if($json)
                {
                    $response['AdvInfo'] = [
                        'Card' => objectAdvPrint($card),
                        'Customer' => objectAdvPrint($customer)
                    ];
                }
            }
            else
            {
                $response = ['error' => 'Code 2208180725. Impossible load informed Customer information.'];
            }
        }
        else
        {
            $response = ['error' => 'Code 2208180732. Impossible save card.'];
        }
    }
    else
    {
        $response = ['error' => 'Code 2208180730. Minimum fields not filled.'];
    }

    echo json_encode($response);
?>