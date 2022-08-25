<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Token de Cartão</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Obter Token de cartão salvo - Passo 1</h1>
        <span>Este passo serve apenas para obter o ID de usuário. Em seguida será exibido o formulário para o usuário correspondente. <br> <br></span>
        
        <form id="form-newUser" action="/page_Card-GetToken_2.php" method="POST">
            
            <input type="text" id="form-checkout__payer" name="id" placeholder="ID do Cliente" required />
            
            <button type="submit" id="form-newUser__submit">Continuar para o passo 2 (Autorização) </button>

        </form>

    </div>

</body>
</html>