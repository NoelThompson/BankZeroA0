<?php

require 'post-ae-app.php';

function apiRolesList($userID){
  $responseTokenFromPost = postForToken();
  //print_r($responseTokenFromPost);
  $decodedJsonToken = json_decode($responseTokenFromPost);
  $token = $decodedJsonToken->{'access_token'};
  //print_r($token);

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dev-fctx2bhe.us8.webtask.io/adf6e2f2b84784b57522e3b19dfc9201/api/users/".$userID."/roles",
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

function roleNames($response){
  $roleNames = [];
  $responseData = json_decode($response);
  foreach($responseData as $roleName){
    $roleNames [] = $roleName->name;
  }
  if(empty($roleNames)){
    $reply = print_r('You have no roles assigned to you </br>');
  }
  else{
    $bzRoleList = implode(', ', $roleNames);
    $reply = print_r($bzRoleList.'</br>');
  }
  return $reply;
}

?>
