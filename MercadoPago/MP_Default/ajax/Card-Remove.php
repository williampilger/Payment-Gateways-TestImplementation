<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../_local/cred.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $cardid = $_POST['cardid'];
    $customerid = $_POST['customerid'];

    if( $cardid && $customerid )
    {
        $card = new MercadoPago\Card();
        $card->customer_id = $customerid;
        $card->id = $cardid;

        if($card)
        {
            $response = [
                'success' => $card->delete()
            ];
        }
        else
        {
            $response = [ 'error' => "Code 2208180940. Impossible instantiate a Card."];
        }
    }
    else
    {
        $response = ['error' => 'Code 2208180941. Impossible remove Card without ID.'];
    }

    echo json_encode($response);
?>