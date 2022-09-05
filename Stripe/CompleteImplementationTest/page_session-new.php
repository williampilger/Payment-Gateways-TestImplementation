<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Session</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">

        <h1><span class="side">[SERVER-SIDE]</span> Create a new payment Session</h1>
        <span>New Session. An session generate a checkout link to redirect the user.</span>

        <form action="/service/session-new.php" method="POST">
            
            <input type="text" name="customer" placeholder="Customer ID" />
            <input type="text" name="price" placeholder="Price ID" />
            <input type="text" name="cancel_url" placeholder="Cancel URL" />
            <input type="text" name="success_url" placeholder="Success URL" />

            <div>
                <label for="recurrent">Recurrent Payment (It's a Subscription)</label>
                <input type="checkbox" id="recurrent" name="recurrent">
            </div>

            <button type="submit">Create</button>
        </form>

    </div>
</body>
</html>