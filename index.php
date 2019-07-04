<?php

  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  require __DIR__ . '/dotenv-loader.php';

  require 'SendToAPI.php';
  require 'get-aeapi-response.php';
  require 'get-bzapi-response.php';

  use Auth0\SDK\Auth0;
  use Auth0\SDK\JWTVerifier;
  use Auth0\SDK\Helpers\Cache\FileSystemCacheHandler;


  $domain        = getenv('AUTH0_DOMAIN');
  $client_id     = getenv('AUTH0_CLIENT_ID');
  $client_secret = getenv('AUTH0_CLIENT_SECRET');
  $redirect_uri  = getenv('AUTH0_CALLBACK_URL');
  $audience      = getenv('AUTH0_AUDIENCE');

  if($audience == ''){
    $audience = 'https://' . $domain . '/userinfo';
  }

  $auth0 = new Auth0([
    'domain' => $domain,
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri' => $redirect_uri,
    'audience' => $audience,
    'response type' => 'token id_token',
    'scope' => 'openid profile read:mainpage edit:mainpage',
    'persist_id_token' => true,
    'persist_access_token' => true,
    'persist_refresh_token' => true,
  ]);

  $userInfo = $auth0->getUser();
  $userToken = $auth0->getAccessToken();
  //print_r($userInfo);
  //print_r($userToken);

?>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.1.0.min.js" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- font awesome from BootstrapCDN -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="public/app.css" rel="stylesheet">
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 75%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 7px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
    </head>

    </head>
    <body class="home">
        <div class="container">
            <div class="login-page clearfix">
              <?php if(!$userInfo): ?>
              <div class="login-box auth0-box before">
                <img src="https://i.cloudup.com/StzWWrY34s.png" />
                <img src="/Universal Login/icons8-bank-building-96.png" style="width:180px;height:180px;" />
                <h3></h3>
                <p><b>Auth0 Proof of Concept for BankZero</b></p>
                <a id="qsLoginBtn" class="btn btn-primary btn-lg btn-login btn-block" href="login.php">Sign In</a>
              </div>
              <?php else: ?>
              <div class="logged-in-box auth0-box logged-in">
                <!--<h1 id="logo"><img src="//cdn.auth0.com/samples/auth0_logo_final_blue_RGB.png" /></h1>-->
                <h1 id="logo"><img src="/Universal Login/icons8-bank-building-96.png" style="width:128px;height:128px;" />
                <br>
                <font size="20"><b>Bank Zero</b></font></h1>

                <!--<img class="avatar" src="<?php //echo $userInfo['picture'] ?>"/>-->
                <!--h3 id="choices" class="container">
                <button type="button" class="btn btn-primary btn-md" href="authExt.php">Authorization Extension</button>
                <button type="button" class="btn btn-primary btn-md" href="rbac.php">RBAC</button>-->

                <h3>Welcome: <!--<span class="nickname"> --><?php echo $userInfo['name'];
                //error_log($userInfo['user_id'],0); ?><br><br></h3>

                <table align="center">
                  <tr>
                    <th>Role Based Access Control Method</th>
                    <th>User Assigned Roles</th>
                  </tr>
                  <tr>
                    <td>Authorization Extension</td>
                    <td><?php $subStr = $userInfo['sub'];
                    $userRolesResponse = apiUserRole($subStr);
                    responseRoleNames($userRolesResponse);?></td>
                  </tr>
                  <tr>
                    <td>NEW RBAC Core</td>
                    <td><?php $permissions = bzApiUserPermissions($userToken);
                    setPermissions($permissions);
                    ?></td>
                  </tr>
                </table>

                <h3><br><br><br><?php

                //$subStrLen = strlen($subStr);
                //$sub = substr($subStr, 6, $subStrLen);
                //echo $subStr.'</br>';


                //print_r($userInfo); echo '</br>';
                /*$roles = getUserRoles($sub);
                if (is_array($roles)||is_object($roles)){
                  foreach($roles as $role){
                    print($role['name'].'</br>');
                  }
                }
                $grinfo = getRolesInfo();
                print_r($roles);*/
                //$response = getRolesInfo();
                //$roles = getUserRoles($response, $subStr);
                //print_r('Roles assigned to you in Authorization Extension: ');
                /*foreach($roles as $role){
                  $tmpRole[] = $role;
                }
                if(empty($tmpRole)){
                  print_r('You have no roles assigned to you');
                } else {
                $list = implode(', ', $tmpRole);
                print_r($list);
              }*/



                //print_r($userRolesResponse);

                /*foreach($bzUserRoles['name'] as $bzRole){
                  $tmpBzRole[] = $bzRole;
                }
                if(empty($tmpBzRole)){
                  print_r('You have no roles assigned to you');
                }
                else{
                  $bzRoleList = implode(', ', $tmpBzRole);
                  print_r($bzRoleList);
                }*/
                //echo $userToken.'</br>';
                ?>
                 </span></h3>
                <?php
                  //include('ae-api-access.php');
                  //include('GetToken.php');
                  //$bzapidata = getInfo();
                  //print_r($bzapidata);
                ?>
                <a id="qsLogoutBtn" class="btn btn-warning btn-logout" href="/logout.php">Logout</a>
              </div>
              <?php endif ?>
            </div>
        </div>
    </body>
</html>
