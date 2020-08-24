<?php

class Encryption {

    public static function oneWayHash($value) {
        $hashedValue = password_hash($value, PASSWORD_DEFAULT);

        return $hashedValue;
    }

    public static function verify($value, $hashValue) {
        $hash = crypt($value, $hashValue);
               
        echo $hash === $hashValue;
        
        return $hash === $hashValue;
    }

}
$b = "123";
$a = Encryption ::oneWayHash($b);

echo Encryption :: verify($b, $a);
