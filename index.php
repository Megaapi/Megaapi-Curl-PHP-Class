<?php

/***
 * Megaapi - A melhor api whatsapp do Brasil
 * Para utilizar os recursos, so descomentar qual vai querer executar no momento
 * Lembre-se de colcoar as credenciais para o funciomaneto do codigo
 */

require_once 'Api.php';
$api = new Api("instance_key", "token");


/**Gerando o qrCode */
//$api->qrcode();


/**Gerando o qrCode */
// $code = $api->qrcodeBase64();
// echo "<pre>";
// print_r($code);
// echo '<h1>QRCODE Whatsapp</h1><hr><img src="'.$code["qrcode"].'"/>';

/**Logout na api */
//$api->logout();

/**Traz os ados do webhook*/
// $array = $api->webhook();
// echo "<pre>";
// print_r($array);

/**Faz a troca de url do webhook */
//$api->configWebhook("https://webhook.site/6411236e-f1d1-4960-956f-3001254d0c01", true);

/**Verificando o status da instance */
//$api->status();

/**Fazendo envio de mensagem normal */
//$api->text("551199999999@s.whatsapp.net", "TEstando a mensagem");

/**Fazendo envio de arquivos via url */
//$api->mediaUrl("551199999999@s.whatsapp.net", "https://www.thecampusqdl.com/uploads/files/pdf_sample_2.pdf", "pdfExemplo.pdf", "document", "", "application/pdf");


/**Fazendo envio para varios contato de uma so vez */
// $array = array(
//     '"551199999999@s.whatsapp.net"', 
//     '"551199999999@s.whatsapp.net"'
// );
// $contacts = implode(", ", $array);
// $api->textToMany($contacts, "Testando textToMany");

/**Fazendo envio de arquivos para varios contato de uma so vez */
// $array = array(
//     '"551199999999@s.whatsapp.net"', 
//     '"551199999999@s.whatsapp.net"'
// );
// $contacts = implode(", ", $array);
// $api->mediaUrlToMany($contacts, "https://www.thecampusqdl.com/uploads/files/pdf_sample_2.pdf", "document", "teste", "application/pdf");

/**Fazendo o download do arquivo em formato base64, arquivo que foi recebido via webhook */
// $r = $api->downloadMediaMessage("aLYlOR3TOFIMq52+a99WbAfuKiPbe9Hn2BGrtIKYph8=", "/v/t62.7118-24/31864648_355381780108709_6203146661184771381_n.enc?ccb=11-4&oh=01_AVwTMY3eszXhfQ1teuar26n0IexFnZlNeLJFc87LWUte2g&oe=62FE35DB", "https://mmg.whatsapp.net/d/f/AoSBV50He_TOdkPZ9BoEnEDyS6Qp15BWsCARM0AK__mh.enc", "image/jpeg", "image");
// print_r(json_decode($r, true));

/**Envio de mensagem mencionando um contato */
/**$array = $api->textMentioned("551199999999@s.whatsapp.net", "@551199999999 Testando...", "551199999999@s.whatsapp.net");

/**Localização */
/**$array = $api->location("551199999999@s.whatsapp.net", "@551199999999 Testando...", "avenida das palmeiras", "Rua 5");*/

//Envie uma mensagem de modelo interativa para um usuário do WhatsApp
// $array = $api->templateMesage('551199999999@s.whatsapp.net', 'Testanto', 'botao1', 'botao2', 'botao3', 'https://google.com', 'Numero de Telefone', 'Test1');
// echo "<pre>";
// print_r($array);

//Envie uma mensagem de modelo interativa com listMessage para um usuário do WhatsApp
// $array = $api->listMessage('551199999999@s.whatsapp.net', 'Escolha', 'Testando', 'Teste', 'Selecione uma forma de pagamento', 'PIX', 'PIX', 'Pagamento via pix', '01');
// echo "<pre>";
// print_r($array);

/**Envie uma mensagem vacard para um usuário do WhatsApp */
/**$array = $api->contactMessage("551199999999@s.whatsapp.net", "Teste ", "Pequeno teste", "Empresa teste", "@551199999999 TESTE...");*/

//Encaminhar mensagem para o usuário
// $array = $api->forwardMessage('551199999999@s.whatsapp.net', '10', 'Alguma mensagem para teste', "551199999999@s.whatsapp.net" );
// echo "<pre>";
// print_r($array);

/** Responder uma mensagem enviada*/
/**$array = $api->quoteMessage("551199999999@s.whatsapp.net" ,"551199999999@s.whatsapp.net" );*/



// Simula eventos do whatsapp
// $array = $api->presenceUpdateChat('551199999999@s.whatsapp.net', 'Digitando...');
// echo "<pre>";
// print_r($array);

// Fixa uma conversa . Limite de 3 conversas
// $array = $api->pinChat('551199999999@s.whatsapp.net', false);
// echo "<pre>";
// print_r($array);

// Bloqueia e desbloqueia um contato whatsapp
// $array = $api->blockChat('551199999999@s.whatsapp.net', false);
// echo "<pre>";
// print_r($array);

// Leia a mensagem
// $array = $api->readMessage();
// echo "<pre>";
// print_r($array);

// Deletar uma mensagem
// $array = $api->deleteMessage('551199999999@s.whatsapp.net');
// echo "<pre>";
// print_r($array);



/*Lista todos os grupos */
/**$array = $api->listGroup("");*/

/**Liste todos os grupos em que você está como administrador */
/**$array = $api->adminGroups("");*/

/**Liste todos os grupos em que você está como admin junto com a matriz de participantes */
/**$array = $api->adminGroupsWithParticipants("");*/

/** Todos os detalhes do grupo*/
/*$array = $api->getGroup("" );*/

/**Obter código de convite de grupo*/
//$array = $api->groupInviteCode("");

/**Criar um novo grupo*/
/**$array = $api->create('Gupo do bom', '551199999999@s.whatsapp.net');*/

// Adicionar participantes no grupo
// $array = $api->addParticipants('120363042378568057@g.us', '551199999999@s.whatsapp.net');
// echo "<pre>";
// print_r($array);

// Remover participantes do grupo
// $array = $api->removeParticipants('120363042378568057@g.us', '551199999999@s.whatsapp.net');
// echo "<pre>";
// print_r($array);

// Rebaixar determinados participantes no grupo
// $array = $api->demoteParticipants('120363042378568057@g.us', '551199999999@s.whatsapp.net');
// echo "<pre>";
// print_r($array);

// Promova determinados participantes no grupo
// $array = $api->promoteParticipants('120363042055651690@g.us', '551199999999@s.whatsapp.net');
// echo "<pre>";
// print_r($array);

// Definir quem pode enviar mensagem no grupo
//$array = $api->setWhoCanSendMessage('120363042055651690@g.us', false);
//echo "<pre>";
//print_r($array);

//Definir quem pode alterar as configurações do grupo 
// $array = $api->setWhoCanChangeSettings('120363042055651690@g.us', false);
// echo "<pre>";
// print_r($array);

// Deixar o grupo
// $array = $api->leaveGroup();
// echo "<pre>";
// print_r($array);


/**echo "<pre>";
print_r($array);*/
