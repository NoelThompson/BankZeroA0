<?php

require 'post-ae-app.php';

function apiRolesList($userID){
  $responseTokenFromPost = postForToken();
  $decodedJsonToken = json_decode($responseTokenFromPost);
  $token = $decodedJsonToken->{'access_token'};

  $curl = curl_init();

/* Authorization Extenion API used here.  Using this endpoint to get the roles of a single user, based on its unique identifier.*/

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
    return $response;
  }
}

/* Taking the response of all roles for a user, creating an array of them, to then create a string separated by commas*/

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
