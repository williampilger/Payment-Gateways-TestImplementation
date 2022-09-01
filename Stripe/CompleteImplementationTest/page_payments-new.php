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
        <span>New recurrence subscription.</span>

        <form action="/service/payments-new.php" method="POST">
            
            <input type="text" name="customer" placeholder="Customer ID" />
            <input type="text" name="price" placeholder="Price ID" />
            <input type="text" name="cancel_url" placeholder="Cancel URL" />
            <input type="text" name="success_url" placeholder="Success URL" />
            <input type="text" name="description" placeholder="Payment Description" />

            <button type="submit">Create (and go to the 2nd step)</button>
        </form>

    </div>
</body>
</html>