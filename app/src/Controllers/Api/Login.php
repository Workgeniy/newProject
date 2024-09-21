<?php
namespace Controllers\Api;

use Database\DB;
use Request\Post;
use Models\User;

class Login{
    /**
     * @param Post $request
     * @return string
     */
    public function postRequest(Post $request): string
    {

      //$salt = rand(1000, 9999);

      //$login = $request->post('login');

      //$password = $request->post("password");

      //$hash = md5($salt . '|' . $password);

      //$hash = $salt . '|' . $hash;

      if ($request->has("login") && $request->has("password")){
       
      
     // $allUsers = User::getAllUsers();

     // print_r($allUsers);

     $user = User::getUserByLogin($request->post("login"));
      

      if ($user && 
      $user->login === $request->post("login") && 
      $user->password === $request->post("password"))
      {

        User::updateUser($user->login, md5($user->password));

        return json_encode(["token" => md5($user->password)]);
      }
      else
      {
        return json_encode(["error" => "Not found"]);
      }
        
    }
    return '';
}
}