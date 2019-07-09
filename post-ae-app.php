<?php
function postForToken(){
  $curl = curl_init();

/* Authorization API used for Client Credentials flow.  This is the OAuth 2.0 grant that server processes use to access an API.
Use this endpoint to directly request an Access Token by using the Client's credentials (a Client ID and a Client Secret). */

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dev-fctx2bhe.auth0.com/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"client_id\":\"5Ydf2GbE76KrE2YTTJxK5dLlycTifMoT\",\"client_secret\":\"s_XjF13tpnvd7UKGPttM2rP0mk2F9_Ytc_d6Uj2gsPVC_ZwicOZkBeXs4-zWcTRR\",\"audience\":\"urn:auth0-authz-api\",\"grant_type\":\"client_credentials\"}",
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
