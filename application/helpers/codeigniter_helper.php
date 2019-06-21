<?php

if (!function_exists('clear_cache')) {

    function clear_cache() {
        $CI = & get_instance();
        $CI->output->set_header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
        $CI->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
        $CI->output->set_header("Cache-Control: no-cache, no-store, must-revalidate");
        $CI->output->set_header("Pragma: no-cache");
    }

}

/**
 * check User authentication
 */
if (!function_exists('user_login_in')) {

    function user_login_in() {
        $CI = & get_instance();
        $user_info = $CI->session->userdata('logged_in');
        if ($user_info['id'] !== '')
            return TRUE;
        else
            return FALSE;
    }

}

/**
 * 	Gives Base Url.
 */
if (!function_exists('baseUrl')) {

    function baseUrl() {
        $finalurl = base_url() . INDEXPHP;
        return $finalurl;
    }

}

/**
 * 	Gives Base Url.
 */
if (!function_exists('baseUrl_index')) {

    function baseUrl_index() {
        $finalurl = base_url() . INDEXPHP_INDEX;
        return $finalurl;
    }

}

/**
 * alert
 */
if (!function_exists('alert')) {

    function alert() {
        $CI = & get_instance();
        if ($CI->session->flashdata('success_msg')) {
            echo $CI->session->flashdata('success_msg');
        }
        if ($CI->session->flashdata('error_msg')) {
            echo $CI->session->flashdata('error_msg');
        }
        if ($CI->session->flashdata('info_msg')) {
            echo $CI->session->flashdata('info_msg');
        }
    }

}

/**
 * check User Info
 */
if (!function_exists('user_info')) {

    function user_info() {
        $CI = & get_instance();
        $user_info = $CI->session->userdata('UserInfo');
        if ($user_info['id'] !== '')
            return $user_info;
        else
            return FALSE;
    }

}

/**
 * Encrypt Decrypt the code
 */
function encryptor($action, $string) {

    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'Labels';
    $secret_iv = 'Behlah';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

/**
 * ToolTip
 */
if (!function_exists('tooltip')) {

    function tooltip($side,$title) {
        $var = " data-toggle='tooltip' data-placement=".$side." title='".$title."' ";
        return $var;
    }

}

/**
 * Script for JS not enabled
 */
if (!function_exists('noscript')) {

    function noscript() {
        $var = '<center><noscript style="color: #AE0000;font-size: 20px;text-align: center;font-weight: 700;">
        Enable Javascript on broweser to run MIS Labels</noscript></center>';
        return $var;
    }

}

/**
 * Docnotion
 */
if (!function_exists('Docnotion')) {

    function Docnotion() {
        $year = ( date('m') > 3) ? date('y') + 1 : date('y');
        return $year;
    }

}