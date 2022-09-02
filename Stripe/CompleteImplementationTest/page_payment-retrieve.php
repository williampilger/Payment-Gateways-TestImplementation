<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve an Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">

        <h1><span class="side">[SERVER-SIDE]</span> Reaload a payment Session</h1>
        <span>Check if an session was payed, and more.</span>

        <form action="/service/payment-retrieve.php" method="POST">
            
            <input type="text" name="id" placeholder="PaymentIntent ID" />

            <button type="submit">Check</button>
        </form>

    </div>
</body>
</html>