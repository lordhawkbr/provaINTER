<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://interconstrutora136393.fluig.cloudtotvs.com.br/process-management/api/v2/tasks",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
//   CURLOPT_COOKIE => "JSESSIONID=%229eSlA4VKZPNHnGby5dLT9635WhnA6eZd-W17HBoy.master%3A136393-core-instance-N-FL-P-CZUEFO-1-dc778dLIN-Z2%22; JSESSIONID=%22C9lXERNNdRLt6eT8XeIgdHEyLA7_fGBZnbVjWhIN.master%3A136393-core-instance-N-FL-P-CZUEFO-1-dc778dLIN-Z2%22; JSESSIONIDSSO=xqTh0Op3aDXqN73NJp1Xq8Pm5GdubCeUfIo-NPrI",
  CURLOPT_HTTPHEADER => [
    "Authorization: OAuth oauth_consumer_key='teste', oauth_nonce='IgxHdvYzoyPpbg90nIyGlzMOMbb1oF0S', oauth_signature='0MU6D15kBayMP4c8551nqgc7qLM%3D', oauth_signature_method='HMAC-SHA1', oauth_timestamp='1656633891', oauth_token='5eb19570-49fc-4cdc-a9e8-61d1b4d45e7c', oauth_version='1.0'"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
