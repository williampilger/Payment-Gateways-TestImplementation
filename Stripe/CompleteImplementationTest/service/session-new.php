<?php
    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;
    
    $customer = $_POST['customer'];
    $price = $_POST['price'];
    $cancel_url = $_POST['cancel_url'];
    $success_url = $_POST['success_url'];
    $mode = isset($_POST['recurrent']) ? 'subscription' : 'payment';

    $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

    $r = $stripe->checkout->sessions->create([
        'success_url' => $success_url,
        'cancel_url' => $cancel_url,
        'line_items' => [
            [
                'price' => $price,
                'quantity' => 1,
            ],
        ],
        'mode' => $mode,
        'customer' => $customer
    ]);

    echo json_encode(objectAdvPrint($r));
?>
