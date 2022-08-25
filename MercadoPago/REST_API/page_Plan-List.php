<?php
    require_once __DIR__.'/_local/cred.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Plans</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[SERVER-SIDE]</span> Listar Planos</h1>
        <span>Listar todos os planos cadastrados. <br> <br></span>
        
        <form id="form-checkout" action="/ajax/Plan-List.php/" method="POST">

            <div>
                <input type="checkbox" id="onlyActives" name="onlyActives">
                <label for="onlyActives">Somente Ativos</label>
            </div>
            
            <button type="submit">Listar</button>

        </form>

    </div>

</body>
</html>