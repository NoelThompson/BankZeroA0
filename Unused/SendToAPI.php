<?php
/*function getUsersInfo(){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dev-fctx2bhe.us8.webtask.io/adf6e2f2b84784b57522e3b19dfc9201/api/roles",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik9UaEROelZFUmprNU5ETTBOakUxT1RZeE5rVkZOVEEzUlVWQ01rSXpOa1pCTVVKRk1UazFOZyJ9.eyJpc3MiOiJodHRwczovL2Rldi1mY3R4MmJoZS5hdXRoMC5jb20vIiwic3ViIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE9AY2xpZW50cyIsImF1ZCI6InVybjphdXRoMC1hdXRoei1hcGkiLCJpYXQiOjE1NjE1ODkyNzYsImV4cCI6MTU2MTY3NTY3NiwiYXpwIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE8iLCJzY29wZSI6InJlYWQ6dXNlcnMgcmVhZDphcHBsaWNhdGlvbnMgcmVhZDpjb25uZWN0aW9ucyByZWFkOmNvbmZpZ3VyYXRpb24gdXBkYXRlOmNvbmZpZ3VyYXRpb24gcmVhZDpncm91cHMgY3JlYXRlOmdyb3VwcyB1cGRhdGU6Z3JvdXBzIGRlbGV0ZTpncm91cHMgcmVhZDpyb2xlcyBjcmVhdGU6cm9sZXMgdXBkYXRlOnJvbGVzIGRlbGV0ZTpyb2xlcyByZWFkOnBlcm1pc3Npb25zIGNyZWF0ZTpwZXJtaXNzaW9ucyB1cGRhdGU6cGVybWlzc2lvbnMgZGVsZXRlOnBlcm1pc3Npb25zIHJlYWQ6cmVzb3VyY2Utc2VydmVyIGNyZWF0ZTpyZXNvdXJjZS1zZXJ2ZXIgdXBkYXRlOnJlc291cmNlLXNlcnZlciBkZWxldGU6cmVzb3VyY2Utc2VydmVyIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.3vNiZF2jNGANEMNU1ouJrgEhYlf4fSv0INcMDfFrN5cEP6kLyoU1JsljKBj8IeiaeTRNP6MRpyql8rbXB3jRiOyjA-RUXvdVMfMNOTXr5MNZIjjyEHwMGVfLivne9-6ogntP3-NUOj9oh8SAt2LZ6caLaiJ8htP4StrgwzkSg4Bp4vbRDOXyXvfJ0oAMETmA4mdUJgFnVI5vs2a8UHZ5wUmdUE4nz_KSKb2Uq6hp9SgN1RpMgoED5iie0-FUnUmhQR-siKTt8BCRS0wiP831KafTU7crbgHi5D5CAtE62VVTPdRWuwL5ih24E8JUH4kAmi26ham1InicC6Rca3ytwg"
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
function getMyUserRole(){
  $users = json_decode(getUsersInfo());
}
return getUsersInfo();
*/ ?>
<?php
require 'PostForToken.php';

function getRolesInfo(){
 $responseTokenFromPost = postForToken();
 $decodedJsonToken = json_decode($responseTokenFromPost);
 $token = $decodedJsonToken->{'access_token'};
 //$header = array_push("authorization: Bearer ", $token);
 /*foreach($decodedJsonToken->{'access_token'} as $theToken)
 {
    $token [] = $theToken;
 }*/

 $curl = curl_init();

 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://dev-fctx2bhe.us8.webtask.io/adf6e2f2b84784b57522e3b19dfc9201/api/roles",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array ("authorization: Bearer ".$token),
   /*CURLOPT_HTTPHEADER => array(
     "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik9UaEROelZFUmprNU5ETTBOakUxT1RZeE5rVkZOVEEzUlVWQ01rSXpOa1pCTVVKRk1UazFOZyJ9.eyJpc3MiOiJodHRwczovL2Rldi1mY3R4MmJoZS5hdXRoMC5jb20vIiwic3ViIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE9AY2xpZW50cyIsImF1ZCI6InVybjphdXRoMC1hdXRoei1hcGkiLCJpYXQiOjE1NjE2ODMyNzgsImV4cCI6MTU2MTc2OTY3OCwiYXpwIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE8iLCJzY29wZSI6InJlYWQ6dXNlcnMgcmVhZDphcHBsaWNhdGlvbnMgcmVhZDpjb25uZWN0aW9ucyByZWFkOmNvbmZpZ3VyYXRpb24gdXBkYXRlOmNvbmZpZ3VyYXRpb24gcmVhZDpncm91cHMgY3JlYXRlOmdyb3VwcyB1cGRhdGU6Z3JvdXBzIGRlbGV0ZTpncm91cHMgcmVhZDpyb2xlcyBjcmVhdGU6cm9sZXMgdXBkYXRlOnJvbGVzIGRlbGV0ZTpyb2xlcyByZWFkOnBlcm1pc3Npb25zIGNyZWF0ZTpwZXJtaXNzaW9ucyB1cGRhdGU6cGVybWlzc2lvbnMgZGVsZXRlOnBlcm1pc3Npb25zIHJlYWQ6cmVzb3VyY2Utc2VydmVyIGNyZWF0ZTpyZXNvdXJjZS1zZXJ2ZXIgdXBkYXRlOnJlc291cmNlLXNlcnZlciBkZWxldGU6cmVzb3VyY2Utc2VydmVyIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.LRHWkzxFkivjgnA0k8tN7RwkiX_IsPJdSrXKGnrFYrU2JDubwQMElhKn6wUf9IUksDCr5GZJR2hSg84fSr4jKO5xDg0WSffn_ggB61hF-dwx5ui2dP4qNS_QkL2YRBJIoWKiiiptQlMOHrhKo3oMkYrpgMUnUbQzxpPAr2tCKbdUXtOG6LZV9g9wf_G6ijcuxNrNwgL_FgAl25jiEDikUo0dostdlk43lNyYwTLkkC_g1Qgg0f2UsIDHsfcbX_W7FYRz4A-7hJLBamo-BVt3R0xqmtxnj1AeGj9o-qHjbB7c2QQtLYWDYvENgwr_cWGioy5jPq1WtUS-vF2okETl-Q"
   ),*/
 ));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);

 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   //echo $responseTokenFromPost;
   return $response;
 }
}

function getUserRoles($response, $userID)
{
    $roles = [];
    $data =json_decode($response);
    //print_r($data);
    foreach($data->roles as $role)
    {
        foreach($role->users as $roleuser)
        {
            if($roleuser == $userID)
                $roles [] = $role->name;
        }
    }
    return $roles;
}

function getMyUserRole(){
 $users = json_decode(getUsersInfo());
}

/*function getUserRoles($userID)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
    //CURLOPT_URL => "https://dev-fctx2bhe.us8.webtask.io/".$userID."/api/roles",
    CURLOPT_URL => "https://dev-fctx2bhe.us8.webtask.io/api/users/".$userID."/roles",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
     "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik9UaEROelZFUmprNU5ETTBOakUxT1RZeE5rVkZOVEEzUlVWQ01rSXpOa1pCTVVKRk1UazFOZyJ9.eyJpc3MiOiJodHRwczovL2Rldi1mY3R4MmJoZS5hdXRoMC5jb20vIiwic3ViIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE9AY2xpZW50cyIsImF1ZCI6InVybjphdXRoMC1hdXRoei1hcGkiLCJpYXQiOjE1NjE1ODkyNzYsImV4cCI6MTU2MTY3NTY3NiwiYXpwIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE8iLCJzY29wZSI6InJlYWQ6dXNlcnMgcmVhZDphcHBsaWNhdGlvbnMgcmVhZDpjb25uZWN0aW9ucyByZWFkOmNvbmZpZ3VyYXRpb24gdXBkYXRlOmNvbmZpZ3VyYXRpb24gcmVhZDpncm91cHMgY3JlYXRlOmdyb3VwcyB1cGRhdGU6Z3JvdXBzIGRlbGV0ZTpncm91cHMgcmVhZDpyb2xlcyBjcmVhdGU6cm9sZXMgdXBkYXRlOnJvbGVzIGRlbGV0ZTpyb2xlcyByZWFkOnBlcm1pc3Npb25zIGNyZWF0ZTpwZXJtaXNzaW9ucyB1cGRhdGU6cGVybWlzc2lvbnMgZGVsZXRlOnBlcm1pc3Npb25zIHJlYWQ6cmVzb3VyY2Utc2VydmVyIGNyZWF0ZTpyZXNvdXJjZS1zZXJ2ZXIgdXBkYXRlOnJlc291cmNlLXNlcnZlciBkZWxldGU6cmVzb3VyY2Utc2VydmVyIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.3vNiZF2jNGANEMNU1ouJrgEhYlf4fSv0INcMDfFrN5cEP6kLyoU1JsljKBj8IeiaeTRNP6MRpyql8rbXB3jRiOyjA-RUXvdVMfMNOTXr5MNZIjjyEHwMGVfLivne9-6ogntP3-NUOj9oh8SAt2LZ6caLaiJ8htP4StrgwzkSg4Bp4vbRDOXyXvfJ0oAMETmA4mdUJgFnVI5vs2a8UHZ5wUmdUE4nz_KSKb2Uq6hp9SgN1RpMgoED5iie0-FUnUmhQR-siKTt8BCRS0wiP831KafTU7crbgHi5D5CAtE62VVTPdRWuwL5ih24E8JUH4kAmi26ham1InicC6Rca3ytwg"
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
}*/
function getMyRole()
{
    $myUser = getUserInfo(/*my user id*/);
    return $myUser['role'];//Hopefully close to the key
}
?>
