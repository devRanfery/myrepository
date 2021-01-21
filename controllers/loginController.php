<?php
require_once('../models/loginModel.php');


class loginController extends loginModel{

    public function Login($username, $passwrd){
        $resultado = new loginModel();
       return $resultado->Login($username, $passwrd);
    }

    public function LoginDocente($noDocente, $passwrd){
        $result = new loginModel();
       return $result->LoginDocente($noDocente, $passwrd);
    }
}
