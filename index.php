<?php

  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  require __DIR__ . '/dotenv-loader.php';

  // Require the responses from both GET files
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
    'scope' => 'openid profile',
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
    <body class="home">
        <div class="container">
            <div class="login-page clearfix">
              <?php if(!$userInfo): ?>
              <div class="login-box auth0-box before">
                <!-- Displays Auth0 and Bank0 icons side by side -->
                <img src="https://i.cloudup.com/StzWWrY34s.png" />
                <img src="/Universal Login/icons8-bank-building-96.png" style="width:180px;height:180px;" />
                <h3></h3>
                <p><b>Auth0 Proof of Concept for BankZero</b></p>
                <!-- Login Button -->
                <a id="qsLoginBtn" class="btn btn-primary btn-lg btn-login btn-block" href="login.php">Sign In</a>
              </div>
              <?php else: ?>
              <div class="logged-in-box auth0-box logged-in">
                <!-- Provides Bank Zero's icon -->
                <h1 id="logo"><img src="/Universal Login/icons8-bank-building-96.png" style="width:128px;height:128px;" />
                <br>
                <font size="20"><b>Bank Zero</b></font></h1>

                <!-- Name pulled from getuser access token -->
                <h3>Welcome: <?php echo $userInfo['name'];
                ?><br><br></h3>

                <!-- Creates a table that displays both styles of RBAC.  Demonstrates the results of each type. -->
                <table align="center">
                  <tr>
                    <th>Role Based Access Control Method</th>
                    <th>User Assigned Roles</th>
                  </tr>
                  <tr>
                    <td>Authorization Extension</td>
                    <td><?php
                      $subStr = $userInfo['sub'];
                      $userRolesResponse = apiUserRole($subStr);
                      responseRoleNames($userRolesResponse);
                    ?></td>
                  </tr>
                  <tr>
                    <td>NEW RBAC Core</td>
                    <td><?php
                      print_r(bzApiUserPermissions($userToken));
                    ?></td>
                  </tr>
                </table>

                <!-- Edit box.  Shows an edit box that can be edited for the Manager and a Read Only box for the Employee -->
                <h3><br>
                <form>
                <?php
                if(bzApiUserPermissions($userToken) == 'BZ Manager'){ ?>
                  <input type="text" name="Manager" value="edit me"><br>
                <?php
                }
                if(bzApiUserPermissions($userToken) == 'BZ Employee'){ ?>
                  <input type="text" name="Employee" value="can't edit me" readonly><br>
                <?php
                } ?>
                </form>
                <br><br></h3>

                <!-- Logout Button -->
                <a id="qsLogoutBtn" class="btn btn-warning btn-logout" href="/logout.php">Logout</a>
              </div>
              <?php endif ?>
            </div>
        </div>
    </body>
</html>
