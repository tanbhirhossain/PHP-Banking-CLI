<?php 

namespace App\Auth;
use App\Auth\Login;
use App\Auth\Register;
use App\Transaction;

class Auth{

    public function login(){
        $email = readline("Enter your email: ");
        $password = readline("Enter your password: ");
    
        $login = new Login($email, $password);
    
        if ($login->authenticate()) {
            printf("Login successful!\n");
            $transaction = new Transaction($email);
            $this->showTransactionMenu($transaction);
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


    private function showTransactionMenu(Transaction $transaction) {
        printf("Transaction Options:\n");
        printf("1. View Transactions\n");
        printf("2. Deposit Money\n");
        printf("3. Withdraw Money\n");
        printf("4. Transfer Money\n");
        printf("5. Check Balance\n");

        $choice = readline("Enter your choice: ");

        switch ($choice) {
            case 1:
                $transaction->viewTransactions();
                break;
              
            case 2:
                $amount = readline("Enter the amount to deposit: ");
                $transaction->deposit($amount);
                break;
            case 3:
                $amount = readline("Enter the amount to withdraw: ");
                $transaction->withdraw($amount);
                break;
            case 4:
                $recipientEmail = readline("Enter recipient's email: ");
                $amount = readline("Enter the amount to transfer: ");
                $transaction->transfer($recipientEmail, $amount);
                break;
            case 5:
                $balance = $transaction->getCurrentBalance();
                printf("Current Balance: $%.2f\n", $balance);
                break;
            default:
                printf("Invalid choice\n");
        }
    }
}