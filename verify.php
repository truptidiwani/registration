<?php
    use  App\registration\dbConnect;
    use  App\registration\user;
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   require 'vendor/autoload.php';
   $obj=new dbConnect();
        $get=$obj->connect();
        
   $obj1=new User();
    $result= $obj1->activateuser($_GET['email'],$get);
    echo "user is active";
        



?>