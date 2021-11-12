<?php 

namespace App\Services;

use Exception;

class UserService {

    public static function storeContacts($contacts)
    {
        try {
            return
            auth()->user()->contact()->create($contacts);

            return auth()->user()->contact;

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }





}