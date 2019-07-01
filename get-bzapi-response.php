<?php

require 'post-bzapi-app.php';

function bzApiUserRole(){
  $responseTokenFromPost = postAccessToAPI();
  //print_r($responseTokenFromPost);
  $decodedJsonToken = json_decode($responseTokenFromPost);
  $token = $decodedJsonToken->{'access_token'};
  //print_r($token);

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:3100/api/bzapprole",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array("authorization: Bearer ".$token),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    return $response;
  }
}
?>
