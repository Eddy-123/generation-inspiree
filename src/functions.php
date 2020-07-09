<?php

function debug($variable){
    echo "<pre>".print_r($variable, true)."</pre>";
}

function str_random($length){
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}