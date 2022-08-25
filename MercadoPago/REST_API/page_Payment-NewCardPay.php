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
        <h1> <span class="side">[SERVER-SIDE]</span> Criar Pagamento com Token de Cartão</h1>
        <span>Você já precisa ter obtido um token de cartão para esta etapa. <br> <br></span>
        
        <form id="form-checkout" action="/ajax/Payment-NewCardPay.php/" method="POST">
            
            <input type="text" id="form-checkout__description" name="description" placeholder="Descrição da compra (opcional)" />
            <input type="text" id="form-checkout__external_reference" name="external_reference" placeholder="ID do produto (opcional)" />
            <input type="number" id="form-checkout__installments" name="installments" placeholder="Número de parcelas" required />

            <hr>
           
            <input type="text" id="form-checkout__payer" name="payer" placeholder="ID do pagador" required />
            <input type="text" id="form-checkout__payment_token" name="token" placeholder="Token" required />
            <input type="number" id="form-checkout__payment_transaction_amount" name="transaction_amount" placeholder="Valor a ser cobrado" required />
            
            <button type="submit" id="form-newUser__submit">Fazer Cobrança</button>
        </form>

    </div>

</body>
</html>
