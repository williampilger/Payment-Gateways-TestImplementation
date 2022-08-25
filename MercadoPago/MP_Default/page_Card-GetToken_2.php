<?php
    require_once __DIR__.'/vendor/autoload.php';
    require_once __DIR__.'/_local/cred.php';

    MercadoPago\SDK::setAccessToken(MP_credentials['ENV_ACCESS_TOKEN']);

    $customer = MercadoPago\Customer::find_by_id($_POST['id']);

    $cards = $customer->toArray()['cards'];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Token de Cartão</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://sdk.mercadopago.com/js/v2"></script>

</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[CLIENT-SIDE]</span> Obter Token de cartão salvo - Passo 2</h1>
        <span>Este passo obtém o token de validação do método de pagamento já salvo anteriormente.<br><br></span>
        
        <form id="form-checkout">
            <select type="text" id="form-checkout__cardId"></select>
            <div id="form-checkout__securityCode-container" class="container"></div>
            <input name="token" id="token" hidden>
            <button id="submit-btn">Gerar Token e seguir para etapa 3</button>
        </form>

    </div>
    <script>
        const mp = new window.MercadoPago('<?php echo MP_credentials['PUBLIC_KEY']; ?>');

        const securityCodeElement = mp.fields.create('securityCode', {
            placeholder: "CVV"
        }).mount('form-checkout__securityCode-container');

        const customerCards = <?php echo json_encode($cards); ?>;

        function appendCardToSelect() {
            const selectElement = document.getElementById('form-checkout__cardId');
            const tmpFragment = document.createDocumentFragment();
            customerCards.forEach(({ id, last_four_digits, payment_method }) => {
                const optionElement = document.createElement('option');
                optionElement.setAttribute('value', id)
                optionElement.textContent = `${payment_method.name} ended in ${last_four_digits}`
                tmpFragment.appendChild(optionElement);
            })
            selectElement.appendChild(tmpFragment)
        }

        appendCardToSelect();

        const button = document.getElementById('submit-btn');
        button.addEventListener('click', e => createCardToken(e));
        const createCardToken = async (event) => {
            event.preventDefault();
            try {
                const tokenElement = document.getElementById('token');
                if (!tokenElement.value) {
                const token = await mp.fields.createCardToken({
                    cardId: document.getElementById('form-checkout__cardId').value
                });
                tokenElement.value = token.id;
                alert(`Use o token '${token.id}' para aprovar um pagamento no Server-side. Token válido apenas para um pagamento, e por um curto intervalo de tempo.`);
                }
            } catch (e) {
                console.error('error creating card token: ', e)
            }
        }

    </script>
    

</body>
</html>