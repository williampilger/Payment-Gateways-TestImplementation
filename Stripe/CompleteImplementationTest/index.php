<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="base-flex">

    <div class='center base-flex'>
        <h1>API Test - Stripe</h1>
        <span>Using Stripe REST API to made payments.</span>
        <a href="service/stripe-string.php">Stripe Stringfied (Overview)</a>
        
        <div class="center group base-flex">
            <h2>Customers</h2>
            <a href="page_customers-new.php">New customer</a>
            <a href="page_customers-delete.php">Delete customer</a>
            <a href="page_customers-list.php">List all Customers</a>
        </div>
        <div class="center group base-flex">
            <h2>Payment Sessions</h2>
            <a href="page_session-new.php">New Session</a>
            <a href="page_session-retrieve.php">Retrieve Session</a>
        </div>
        <div class="center group base-flex">
            <h2>PaymentIntents</h2>
            <!-- <a href="page_payment-new.php">New PaymentIntent</a> -->
            <a href="page_payment-retrieve.php">Retrieve PaymentIntent</a>
        </div>
        <div class="center group base-flex">
            <h2>Subscriptions</h2>
            <!-- <a href="page_subscription-new.php">New Subscription</a> -->
            <a href="page_subscription-retrieve.php">Retrieve Subscription</a>
        </div>
        <div class="center group base-flex">
            <h2>Invoices</h2>
            <!-- <a href="page_invoice-new.php">New Invoice</a> -->
            <a href="page_invoice-retrieve.php">Retrieve Invoice</a>
        </div>
        <div class="center group base-flex">
            <h2>Charges</h2>
            <!-- <a href="page_charge-new.php">New Charge</a> -->
            <a href="page_charge-retrieve.php">Retrieve Charge</a>
        </div>
    </div>

</body>
</html>
