<?php

    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;

    $email = $_POST['email'];
    $full = isset($_POST['full']);
    
    $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

    $filter = [];
    if($email && $email!='') $filter['email'] = $email;

    try
    {
        $r = $stripe->customers->all( $filter );
    
        if($full)
        {
            $response = $r->data;
        }
        else
        {
            $response = [];
            foreach($r->data as $c)
            {
                $response[] = [
                    'id' => $c->id,
                    'email' => $c->email
                ];
            }
        }
    }
    catch (Exception $e)
    {
        $response = ['err_code'=>'2208290918', 'description'=>'Falied to find out Customer(s).'];
    }


    echo json_encode($response);
?>