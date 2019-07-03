<?php
function postAccessToAPI(){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dev-fctx2bhe.auth0.com/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"client_id\":\"EtJMwPUuauvG7Tirv2UolC8ZxFQUKY0M\",
      \"client_secret\":\"amvdqHlemKlgBQK_aicGJJQd2mPE5ptkdexHtODX9zWbAXlb2qwJSdYY8O5mPESP\",
      \"audience\":\"http://localhost:3100\",
      \"grant_type\":\"client_credentials\"}",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json"
    ),
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
