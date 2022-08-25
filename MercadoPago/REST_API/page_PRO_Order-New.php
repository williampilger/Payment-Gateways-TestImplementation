<?php
    require_once __DIR__.'/_local/cred.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Criar ordem de pagamento</h1>
        <span>Obtém URL para segunda etapa do pagamento (client-side)</span>
        
        <form id="form-checkout" action="/ajax/PRO_Order-New.php/" method="POST">
            
            <input type="text" id="form-checkout__id" name="id" placeholder="ID do Usuário Pagante" />

            <button type="submit" id="form-newUser__submit">Criar</button>
        </form>

    </div>

</body>
</html>
