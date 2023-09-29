<?php 

namespace App\Auth;
use App\Auth\Login;
use App\Auth\Register;

class Auth{

    public function login(){
        $email = readline("Enter your email: ");
        $password = readline("Enter your password: ");
    
        $login = new Login($email, $password);
    
        if ($login->authenticate()) {
            printf("Login successful!\n");
        } 
    }

    public function register(){
        $name = readline("Enter Your name : ");
        $email = readline("Enter Your Email : ");
        $password = readline("Set your Password : ");
    
        $register = new Register($name, $email, $password);
        $register->save();
    
        printf("Customer Registered Successfully");
        exit(1);
    }
}