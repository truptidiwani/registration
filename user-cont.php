<?php
use registration\cont\content;
use registration\user\user;

error_reporting(E_ALL); ini_set('display_errors', 1);
spl_autoload_register(function ($class_name) {
    $a=substr($class_name,13);
    $b= str_replace("\\","/", $a) . '.php';
    print_r($b); exit();
    include($b);
});

$obj  = new content();
$obj2 = new user(); 
?>

