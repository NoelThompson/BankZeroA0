<?php

//require 'post-bzapi-app.php';

function bzApiUserPermissions($token){
  //$responseTokenFromPost = postAccessToAPI();
  //print_r($responseTokenFromPost);
  //$decodedJsonToken = json_decode($responseTokenFromPost);
  //$token = $decodedJsonToken->{'access_token'};
  //print_r($token);

  $curl = curl_init();

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
    //echo $response;
    return $response;
  }
}

function setPermissions($response){
  //$permissions = [];
  //print_r($response);
  $noQuotes = str_replace('"', "", $response);
  //print_r($response).'</br>';
  $permissions = explode(" ", $noQuotes);
  //echo $userPermissions[0];
  //$responseData = json_decode($response);
  //foreach($usersPermissions as $PermissionName){
  //  $permissions [] = $PermissionName->;
  //}
  //print_r($permissions);
  if(in_array("edit:mainpage", $permissions)){
    $reply = print_r('BZ Manager Role has been set for you through Auth0 RBAC');
  }
  if(!in_array("edit:mainpage", $permissions) && in_array("read:mainpage", $permissions)){
    $reply = print_r('BZ Employee Role has been set for you through Auth0 RBAC');
  }
  if($response == 'false'){
    $reply = print_r('You have no roles assigned to you for this application, please see your administrator. </br>');
  }
  /*else {
    $reply = print_r('you need to code a new permission');
  }*/
  return $reply;
}
?>
