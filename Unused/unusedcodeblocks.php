<?php
function setPermissions($response){
  //print_r($response);
  $noQuotes = str_replace('"', "", $response);
  //$permissions = explode(" ", $noQuotes);

  /*if(in_array("edit:mainpage", $permissions)){
    $reply = "BZ Manager";
  }
  if(!in_array("edit:mainpage", $permissions) && in_array("read:mainpage", $permissions)){
    $reply = "BZ Employee";
  }
  if($response == 'false'){
    $reply = "You have no roles assigned to you, please see your administrator.";
  }
  /*else {
    $reply = print_r('you need to code a new permission');
  }*/
  //return $reply;
  return $noQuotes;
}
?>

<?php
//    $permissions = implode(" ", $this->tokenInfo->permissions);
//    return $permissions;
?>


<?php
//'response type' => 'token id_token',
// Scope shows the permissions we'll need in the token
//'scope' => 'openid profile read:mainpage edit:mainpage',
 ?>

<!--<h1 id="logo"><img src="//cdn.auth0.com/samples/auth0_logo_final_blue_RGB.png" /></h1>-->

<!--<img class="avatar" src="<?php //echo $userInfo['picture'] ?>"/>-->

<!--h3 id="choices" class="container">
<button type="button" class="btn btn-primary btn-md" href="authExt.php">Authorization Extension</button>
<button type="button" class="btn btn-primary btn-md" href="rbac.php">RBAC</button>-->

<?php
//error_log($userInfo['user_id'],0);
?>

<?php
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

<?php
  //include('ae-api-access.php');
  //include('GetToken.php');
  //$bzapidata = getInfo();
  //print_r($bzapidata);
?>
