<?php
function getInfo(){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:3100/api/private-scoped/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik9UaEROelZFUmprNU5ETTBOakUxT1RZeE5rVkZOVEEzUlVWQ01rSXpOa1pCTVVKRk1UazFOZyJ9.eyJpc3MiOiJodHRwczovL2Rldi1mY3R4MmJoZS5hdXRoMC5jb20vIiwic3ViIjoieU9uNzNEUlhBUjhkdHZWcDlVMXpvTTZEam83VEQ1VE9AY2xpZW50cyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6MzEwMCIsImlhdCI6MTU2MTY1NzYxMiwiZXhwIjoxNTYxNzQ0MDEyLCJhenAiOiJ5T243M0RSWEFSOGR0dlZwOVUxem9NNkRqbzdURDVUTyIsInNjb3BlIjoicmVhZDptYWlucGFnZSBlZGl0Om1haW5wYWdlIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.Ce-g13anIQsUxvdq5h9m6hOadwIEM2dZtToCjnYjVl9RVB8jwB260UnFd1LkDetHDe1jJSqGHmFLro5gjzPV3imSV6sByJ9WvVuO0OIoehYfwbdK_6UNvUKE655Qqbz5lyBTAt_TUqFDbV36HeH9tAphEuEKVPQXL8Q0buFjgf9Bci0FRWHDXCuNdVBUs6hQt-iCzTLjnMO42eaJ8tX2tzLdhd2DFsfzp6EPHNf8rG5Usu8vnwYGYyRvxRmDBjZUTNSUygBLtQfaARxWifX2fFvr3JhaLMKOud-loA8S4Zlvux-YPaIACY6l1PeR0oNCk2WpjkgrYrkyC4pbWkNc7g"
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
