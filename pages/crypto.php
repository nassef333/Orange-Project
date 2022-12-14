<?php


$hash_key = 'SecretKeyWhichCanBeCustomized';
$hash_method = 'sha256';

$method = 'AES-256-CBC';
$length = openssl_cipher_iv_length($method);
$iv = openssl_random_pseudo_bytes($length);

function encrypt($pltxt,$key){
    global $method;
    global $length;
    global $iv;

    $encrypted = openssl_encrypt(base64_encode($pltxt), $method, hashKey($key), OPENSSL_RAW_DATA, $iv);

    if ($encrypted == true){
        $ctxt = base64_encode($encrypted) . '|' . base64_encode($iv);
        return $ctxt;
    } else {
        return false;
    }
}

function decrypt($ctxt,$key){
    global $method;
     
    list($data, $iv) = explode('|', $ctxt);
    $iv = base64_decode($iv);
    $pltxt = base64_decode(openssl_decrypt($data, $method, hashKey($key), 0, $iv));
    return $pltxt;
}

function hashKey($key){
    global $hash_key;
    global $hash_method;
    return hash_hmac($hash_method, $key, $hash_key);
}
?>