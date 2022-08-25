<?php
    require_once __DIR__.'/_local/cred.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Plan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Novo Plano</h1>
        <span>Criar novo plano de assinatura. Este plano será usado futuramente para cadastrar os clientes na recorrência. <br> <br></span>
        
        <form id="form-checkout" action="/ajax/Plan-New.php/" method="POST">
            
            <input type="number" id="frequency" name="frequency" placeholder="Frequência, em MESES" required/>
            <input type="text" id="reason" name="reason" placeholder="Descrição da assinatura" required/>
            <input type="number" id="amount" name="amount" placeholder="Valor (R$)" required/>
            <div>
                <input type="checkbox" id="full" name="full">
                <label for="full">Resultado Completo</label>
            </div>
            
            <button type="submit">Criar Plano</button>

        </form>

    </div>

</body>
</html>