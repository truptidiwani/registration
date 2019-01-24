<?php
    session_start();
    if(isset($_SESSION['uname']))
    {
      echo "You are already logged in ...";
    }
    else{
?>

<!DOCTYPE html>  
 <html lang="en" class="no-js">  
 <head>  
        <meta charset="UTF-8" />  
        <title> Registration Form </title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    </head>  
    <body>
         <form  method="post" action="">  
                     <h1> Sign up </h1>   
                    <input id="uname" name="uname" required="required" type="text" placeholder="Enter name" />    
                    <input id="email" name="email" required="required" type="email" placeholder="xyz@mail.com"/>    
                    <input id="pass" name="pass" required="required" type="password" placeholder="eg. X8df!90EO"/>    
                    <input type="submit" name="register" value="Sign up"/>                 
        </form>                   
    </body>  
</html>  
<?php 
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include "user.php";
        include "dbConnect.php";

        $obj=new dbConnect();
        $get=$obj->connect();
      
        
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $uname=$_POST['uname'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $obj1=new User();
            $obj1->insert($uname,$email,$pass,$get);
            if(!$obj1)
                {
                echo"not Inserted";
                }
            else
                {
                    echo"Inserted";
                }
            }
        }

?>