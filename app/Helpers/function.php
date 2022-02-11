<?php
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

/**
 * @param $title
 * @return string
 */
function slug($title) {
    $slug = Str::slug($title, '-');
    return $slug;
}

/**
 * @param $time
 * @return false|string
 */
function timeFormat($time){
    return date_format($time, 'd-m-Y');
}

/**
 * @param $number
 * @return string
 */
function numberFormat($number){
    return number_format($number, 0, ',', '.');
}

/**
 * @param $string
 * @param string $action
 * @return false|string
 */
function encryptDecrypt($string, $action = 'encrypt')
{
//    $encrypt_method = env("CODE_HASH");
    $encrypt_method = "AES-128-ECB";
    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // mã bảo mật
    $secret_iv = '5fgf5HJ5g27'; //key người dùng
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 16, 0); // hàm băm
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv); // băm
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv); // băm ngược
    }
    return $output;
}

function getImage($image, $direction = 'product'){
    $no = 'images/noimage.png';
    $urlImage = 'uploads/'.$direction.'/'.$image;
    if (File::exists(public_path() . $urlImage)) {
        return asset($urlImage);
    }
    return asset($no);
}

function checkAdmin(){
    // 4 nv
    // 5 ad
    if(Auth::check()){
        $level = Auth::user()->level;
        if(in_array($level, [4, 5])){
            return true;
        }
        return false;
    }
    return false;
}
