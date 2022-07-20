<?php


require_once 'Api.php';
$api = new Api("megaapi-Mvbea8DBZxhBUBSEv66LEXddkd", "Mvbea8DBZxhBUBSEv66LEXddkd");

/**Gerando o qrCode */
$api->qrcode();


/**Gerando o qrCode */
// $code = $api->qrcodeBase64();
// echo '<h1>QRCODE Whatsapp</h1><hr><img src="'.$code["qrcode"].'"/>';