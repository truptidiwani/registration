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
                 <input id="uname" name="uname" required="required" type="text" placeholder="Enter name" value="<?php if(isset($_COOKIE['uname'])){echo $_COOKIE['uname'];}?>"/>
                 <input id="pass" name="pass" required="required" type="password" placeholder="eg. X8df!90EO" value="<?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];}?>"/>   
                 <input type="checkbox" name="remember" value="remember"/>Remember me        
                 <button type="submit">Login</button>
                <a href="register.php" >Sign Up</a>     
         </form>                  
    </body>  
</html>  
    <?php 
     use  App\registration\dbConnect;
     use  App\registration\user;


        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();  
        require 'vendor/autoload.php';
      

        //include "user.php";
       //include "dbConnect.php";
        $obj=new dbConnect();
        $get=$obj->connect();
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $uname=$_POST['uname'];
            $pass=md5($_POST['pass']);
            // print_r($get);
            $obj1=new User();
            $result= $obj1->chk_user( $_POST['uname'], $pass,$get);
        if($result==1)
            {
                $_SESSION["uname"]= $_POST['uname'];
                $_SESSION["pass"]= $_POST['pass'];

                if ($_POST["remember"]=='1' || $_POST["remember"]=='on')
                {
                    setcookie ('uname',$_POST['uname']);
                    setcookie ('pass',$_POST['pass']);
                    
                }
                print_r($_COOKIE);

                //header('Location: ./welcome.php');
            }
        else
            {
                echo"Invalid User";
            }
                
        }
    ?>
























