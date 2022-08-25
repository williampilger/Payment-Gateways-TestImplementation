<?php
    require_once __DIR__.'/_local/cred.php';
    require_once __DIR__.'/_local/MercadoPago.class.php';

    $mp = new MercadoPago(MP_credentials['ENV_ACCESS_TOKEN'], MP_credentials['APP_ID']);

    $cards = $mp->Customer_get($_POST['id'])['cards'];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get card token</title>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="center base-flex">
        <h1> <span class="side">[CLIENT-SIDE]</span> Obter Token para validar pagamento com cartão salvo.</h1>
        <span>Este passo obtém o token de validação do método de pagamento já salvo anteriormente. A etapa seguinte é fazer o pagamento.<br> <br></span>
        
        <form id="form-checkout">
            <select type="text" id="form-checkout__cardId"></select>
            <div id="form-checkout__securityCode-container" class="container"></div>
            <input name="token" id="token" hidden>
            <button>Enviar</button>
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

        const formElement = document.getElementById('form-checkout');
        formElement.addEventListener('submit', e => createCardToken(e));
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