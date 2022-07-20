<?php

/**
 * Classe PHP para utilização da APi whatsapp com a Megaapi
 */

class Api
{
    /**
     * Metodo construtor
     */
    private function __construct($instanceKey, $token){

        $this->instance = $instanceKey;
        $this->token = $token;

    }

    /**
     * Metodo para gerar o qrcode 
     */
    public function qrcode(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api2.megaapi.com.br/rest/instance/qrcode/'.$this->instance,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    
}