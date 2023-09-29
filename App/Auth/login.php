<?php

namespace App\Auth;

class Login {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function loadCustomerData() {
        $jsonDB = './data/customer.json';
    
        if (file_exists($jsonDB)) {
            $data = file_get_contents($jsonDB);
            $decodedData = json_decode($data, true);
    
            if ($decodedData === null) {
                echo json_last_error_msg();
            }
    
            return $decodedData;
        }
    
        return false;
    }
    
    public function authenticate() {
        $customerData = $this->loadCustomerData();
    
        if ($customerData === false) {
            // JSON database file doesn't exist
            echo "Error: Database file not found.";
            return false;
        }
    
        if (isset($customerData[$this->email])) {
            $password_hash = $customerData[$this->email]['password'];
    
            if (password_verify($this->password, $password_hash)) {
                return true;
            } else {
                // Password doesn't match
                echo "Error: Incorrect password.";
            }
        } else {
            // Email not found in the database
            echo "Error: Email not found.";
        }
    
        return false;
    }
    
}
