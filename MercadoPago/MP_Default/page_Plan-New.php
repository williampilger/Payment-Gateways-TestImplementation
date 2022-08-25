<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Plano</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Criar Plano para Assinaturas Futuras</h1>
        <span>Criar um plano, vinculado a um produto e uma recorrência, que será usado para vincular um cliente a um produto por recorrência.<br> <br></span>
        
        <form id="form-checkout" action="/ajax/Plan-New.php" method="POST">
            
            <input type="number" id="frequency" name="frequency" placeholder="Frequência, em MESES" />
            <input type="text" id="reason" name="reason" placeholder="Descrição da assinatura" />
            <input type="number" id="amount" name="amount" placeholder="Valor (R$)" />
            <div>
                <input type="checkbox" id="full" name="full">
                <label for="full">Resultado Completo</label>
            </div>
            
            <button type="submit">Criar Plano</button>

        </form>

    </div>
</body>
</html>