<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="base-flex">

    <div class='center base-flex'>
        <h1>Testes de API - MercadoPago</h1>
        <span>Usando API REST com cURL no backend (Sem a biblioteca <strong>MercadoPago/sdk</strong> ).</span>
        <span>Assim as respostas e envios são sempre em JSON, mais fácil de entender o que está acontecendo.</span>
        <div class="group2 base-flex">
            <div class="gsec base-flex">
                <h2>Checkout Transparente</h2>
                <div class="sec base-flex">
                    <h3>Clientes</h3>
                    <div class="psec base-flex">
                        <h4>Cadastro</h4>
                        <a href="/page_Client-New.php">Cadastrar Novo Cliente</a>
                        <a href="/page_Client-List.php">Pesquisar em Clientes</a>
                        <a href="/page_Client-Update.php">Atualizar Cliente</a>
                        <a href="/.php">#Excluir Cliente</a>
                    </div>
                    <div class="psec base-flex">
                        <h4>Cartões</h4>
                        <a href="/page_Card-New.php">Criar Token de Cartão (Novo Cartão)</a>
                        <a href="/page_Card-SaveToClient.php">Atribuir Cartão ao Cliente</a>
                        <a href="/page_Card-ListPerUser.php">Listar Cartões por Clientes</a>
                        <a href="/page_Card-GetToken_1.php">Gerar Token de Catão Salvo</a>
                        <a href="/.php">#Excluir Cartão</a>
                    </div>
                </div>
                <div class="sec base-flex">
                    <h3>Pagamentos</h3>
                    <div class="psec base-flex">
                        <h4>Pagamento Simples (Cartão de Crédito)</h4>
                        <a href="/page_Payment-NewSimpleWitoutClient.php">Pagamento com Cartão, sem Cliente (Default Form) </a>
                        <a href="/page_Payment-NewCardPay.php">Novo Pagamento</a>
                        <a href="/.php">#Estornar Pagamento</a>
                        <a href="/.php">#Consultar Pagamento</a>
                    </div>
                    <div class="psec base-flex">
                        <h4>Assinaturas / Reccorência (Cartão de Crédito)</h4>
                        <a href="/page_Plan-New.php">Criar Plano para Assinaturas</a>
                        <a href="/page_Plan-List.php">Listar Planos Existentes</a>
                        <a href="/page_Subscription-New.php">Criar Assinatura</a>
                        <a href="/.php">#Listar Assinaturas</a>
                        <a href="/.php">#Cancelar Assinatura Recorrente</a>
                        <a href="/.php">#Estornar Pagamento</a>
                        <a href="/.php">#Consultar Pagamento</a>
                    </div>
                </div>
            </div>
            <div class="gsec base-flex">
                <h2>Checkout PRO</h2>
                <span>Obs: Muitas das funções de back-end do <br>Checkout Transparente são compartilhadas.</span>
                <div class="sec base-flex">
                    <h3>Clientes</h3>
                    <div class="psec base-flex">
                        <h4>Cadastro</h4>
                    </div>
                    <div class="psec base-flex">
                        <h4>Cartões</h4>
                    </div>
                </div>
                <div class="sec base-flex">
                    <h3>Pagamentos</h3>
                    <div class="psec base-flex">
                        <h4>Pagamento Simples (Cartão de Crédito)</h4>
                        <a href="/page_PRO_Order-New.php">Nova Ordem de Pagamento</a>
                    </div>
                    <div class="psec base-flex">
                        <h4>Assinaturas / Reccorência (Cartão de Crédito)</h4>
                    </div>
                </div>
            </div>
            
        </div>
        <span># - Recursos ainda não desenvolvidos</span>
    </div>

</body>
</html>
