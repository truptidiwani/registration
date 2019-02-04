<?php
use  App\registration\dbConnect;
use  App\registration\user;
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   session_start();  
   require 'vendor/autoload.php';
   if(isset($_GET['u_id'])){
    $obj = new user();

    $result = $obj->delete($_GET['u_id']);
    if($result){
        header("location: display.php");
    }
}
   
   

?> 
