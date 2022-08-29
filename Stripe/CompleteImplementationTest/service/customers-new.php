<?php

    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;

    $email = $_POST['email'];
    $fullname = $_POST['name'];
    
    if($email)
    {
        $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

        $r = $stripe->customers->create([
            'email' => $email,
            'name' => $fullname
        ]);

        $response = objectAdvPrint($r);

    }
    else
    {
        $response = ['err_code'=>'2208290733', 'description'=>'Email field is required.'];
    }

    echo json_encode($response);
?>