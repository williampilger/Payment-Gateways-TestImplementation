<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Customers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">

        <h1><span class="side">[SERVER-SIDE]</span>Find out Customers</h1>
        <span>Criar usuário básico.</span>

        <form action="/service/customers-list.php" method="POST">
            
            <input type="email" name="email" placeholder="E-mail" />

            <div>
                <label for="full">Full Result</label>
                <input type="checkbox" id="full" name="full">
            </div>

            <button type="submit">Find</button>
        </form>

    </div>
</body>
</html>