<?php
    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;
    
    $session = $_POST['session'];

    $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

    $r = $stripe->checkout->sessions->retrieve(
        $session,
        [ ]
    );

    echo json_encode(objectAdvPrint($r));
?>
