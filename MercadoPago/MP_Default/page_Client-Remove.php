<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="base-flex center">
        <h1><span class="side">[SERVER-SIDE]</span>Excluir Usuários Existentes</h1>
        <span>Excluir usuário definitivamente do banco do MercadoPago.<br><br></span>
        <form id="form-checkout" class="center base-flex" action="/ajax/Client-Remove.php/" method="POST">
            <input type="text" id="ID" name="id" placeholder="ID" required/>
            <div>
                <input type="checkbox" id="json" name="json">
                <label for="json">Resultado Completo</label>
            </div>
            <button type="submit" id="form-newUser__submit">Excluir</button>
        </form>

    </div>

</body>
</html>