<?php

namespace App;

use Auth0\SDK\JWTVerifier;

use Auth0\SDK\Helpers\Cache\FileSystemCacheHandler;

class Main {

  protected $token;
  protected $tokenInfo;

  public function setCurrentToken($token) {

    try {
      $verifier = new JWTVerifier([
        'supported_algs' => ['RS256'],
        'valid_audiences' => ['http://' . getenv('AUTH0_AUDIENCE')],
        'authorized_iss' => ['https://' . getenv('AUTH0_DOMAIN') . '/'],
        'cache' => new FileSystemCacheHandler()
      ]);

      $this->token = $token;
      $this->tokenInfo = $verifier->verifyAndDecode($token);
      //print($token);
    }
    catch(\Auth0\SDK\Exception\CoreException $e) {
      throw $e;
    }
  }

  public function checkScope($scope){
    if ($this->tokenInfo){
      $scopes = explode(" ", $this->tokenInfo->scope);
      foreach ($scopes as $s){
        //print($s);
        if ($s === $scope)
          return true;
      }
    }

    return false;
  }

  public function checkPermissions(){
    //print($this->tokenInfo);
    //$userPermissions = [];
    if (!empty($this->tokenInfo->permissions)){
      $permissions = implode(" ", $this->tokenInfo->permissions);
      //print($permissions);
      /*foreach ($permissions as $pfu){
        //print($p).'</br>';
        $userPermissions [] = $pfu;
        //if ($p === $permission)
        //  return true;
      }
      //print($userPermissions);
      //return $userPermissions;*/
      return $permissions;
    }
    else {
      return false;
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

  public function publicEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello from a public endpoint! You don't need to be authenticated to see this."
    );
  }

  public function privateEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello from a private endpoint! You need to be authenticated to see this."
    );
  }

  public function privateScopedEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello from a private endpoint! You need to be authenticated and a scope of read:messages to see this."
    );
  }

  public function readmainpageEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello, you've been granted read main page access via Auth0's RBAC."
    );
  }

  public function editmainpageEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hello, you've been granted EDIT main page access via Auth0's RBAC."
    );
  }

  public function bzapproleEndpoint() {
    return array(
      "status" => "ok",
      "message" => "Hi you are accessing the Bank Zero API end point to view Roles"
    );
  }
}
