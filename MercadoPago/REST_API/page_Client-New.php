<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">
        <h1><span class="side">[SERVER-SIDE]</span>Criar Novo Usuário</h1>
        <span>Criar usuário básico.</span>
        <form id="form-checkout" action="/ajax/Client-New.php/" method="POST">
            
            <input type="email" id="form-checkout__email" name="email" placeholder="E-mail" />
            <input type="text" id="form-checkout__cpf" name="cpf" placeholder="CPF, sem pontos e traço" />
            <div>
                <input type="text" id="form-checkout__zip" name="zip" placeholder="CEP" />
                <input type="text" id="form-checkout__street" name="street" placeholder="Rua" />
                <input type="number" id="form-checkout__number" name="number" placeholder="Número" />
            </div>

            <button type="submit" id="form-newUser__submit">Criar</button>
        </form>

    </div>

</body>
</html>
