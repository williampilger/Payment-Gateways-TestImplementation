<?php
    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;
    
    $id = $_POST['id'];

    $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

    $r = $stripe->invoices->retrieve(
        $id,
        [ ]
    );

    echo json_encode(objectAdvPrint($r));
?>
