<?php

class Cryptor {

    protected $method = 'aes-128-ctr'; // default cipher method if none supplied
    private $key;

    protected function iv_bytes() {
        return openssl_cipher_iv_length($this->method);
    }

    public function __construct($key = FALSE, $method = FALSE) {
        if (!$key) {
            $key = php_uname(); // default encryption key if none supplied
        }
        if (ctype_print($key)) {
            // convert ASCII keys to binary format
            $this->key = openssl_digest($key, 'SHA256', TRUE);
        } else {
            $this->key = $key;
        }
        if ($method) {
            if (in_array(strtolower($method), openssl_get_cipher_methods())) {
                $this->method = $method;
            } else {
                die(__METHOD__ . ": unrecognised cipher method: {$method}");
            }
        }
    }

    public function encrypt($data) {
        $iv = openssl_random_pseudo_bytes($this->iv_bytes());
        return bin2hex($iv) . openssl_encrypt($data, $this->method, $this->key, 0, $iv);
    }

    // decrypt encrypted string
    public function decrypt($data) {
        $iv_strlen = 2 * $this->iv_bytes();
        if (preg_match("/^(.{" . $iv_strlen . "})(.+)$/", $data, $regs)) {
            list(, $iv, $crypted_string) = $regs;
            if (ctype_xdigit($iv) && strlen($iv) % 2 == 0) {
                return openssl_decrypt($crypted_string, $this->method, $this->key, 0, hex2bin($iv));
            }
        }
        return FALSE; // failed to decrypt
    }

}
//
//$token = "123456";
//
//$encryption_key = 'CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5';
//$cryptor = new Cryptor($encryption_key);
//$crypted_token = $cryptor->encrypt($token);
//
//
//echo $crypted_token;
//
//$cryptor1 = new Cryptor($encryption_key);
//echo "<br/>";
//$token2 = $cryptor1->decrypt($crypted_token);
//
//echo $token2;
//
//$encrytIni = parse_ini_file('encrypt.ini');
//$ini = parse_ini_file('config.ini');
//echo "<br/>";
//echo "<br/>";
//echo $encrytIni['db_encrypt_key'];
//echo "<br/>";
//echo "<br/>";
//echo $ini['db_student_user'];
