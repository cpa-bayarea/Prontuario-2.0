<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends AbstractController
{

    public function searchUsername($username)
    {
        $user = User::where('username', $username)->first();
        if (empty($user)) {
            $return = [
              "type" => "success",
              "msg"  => "Nenhuma informação"
            ];
        } else {
            $return = [
                "type" => "error",
                "msg"  => "Número de matrícula em uso!"
            ];
        }

        return $return;
    }

    public function searchEmail($email)
    {
        $user = User::where('email', $email)->first();
        if (empty($user)) {
            $return = [
              "type" => "success",
              "msg"  => "Nenhuma informação"
            ];
        } else {
            $return = [
                "type" => "error",
                "msg"  => "E-mail em uso!"
            ];
        }

        return $return;
    }
}
