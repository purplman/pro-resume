<?php

namespace App\Services;

use App\Models\User;

class Auth {

    public static function userExists($email) 
    {
        $user = User::where('email', $email)->first();

        return $user ? true : false;  

    }

}