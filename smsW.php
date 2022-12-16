<?php
// EJEMPLO: http://DOMINIO/smsW.php?texto=Testeando%20desde%20internet.
// https://reqbin.com/req/php/c-kvv2ga1h/convert-curl-to-php

$var1=$_GET["texto"];
$url = "https://graph.facebook.com/v13.0/105439765605181/messages";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Authorization: Bearer EAAFvvSbggDIBAIZCCXQuXR6eqPUOJnhuMNEFzgpUzJZCPDZBOSgjjgKm8Nw2MvpxZBSBkTQvSVz0cbFrGVuGjVN1nyMgZBCRYz767ShP6z3ZAnhcKZA1ubNHxBC1RnOw6lQTIPmHBSYXKzC4ZB7JuSsroZAMeOLkDw93x7Om4d3ZAkKXCsgSM5ZApi5",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
  "messaging_product": "whatsapp",
  "recipient_type": "individual",
  "to": "543755501946",
  "type": "text",
  "text": {
    "preview_url": false,
    "body": "$var1"
  }
}
DATA;
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);

?>