<?php

//variabili utili

$client_id = "77bbe538c4744b50a82c2a7127e78604";
$client_secret = "f158fc6adc7c41489edf0dac2e0da3bf";
$limti = 4;
// ACCESS TOKEN
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
# Eseguo la POST
curl_setopt($ch, CURLOPT_POST, 1);
# Setto body e header della POST
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
$token=json_decode(curl_exec($ch), true);
curl_close($ch);    




// QUERY EFFETTIVA
$query = $_GET['autore'];
$url = 'https://api.spotify.com/v1/search?type=track&q='.$query. '&limit='. $limti;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
# Imposto il token
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
$res=curl_exec($ch);
curl_close($ch);

echo $res;


?>