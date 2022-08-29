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

        <h1><span class="side">[SERVER-SIDE]</span>Delete Customer</h1>
        <span>Remove Customer from Stripe database.</span>

        <form action="/service/customers-delete.php" method="POST">
            
            <input type="text" name="id" placeholder="User ID" />

            <button type="submit">Delete</button>
        </form>

    </div>
</body>
</html>