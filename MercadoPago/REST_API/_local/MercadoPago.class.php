<?php
/*
 * Authenty AE - Bom Princípio-RS  |  github.com/authentyAE
 * by: will.i.am                   |  github.com/williampilger
 *
 * 2022.08.11 - Bom Princípio - RS
 * ♪ - / -
 *  
 * Class responsible for intermediate API calls for MercadoPago's API.
 * 
 */

class MercadoPago
{

    private const BASE = 'https://api.mercadopago.com';

    public $authToken;
    public $appID;

    /**
     * Instantiate a MarcadoPago object.
     * @param string $accesstoken You application's Access Token.
     */
    public function __construct( string $accesstoken, string $appID = '')
    {
        if(isset($accesstoken) && $accesstoken != '')
        {
            $this->authToken = $accesstoken;
            $this->appID = $appID;

            return;
        }
        throw new Exception('Code 2208111515. Impossible instantiate a MercadoPago object.');
    }

    // #####################################################################################################################
    // # PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Meth #
    // #####################################################################################################################

    public function Customer_getByID( string $id )
    {
        $resp = $this->doRequest('POST', "v1/customers/$id", []);
        return $resp;
    }

    public function Customer_new( string $email, string $cpf, array $address )
    {
        $data = [
            'email' => $email,
            'identification' => [
              'type' => 'CPF',
              'number' => $cpf
            ],
            'address' => $address
        ];
        $resp = $this->doRequest('POST', 'v1/customers', $data );
        
        return $resp;
    }

    public function Customer_search( array $find )
    {
        $resp = $this->doRequest('GET', 'v1/customers/search', $find );
        
        return $resp;
    }

    public function Customer_get( string $id )
    {
        $resp = $this->doRequest('GET', "v1/customers/$id", []);

        return $resp;
    }

    public function Customer_update( string $id, array $changes )
    {
        $resp = $this->doRequest('PUT', "v1/customers/$id", $changes);

        return $resp;
    }

    public function Customer_addCard( string $id, string $cardToken )
    {
        return $this->doRequest('POST', "v1/customers/$id/cards", ['token'=>$cardToken]);
    }

    public function Card_get( string $userID, string $cardID )
    {
        return $this->doRequest('GET', "v1/customers/$userID/cards/$cardID", []);
    }

    public function Payment_new( array $data )//##VER## Isso não é usado, atualmente.
    {
        $resp = $this->doRequest('POST', 'v1/payments', $data);

        return $resp;
    }

    public function Order_new( string $payer )
    {
        $data = [
            'application_id' => $this->appID,
            'notification_url' => 'https://store.authentydev.com.br/ws/gateways_responses/MercadoPago.php',
            // 'payer' => $payer,
            'site_id' => 'MLB'
        ];

        $resp = $this->doRequest('POST', 'merchant_orders', $data);
        return $resp;
    }

    /**
     * Criar uma nova assinatura recorrente (mensal ou anual).
     * @param bool $anualy Setada torna a recorrência de 12 em 12 mêses
     * @param string $user_email Email do usuário/cliente
     * @param string $short Nome/Descrição curta do produto. Aparece nas notificações e na fatura do cliente.
     */
    public function Subscription_new( string $plan, string $user_email, string $cardToken)
    {

        $data = [ //Para recorrências SEM PLANO ASSOCIADO
            'back_url' => 'https://store.authentydev.com.br/ws/gateways_responses/MercadoPago.php',
            'payer_email' => $user_email,
            'preapproval_plan_id' => $plan,
            'card_token_id' => $cardToken,
            'status'=>'authorized'
        ];
        return $this->doRequest('POST', 'preapproval', $data);
    }

    public function Plan_new( string $backURL, int $frequencyMonth, float $amount, string $reason )
    {
        $data = [
            'back_url' => $backURL,
            'auto_recurring' => [
                'frequency' => $frequencyMonth
                ,'frequency_type' => 'months'
                ,'transaction_amount' => $amount
                ,'currency_id' => 'BRL'
            ],
            'reason' => $reason
        ];

        return $this->doRequest('POST', 'preapproval_plan', $data);
    }

    public function Plan_Search( array $filters )
    {
        return $this->doRequest('GET', 'preapproval_plan/search', $filters);
    }

    // #####################################################################################################################
    // # STATIC PUBLIC Methods - STATIC PUBLIC Methods - STATIC PUBLIC Methods - STATIC PUBLIC Methods - STATIC PUBLIC Met #
    // #####################################################################################################################

    // #####################################################################################################################
    // # PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVA #
    // #####################################################################################################################

    /**
     * ##VER##AQUI##FAZER## Descrever bem essa função.
     */
    private function doRequest( string $type, string $endpoint, array $fields )
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer {$this->authToken}", 'Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        switch($type)
        {
            case 'POST':
                curl_setopt($ch, CURLOPT_URL, MercadoPago::BASE."/$endpoint" );
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields) );
                break;
            case 'GET':
                $params = MercadoPago::buildParamString($fields);
                curl_setopt($ch, CURLOPT_URL, MercadoPago::BASE."/$endpoint?$params" );
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_URL, MercadoPago::BASE."/$endpoint" );
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                break;
            default:
                throw new Exception('Code 2208121434. Invalid request type informed.');
                break;
        }

        $response = curl_exec($ch);
        curl_close ($ch);

        if($response) $response = json_decode($response, true);
        
        return $response;
    }


    // #####################################################################################################################
    // # STATIC PRIVATE Methods - STATIC PRIVATE Methods - STATIC PRIVATE Methods - STATIC PRIVATE Methods - STATIC PRIVAT #
    // #####################################################################################################################

    /**
     * Transform an associative array (key=>value) in an URL paramethers string.
     * @param array $fields Assiative Array.
     * @return string URL param strig.
     */
    private static function buildParamString( array $fields )
    {
        $str = '';
        foreach ($fields as $key=>$value)
        {
            $str .= "$key=$value&";
        }
        return substr($str, 0, -1);
    }
}

?>