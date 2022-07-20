<?php

/***
 * Megaapi - A melhor api whatsapp do Brasil
 * Para utilizar os recursos, so descomentar qual vai querer executar no momento
 * Lembre-se de colcoar as credenciais para o funciomaneto do codigo
 */

require_once 'Api.php';
$api = new Api("sua instance_key", "seu token");


/**Gerando o qrCode */
//$api->qrcode();


/**Gerando o qrCode */
// $code = $api->qrcodeBase64();
// echo '<h1>QRCODE Whatsapp</h1><hr><img src="'.$code["qrcode"].'"/>';

/**Logout na api */
//$api->logout();

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