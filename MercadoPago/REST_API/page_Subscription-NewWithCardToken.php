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
        <h1> <span class="side">[SERVER-SIDE]</span> Criar Assinatura (Pagamento Recorrente)</h1>
        <span>Cadastra o Cliente em um Plano de assinatura, usando um Token de cartão pré obtido.</span>
        
        <form id="form-checkout" action="/ajax/Subscription-NewWithCardToken.php/" method="POST">
            
            <input type="email" id="form-checkout__email" name="email" placeholder="Email do usuário" />
            <input type="text" id="form-checkout__plan" name="plan" placeholder="ID do Plano" />
            <input type="text" id="form-checkout__cardToken" name="cardToken" placeholder="Token do Cartão (Obtido na validação Client-side)" />

            <button type="submit" id="form-newUser__submit">Criar Assinatura</button>
        </form>

    </div>
</body>
</html>