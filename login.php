<!DOCTYPE html>  
 <html lang="en" class="no-js">  
 <head>  
        <meta charset="UTF-8" />  
        <title>Login </title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    </head>  
    <body>
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">  
                <h1> Login</h1>   
                 <input id="uname" name="uname" required="required" type="text" placeholder="Enter name" />
                 <input id="pass" name="pass" required="required" type="password" placeholder="eg. X8df!90EO"/>              
                 <button type="submit">Login</button>
                <a href="register.php" >Sign Up</a>     
         </form>                  
    </body>  
</html>  
    <?php 
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();        

        include "user.php";
        include "dbConnect.php";
        $obj=new dbConnect();
        $get=$obj->connect();
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $uname=$_POST['uname'];
            $pass=$_POST['pass'];
            // print_r($get);
            $obj1=new User();
            $get=$obj1->chk_user($uname,$pass,$get);
             $result= $obj1->chk_user( $_POST['uname'], $_POST['pass']);
        if($result==1)
            {
                $_SESSION["uname"]= $_POST['uname'];
                $_SESSION["pass"]= $_POST['pass'];
                header('Location: ./welcome.php');
            }
        else
            {
                echo"Invalid User";
            }
                
        }
    ?>
























