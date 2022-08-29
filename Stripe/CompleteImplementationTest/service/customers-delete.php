<?php

    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;

    $id = $_POST['id'];
    
    if($id)
    {
        $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

        try
        {
            $r = $stripe->customers->delete(
                $id,
                []
            );
    
            $response = $r->toArray();
        }
        catch (Exception $e)
        {
            $response = ['err_code'=>'2208290903', 'description'=>'Falied to delete this Customer.'];
        }

    }
    else
    {
        $response = ['err_code'=>'2208290859', 'description'=>'Customer ID field is required.'];
    }

    echo json_encode($response);
?>