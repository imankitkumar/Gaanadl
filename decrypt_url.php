<?php

function decryptUrl($enc_url){

$ciphering = "AES-128-CBC"; 

$iv_length = openssl_cipher_iv_length($ciphering); 

$options = 0;

$decryption_iv = utf8_encode('asd!@#!@#@!12312');

$decryption_key = utf8_encode('g@1n!(f1#r.0$)&%');

$decrypted_url = openssl_decrypt($enc_url, $ciphering,  
        $decryption_key, $options, $decryption_iv);   
      
           return $decrypted_url;    
       
        }


?>
