<?php

function rbacUserRole($token){

  $curl = curl_init();

/* Calling an endpoint for our custom API with our Access token for the user.
Expecting a response back that either the user is a Manager or Employee */

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:3100/api/private-permissions",
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
    $noQuotes = str_replace('"', "", $response);
    return $noQuotes;
  }
}
?>
