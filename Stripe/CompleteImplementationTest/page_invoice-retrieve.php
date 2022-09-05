<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve an Invoice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">

        <h1><span class="side">[SERVER-SIDE]</span> Reaload a invoice</h1>
        <span>Check an invoice data.</span>

        <form action="/service/invoice-retrieve.php" method="POST">
            
            <input type="text" name="id" placeholder="Invoice ID" />

            <button type="submit">Check</button>
        </form>

    </div>
</body>
</html>