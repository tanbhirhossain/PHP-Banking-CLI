<?php 

namespace App\Auth;

class Login{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    private function loadCustomerData(){
        $jsonDB = 'data/db.json';

        if(file_exists($jsonDB)){
            $data = file_get_contents($jsonDB);
            return json_decode($data, true);
        }

        return false;
        
    }
    public function authenticate(){
        
        $customerData = $this->loadCustomerData();

        if($customerData == false){
            return false;
        }

        if(isset($customerData[$this->email])){
            $password_hash = $customerData[$this->email]['password'];

            if(password_verify($this->password, $password_hash)){
                return true;
            }
        }

        return false;

    }
}

