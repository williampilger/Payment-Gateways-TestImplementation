<?php
/*
 * Authenty AE - Bom Princípio-RS  |  github.com/authentyAE
 * by: will.i.am                   |  github.com/williampilger
 *
 * 2022.08.24 - Bom Princípio - RS
 * ♪ - / -
 *  
 * Class responsible for ... .
 * 
 */
require_once __DIR__."/../config.php";

class PayPal
{
    const BASE = 'https://api-m.sandbox.paypal.com';

    private $client_id;
    private $client_secret;
    

    public function __construct()
    {
        
    }

    // #####################################################################################################################
    // # PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Methods - PUBLIC Meth #
    // #####################################################################################################################

    // #####################################################################################################################
    // # STATIC PUBLIC Methods - STATIC PUBLIC Methods - STATIC PUBLIC Methods - STATIC PUBLIC Methods - STATIC PUBLIC Met #
    // #####################################################################################################################

    // #####################################################################################################################
    // # PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVATE Methods - PRIVA #
    // #####################################################################################################################

    /**
     * Do a cURl HTTP(S) request.
     * @param string $type Type of request (POST|GET|PUT)
     * @param string $endpoint A endpoint name to do a request.
     * @param array $fields Associative Array with the body paramethers.
     */
    private function doRequest( string $type, string $endpoint, array $fields )
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer {$this->authToken}", 'Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        switch($type)
        {
            case 'POST':
                curl_setopt($ch, CURLOPT_URL, PayPal::BASE."/$endpoint" );
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields) );
                break;
            case 'GET':
                $params = PayPal::buildParamString($fields);
                curl_setopt($ch, CURLOPT_URL, PayPal::BASE."/$endpoint?$params" );
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_URL, PayPal::BASE."/$endpoint" );
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