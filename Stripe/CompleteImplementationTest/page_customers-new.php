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

        <h1><span class="side">[SERVER-SIDE]</span>Criar Novo Usuário</h1>
        <span>Criar usuário básico.</span>

        <form action="/service/customers-new.php" method="POST">
            
            <input type="email" name="email" placeholder="E-mail" />
            <input type="text" name="name" placeholder="Fullname" />

            <button type="submit">Create</button>
        </form>

    </div>
</body>
</html>