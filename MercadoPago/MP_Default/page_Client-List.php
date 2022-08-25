<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="base-flex center">
        <h1><span class="side">[SERVER-SIDE]</span>Pesquisar usuários existentes</h1>
        <span>Pesquisar usuários. Deixar o campo em branco não restringe a pesquisa.<br><br></span>
        <form id="form-checkout" class="center base-flex" action="/ajax/Client-List.php/" method="POST">
            <input type="text" id="form" name="email" placeholder="Email" />
            <input type="text" id="ID" name="id" placeholder="ID" />
            <div>
                <input type="checkbox" id="json" name="json">
                <label for="json">Resultado Completo</label>
            </div>
            <button type="submit" id="form-newUser__submit">Buscar</button>
        </form>

    </div>

</body>
</html>