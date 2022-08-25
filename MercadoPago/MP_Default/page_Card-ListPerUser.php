<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Cards List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">
        <h1><span class="side">[SERVER-SIDE]</span>Listar Cartões por Usuário/Cliente</h1>
        <form id="form-checkout" action="/ajax/Card-ListPerUser.php/" method="POST">
            <input type="text" id="ID" name="id" placeholder="ID do Cliente" required />
            <div>
                <input type="checkbox" id="json" name="json">
                <label for="json">Resultado Completo</label>
            </div>
            <button type="submit" id="form-newUser__submit">Buscar</button>
        </form>

    </div>

</body>
</html>