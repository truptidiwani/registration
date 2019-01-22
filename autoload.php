<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new class1();
$obj2 = new class2(); 
?>