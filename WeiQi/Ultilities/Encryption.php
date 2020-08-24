<?php

class Encryption {

    public static function oneWayHash($value) {
        $hashedValue = password_hash($value, PASSWORD_DEFAULT);

        return $hashedValue;
    }

    public static function verify($value, $hashValue) {
        $hash = crypt($value, $hashValue);
               
        if ($hash === $hashValue) {
            echo "correct";
        } else {
            echo "wrong";
        }
        
        return $hash === $hashValue;
    }

}
$b = "123";
$a = Encryption ::oneWayHash($b);

if (Encryption :: verify($b, $a)) {
    echo "password is correct";
} else {
    echo "password not correct";
}

echo Encryption :: verify($b, $a);
