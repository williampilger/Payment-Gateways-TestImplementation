<?php require_once __DIR__.'/_local/cred.php'; ?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Card to User</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form{
            display: flex;
            flex-direction: column;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Salvar Cartão para Cliente</h1>
        <span>Salvar cartão (tokenizado, usando o serviço adequado) para um usuário específico.</span>
        <form id="form-newUser" action="/ajax/Card-SaveToClient.php/" method="POST">
            <input type="text" id="card" name="card" placeholder="Card Token" />
            <input type="text" id="ID" name="id" placeholder="User ID" />
            <div>
                <label for="json">Resultado Completo</label>
                <input type="checkbox" id="json" name="json">
            </div>
            <button type="submit" id="form-newUser__submit">Salvar</button>
        </form>  
    </div>
</body>
</html>