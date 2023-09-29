<?php 
use App\Auth\Register;

require "vendor/autoload.php";


printf("1. Login\n2. Register\n");

$input = readLine("What do you want? : ");

if($input==1){
    
}else if($input==2){

    $name = readline("Enter Your name : ");
    $email = readline("Enter Your Email : ");
    $password = readline("Set your Password : ");

    $register = new Register($name, $email, $password);
    $register->save();

    printf("Customer Register Successfully");
    exit(1);

}else{
    printf("Wrong Number you entered");
}