<?php 

namespace App\Auth;

class Login{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function login(){

        
    }
}

