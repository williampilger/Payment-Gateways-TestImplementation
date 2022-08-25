<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Assinatura</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Criar Assinatura Recorrente</h1>
        <span>Criar assinatura mensal (Definido no backend por padrão para fins de teste).<br> <br></span>
        
        <form id="form-checkout" action="/ajax/Subscription-New.php" method="POST">
            
            <input type="text" id="form-checkout__description" name="description" placeholder="Descrição da compra (opcional)" />
            <input type="text" id="form-checkout__external_reference" name="external_reference" placeholder="ID do produto (opcional)" />

            <input type="text" name="email" placeholder="Email do cliente" required />
            <input type="text" name="token" placeholder="Token do Cartão" required />
            <input type="number" name="amount" placeholder="Valor da cobrança mensal" required />

            <div>
                <input type="checkbox" id="full" name="full">
                <label for="full">Resultado Completo</label>
            </div>
            
            <button type="submit">Fazer Cobrança</button>

        </form>

        <span><br> Após a cobrança com sucesso, o backend recebe uma notificação de "payment.created" da API do mercado Pago. <br> Obviamente só receberá se você possui as notificações configuradas no painel do Mercado Pago Developpers.</span>
    </div>

</body>
</html>