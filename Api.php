<?php

/**
 * Classe PHP para utilização da APi whatsapp com a Megaapi
 */
class Api{

    private $host;
    private $instanceKey;
    private $token;


    /**
     * Metodo construtor
     *
     * @param [string] $instanceKey
     * @param [string] $token
     */
    public function __construct($host, $instanceKey, $token){

        $this->host = $host
        $this->instance = $instanceKey;
        $this->token = $token;

    }

    /**
     * Metodo para gerar o qrcode HTML
     *
     * @return html
     */
    public function qrcode(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/instance/qrcode/'.$this->instance,
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


    /**
     * Metodo para gerar o qrcode formato Base64
     *
     * @return array
     */
    public function qrcodeBase64(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/instance/qrcode_base64/'.$this->instance,
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
        return json_decode($response, true);
    }

    /**
     * Metodo logout na api
     *
     * @return json
     */
    public function logout(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/instance/'.$this->instance.'/logout',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    /**
     * Metodo para verificar o status da sua instance 
     *
     * @return json
     */
    public function status(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/instance/'.$this->instance,
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

    /**
     * Metodo para obter os dados do webhook
     *
     * @return array
     */
    public function webhook(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/webhook/'.$this->instance, 
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
        return json_decode($response, true);
    }

    /**
     * Metodo para setar o link do seu webhook
     *
     * @param [string] $url
     * @param [string] $status
     * @return json
     */
    public function configWebhook($url, $status){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/webhook/'.$this->instance.'/configWebhook',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "messageData": {
                "webhookUrl": "'.$url.'",
                "webhookEnabled": '.$status.'
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }

    /**
     * Metodo para enviar mensagem de texto
     *
     * @param [string] $contact
     * @param [string] $message
     * @return json
     */
    public function text($contact, $message){

        $data = array(
            "messageData" => array(
                "to" => $contact,
                "text" => $message
            )
        );

        $data = json_encode($data);

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/text',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    /**
     * Metodo para enviar mensagem de texto para varios contatos
     *
     * @param [string] $contacts
     * @param [string] $message
     * @return json
     */
    public function textToMany($contacts, $message){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/textToMany',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "messageData": {
                "to": [
                    '.$contacts.'
                ],
                "text": "'.$message.'"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    /**
     * Metodo para enviar arquivo via URL
     *
     * @param [string] $contact
     * @param [string] $file
     * @param [string] $filename
     * @param [string] $type
     * @param [string] $caption
     * @param [string] $mineType
     * @return json
     */
    public function mediaUrl($contact, $file, $filename, $type, $caption, $mineType){

        $data = array(
            "messageData" => array(
                "to"        => $contact,
                "url"       => $file,
                "fileName"  => $filename,
                "type"      => $type,
                "caption"   => $caption,
                "mimeType"  => $mineType
            )
        );

        $data = json_encode($data);

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/mediaUrl',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    /**
     * Metodo para enviar mensagem de arquivos para varios contatos
     *
     * @param [string] $contacts
     * @param [string] $file
     * @param [string] $type
     * @param [string] $caption
     * @param [string] $mineType
     * @return json
     */
    public function mediaUrlToMany($contacts,  $file, $type, $caption, $mineType){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/mediaUrlToMany',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "messageData": {
                "to": [
                    '.$contacts.'
                ],
                "url": "'.$file.'",
                "type": "'.$type.'",
                "caption": "'.$caption.'",
                "mimeType": "'.$mineType.'"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }


    /**
     * Metodo para converter os arquivos recebidos no webhook para base64
     *
     * @param [string] $mediaKey
     * @param [string] $directPath
     * @param [string] $url
     * @param [string] $mimetype
     * @param [string] $messageType
     * @return json
     */
    public function downloadMediaMessage($mediaKey, $directPath, $url, $mimetype, $messageType){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/instance/downloadMediaMessage/'.$this->instance,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageKeys": {
            "mediaKey": "'.$mediaKey.'",
            "directPath": "'.$directPath.'",
            "url": "'.$url.'",
            "mimetype": "'.$mimetype.'",
            "messageType": "'.$messageType.'"
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }


    /**
     * Menciona um contato na mensagem
     *
     * @param [string] $contacts
     * @param [string] $message
     * @param [string] $contactsMentioned
     * @return array
     */
    public function textMentioned($contacts, $message, $contactsMentioned){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/textMentioned',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageData": {
            "to": "'.$contacts.'",
            "text": "'.$message.'",
            "mentions": [
            "'.$contactsMentioned.'"
            ]
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);

    }



     /**
      * Enviar uma localização para um usuário do WhatsApp
      *
      * @param [string] $contacts
      * @param [string] $address
      * @param [string] $caption
      * @param [number] $latitude
      * @param [number] $longitude
      * @return array
      */
    public function location($contact, $address, $caption, $latitude, $longitude){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/location',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageData": {
            "to": "'.$contact.'",
            "address": "'.$address.'",
            "caption": "'.$caption.'",
            "latitude": '.$latitude.',
            "longitude": '.$longitude.'
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }


    /**
     * Método para enviar uma mensagem de modelo interativo para um usuário do WhatsApp
     *
     * @param [string] $contact
     * @param [string] $text
     * @param [string] $title1
     * @param [string] $title2
     * @param [string] $title3
     * @param [string] $payload1
     * @param [string] $payload2
     * @param [string] $footerText
     * @return array
     */
    public function templateMesage($contact, $text, $title1, $title2, $title3, $payload1, $payload2, $footerText){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/templateMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "messageData": {
                "to": "'.$contact.'",
                "text": "'.$text.'",
                "buttons": [
                    {
                        "type": "replyButton",
                        "title": "'.$title1.'"
                    },
                    {
                        "type": "urlButton",
                        "title": "'.$title2.'",
                        "payload": "'.$payload1.'"
                    },
                    {
                        "type": "callButton",
                        "title": "'.$title3.'",
                        "payload": "'.$payload2.'"
                    }
                ],
                "footerText": "'.$footerText.'"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);

    }

     /**
      * Método para enviar uma mensagem de modelo interativo com listMessage para um usuário do WhatsApp
      *
      * @param [string] $contact
      * @param [string] $buttonText
      * @param [string] $text
      * @param [string] $title1
      * @param [string] $description1
      * @param [string] $title2
      * @param [string] $title3
      * @param [string] $description2
      * @param [string] $rowID
      * @return array
      */
     public function listMessage($contact, $buttonText, $text, $title1, $description1, $title2, $title3, $description2, $rowID){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/listMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "messageData": {
                "to": "'.$contact.'",
                "buttonText": "'.$buttonText.'",
                "text": "'.$text.'",
                "title": "'.$title1.'",
                "description": "'.$description1.'",
                "sections": [
                    {
                        "title": "'.$title2.'",
                        "rows": [
                            {
                                "title": "'.$title3.'",
                                "description": "'.$description2.'",
                                "rowId": "'.$rowID.'"
                            }
                        ]
                    }
                ],
                "listType": 0
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }



    /**
     * Envie uma mensagem com contato para um usuário do WhatsApp
     *
     * @param [string] $contacts
     * @param [string] $fullname
     * @param [string] $displayName
     * @param [string] $organization
     * @param [string] $phoneNumber
     * @return void
     */
    public function contactMessage($contacts, $fullname, $displayName, $organization, $phoneNumber){
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/contactMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageData": {
            "to": "'.$contacts.'",
            "vcard": {
            "fullName": "'.$fullname.'",
            "displayName": "'.$displayName.'",
            "organization": "'.$organization.'",
            "phoneNumber": "'.$phoneNumber.'"
            }
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Encaminhar mensagem para o usuário
     *
     * @param [string] $contacts
     * @param [object] $key
     * @param [object] $message
     * @return array
     */
    public function forwardMessage($contacts, $key, $message){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/sendMessage/'.$this->instance.'/forwardMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageData": {
            "to": "'.$contacts.'",
            "key": {},
            "message": {}
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Responder uma mensagem enviada
     *
     * @param [string] $contacts
     * @param [string] $text
     * @param [object] $key
     * @param [object] $message
     * @return array
     */
    public function quoteMessage($contacts, $text, $key, $message){
       
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => '{{url}}sendMessage/'.$this->instance.'/quoteMessage',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
          "messageData": {
            "to": "'.$contacts.'",
            "text": "'.$text.'",
            "key": {},
            "message": {}
          }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return json_decode($response, true); 
    }

    /**
     * Simula eventos do whatsapp
     *
     * @param [string] $contacts
     * @param [string] $option
     * @return array
     */
    public function presenceUpdateChat($contacts, $option){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/chat/'.$this->instance.'/presenceUpdateChat',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "to": "'.$contacts.'",
        "option": "'.$option.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Fixa uma conversa . Limite de 3 conversas
     *
     * @param [string] $contact
     * @param [string] $option
     * @return void
     */
    public function pinChat($contact, $option){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/chat/'.$this->instance.'/pinChat',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "to": "'.$contact.'",
        "option": "'.$option.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Bloqueia e desbloqueia um contato whatsapp
     *
     * @param [string] $contact
     * @param [string] $option
     * @return void
     */
    public function blockChat($contact, $option){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/chat/'.$this->instance.'/blockChat',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "to": "'.$contact.'",
        "option": "'.$option.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

     /**
      * Confirmação de mensagem lida
      *
      * @param [object] $key
      * @return array
      */ 
     public function readMessage($key){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/chat/'.$this->instance.'/readMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageData": {
            "key": {}
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);

    }

    /**
     * Deletar uma mensagem
     *
     * @param [string] $contact
     * @param [object] $key
     * @return array
     */
    public function deleteMessage($contact, $key){

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/chat/'.$this->instance.'/deleteMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "messageData": {
          "to": "'.$contact.'",
          "key": {}
        }
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.$this->token
        ),
        ));
       
        $response = curl_exec($curl);
        
        curl_close($curl);
        return json_decode($response, true);
    }


    /**
     * Lista todos os grupos
     *
     * @return array
     */
    public function listGroup(){
      
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/list/'.$this->instance,
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
        return json_decode($response, true);
    }


    /**
     * Metodo para listar os grupos que o contato é admin
     *
     * @return array
     */
    public function adminGroups(){

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/adminGroups',
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
        return json_decode($response, true);
    }


    /**
     * Liste todos os grupos em que você está como admin junto com a matriz de participantes
     *
     * @return array
     */
    public function adminGroupsWithParticipants(){
       
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/adminGroupsWithParticipants',
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
        return json_decode($response, true);
    }

    /**
     * Todos os detalhes do grupo
     *
     * @param [string] $jid
     * @return array
     */
    public function getGroup($jid){
       
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/group/?jid='.$jid,
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
        return json_decode($response, true);
    }


    /**
     * Obter código de convite de grupo
     *
     * @param [string] $jid
     * @return array
     */
    public function groupInviteCode($jid){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => '{{url}}group/'.$this->instance.'/groupInviteCode?group_id='.$jid,
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
        return json_decode($response, true);
    }

    

    /**
     * Criar um novo grupo
     *
     * @param [string] $group_name
     * @param [array] $participants
     * @return array
     */
    public function create($group_name, $participants){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "group_data": {
            "group_name": "'.$group_name.'",
            "participants": [
                '.$participants.'
            ]
        }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }


    /**
     * Adicionar participantes no grupo
     *
     * @param [string] $jdi
     * @param [array] $participants
     * @return array
     */
     public function addParticipants($jdi, $participants){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/addParticipants',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "group_data": {
                "jid": "'.$jdi.'",
                "participants": [
                    '.$participants.'
                ]
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Remover participantes do grupo
     *
     * @param [string] $jdi
     * @param [array] $participants
     * @return array
     */
     public function removeParticipants($jdi, $participants){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/removeParticipants',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "group_data": {
                "jid": "'.$jdi.'",
                "participants": [
                    '.$participants.'
                ]
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Rebaixar determinados participantes no grupo
     *
     * @param [string] $jdi
     * @param [array] $participants
     * @return array
     */
    public function demoteParticipants($jdi, $participants){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/demoteParticipants',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "group_data": {
                "jid": "'.$jdi.'",
                "participants": [
                    '.$participants.'
                ]
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    

    /**
     * Promover participantes
     *
     * @param [string] $jdi
     * @param [array] $participants
     * @return array
     */
    public function promoteParticipants($jdi, $participants){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/promoteParticipants',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "group_data": {
                "jid": "'.$jdi.'",
                "participants": [
                    '.$participants.'
                ]
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Definir quem pode enviar mensagem no grupo
     *
     * @param [string] $jdi
     * @param [string] $status
     * @return void
     */
    public function setWhoCanSendMessage($jdi, $status){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/setWhoCanSendMessage?jid='.$jdi.'&allowOnlyAdmins='.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Definir quem pode alterar as configurações do grupo
     *
     * @param [string] $jdi
     * @param [string] $status
     * @return array
     */
    public function setWhoCanChangeSettings($jdi, $status){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/setWhoCanChangeSettings?jid='.$jdi.'&allowOnlyAdmins='.$status,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);

    }


    /**
     * Deixar o grupo
     *
     * @param [string] $jdi
     * @return array
     */
     public function leaveGroup($jdi){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://'.$this->host.'/rest/group/'.$this->instance.'/leaveGroup?jid='.$jdi,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
        
    }

}

?>
