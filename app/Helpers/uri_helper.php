<?php

if (!function_exists('encrypt_url')) {
    function encrypt_url($string) {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'YASIN';
        $secret_iv = 'YASIN@WEB';

        // Hash key and IV
        $key = hash('sha256', $secret_key);
        $iv  = substr(hash('sha256', $secret_iv), 0, 16);

        // Encrypt and encode
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        return base64_encode($output);
    }
}

if (!function_exists('decrypt_url')) {
    function decrypt_url($string) {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'YASIN';
        $secret_iv = 'YASIN@WEB';

        $key = hash('sha256', $secret_key);
        $iv  = substr(hash('sha256', $secret_iv), 0, 16);

        return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
}

//  Fixed version of createSlug()
if (!function_exists('createSlug')) {
    function createSlug($string) {
        $string = trim($string);
        $string = html_entity_decode($string);
        $string = strip_tags($string);
        $string = strtolower($string);
        
        // Replace anything that's not a-z, 0-9, underscore, period, or space with space
        $string = preg_replace('~[^a-z0-9_. ]~', ' ', $string);

        // Replace one or more spaces with a single dash
        $string = preg_replace('~\s+~', '-', $string);

        // Remove multiple dashes
        $string = preg_replace('~-+~', '-', $string);

        // Trim dashes from start/end
        $string = trim($string, '-');

        return $string;
    }
}
