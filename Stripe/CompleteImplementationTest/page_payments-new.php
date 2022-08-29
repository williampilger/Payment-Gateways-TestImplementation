<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">

        <h1><span class="side">[ClIENT & SERVER-SIDE]</span> Create a new payment</h1>
        <span>New generic payment.</span>

        <form action="/service/payments-new.php" method="POST">
            
            <input type="text" name="customer" placeholder="Customer ID" />
            <input type="text" name="description" placeholder="Payment Description" />

            <button type="submit">Create (and go to the 2nd step)</button>
        </form>

    </div>
</body>
</html>