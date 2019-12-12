<?php
namespace App\Provider;

class HashProvider{

    private $key;

    public function __construct($key){
        $this->key = $key;
    }

    public function generateAPIKey(string $username, string $password): ?string{
        $string = $username.$password.$this->key; 
        $result = hash("sha256", $string); 
        return $result; 
    }
}