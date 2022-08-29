<?php
    require_once __DIR__.'/../_local/config.php';
    require_once __DIR__.'/../_local/tools.php';
    require_once AUTO_LOAD;
    
    $params = getParams(['customer', 'description', 'confirm']);
    $params['confirm'] = isset($params['confirm']);

    $stripe = new \Stripe\StripeClient(Stripe_credentials['private_key']);

    $payment = $stripe->setupIntents->create( $params );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRONT - Generic Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    
    <script>
        var stripe = Stripe('<?php echo Stripe_credentials['public_key']; ?>');
        var elements = stripe.elements({
            clientSecret: '<?php echo $payment->client_secret ?>',
        });
        elements.update({locale: 'fr'});

    </script>
</body>
</html>