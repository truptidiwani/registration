<?php
session_start();  
print_r($_SESSION['uname']);
if(isset($_SESSION)){
$user= $_SESSION['uname'];
if($user){
    echo'u are already logged in <a href="logout.php"> logout</a>';
    exit();
}
}
?>
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
        
        require 'vendor/autoload.php';
        $obj=new dbConnect();
        $get=$obj->connect();
        

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $uname=$_POST['uname'];
            $pass=md5($_POST['pass']);
            
            $obj1=new User();
            $result= $obj1->chk_user( $_POST['uname'], $pass,$get);

                if($result){
                    if($result=="admin")
                    {
                        $obj1->SetSessionandCookie($uname, $pass, $_POST["remember"]);
                        
                        header("location: welcome.php?role=".$result);
                    }
                    else
                    {
                        header("location: welcome.php?role=".$result);
                    }
                }
                   
        else
             {
                 echo"Invalid User";
             }
              //session_destroy();          
        }
    ?>
<?php


?>























