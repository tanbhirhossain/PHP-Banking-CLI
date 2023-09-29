<?php 
use App\Auth\Login;
use App\Auth\Register;

require "vendor/autoload.php";


printf("1. Login\n2. Register\n");

$input = readLine("What do you want? : ");

if ($input == 1) {
    $email = readline("Enter your email: ");
    $password = readline("Enter your password: ");

    $login = new Login($email, $password); // Pass email as the first argument

    if ($login->authenticate()) {
        echo "Login successful!\n";
    } 
       


}else if($input==2){

    $name = readline("Enter Your name : ");
    $email = readline("Enter Your Email : ");
    $password = readline("Set your Password : ");

    $register = new Register($name, $email, $password);
    $register->save();

    printf("Customer Registered Successfully");
    exit(1);

}else{
    printf("Wrong Number you entered");
}