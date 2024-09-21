<?php
namespace Models;

use Database\DB;

class User{
    public ?int $id;

    public ?string $login;

    public ?string $password;

    public ?string $token;

    public static function getAllUsers(): array{
        
        return DB::getInstance()
        ->getRowByClass(
            'SELECT * FROM users;', 
            self::class
        );
    }

    public static function getUserByLogin($login): mixed
    {
        
        $request = "SELECT * FROM users where login ='$login'";
        
        $user = DB::getInstance()->getOneRowByClass($request, self::class); 

        return $user;
    }

    public static function updateUser(string $login, string $token)
    {
        $request = "UPDATE users SET token = '$token' WHERE login = '$login';";

        DB::getInstance()->query($request);
    }
}