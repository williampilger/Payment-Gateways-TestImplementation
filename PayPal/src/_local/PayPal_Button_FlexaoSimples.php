<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Test</title>
</head>
<body>
    <div id="paypal-button-container-P-0BP10906K73355139MMDGFGQ"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=AViSIf2mzLhwGM4uvRP_Ht6oT35afjexTQkVoLZZ8BPawGGgJxd4SJPrngMDeHuYuMgjtXZo_cjzCP95&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
    <script>
    paypal.Buttons({
        style: {
            shape: 'pill',
            color: 'black',
            layout: 'horizontal',
            label: 'subscribe'
        },
        createSubscription: function(data, actions) {
            return actions.subscription.create({
            /* Creates the subscription */
            plan_id: 'P-0BP10906K73355139MMDGFGQ'
            });
        },
        onApprove: function(data, actions) {
            alert(data.subscriptionID); // You can add optional success message for the subscriber here
        }
    }).render('#paypal-button-container-P-0BP10906K73355139MMDGFGQ'); // Renders the PayPal button
    </script>
</body>
</html>

