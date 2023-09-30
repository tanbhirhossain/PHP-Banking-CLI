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
                return false;
            }

            return $decodedData;
        }

        return false;
    }

    public function authenticate() {
        $customerData = $this->loadCustomerData();
    
        if ($customerData === false) {
            echo "Error: Database file not found.";
            return false;
        }
    
        $lowercaseEmail = strtolower($this->email);
    
        // Loop through the customer data array to find a matching email
        foreach ($customerData as $customer) {
            if (strtolower($customer['email']) === $lowercaseEmail) {
                $password_hash = $customer['password'];
    
                if (password_verify($this->password, $password_hash)) {
                    return true;
                } else {
                    echo "Error: Incorrect password.";
                    return false;
                }
            }
        }
    
        echo "Error: Email not found.";
        return false;
    }
    
    
}
