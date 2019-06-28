<?php
function postForToken(){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dev-fctx2bhe.auth0.com/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"client_id\":\"yOn73DRXAR8dtvVp9U1zoM6Djo7TD5TO\",\"client_secret\":\"WI-Dpc0w8Y3KwDH-GAj-wo93BYS44n-X17qDUPU-r7AMlzMJRTX2fqoNnqH1hf_s\",\"audience\":\"urn:auth0-authz-api\",\"grant_type\":\"client_credentials\"}",
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
    return $response;
  }
}
?>
