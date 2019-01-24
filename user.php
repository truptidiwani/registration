<?php

class User{
    public $uname;
    public $pass;
    public $email;
    
    public function chk_user($uname,$pass,$conn)
    {
            
        $sql="select * from user where uname='$uname' and pass='$pass'";
        $result= mysqli_query($conn,$sql);

        if($result->num_rows>0)
        {
            header('location: welcome.php');
         }
          else
        {
            return false;
         }
        
    }

    public function insert($uname,$email,$pass,$conn)
        {
            // $pass=md5($pass);
            $sql="insert into user(uname,email,pass) values('$uname','$email','$pass')";
            $result=mysqli_query($conn,$sql);
            print_r($result);
            // if($conn->query($sql)==TRUE)
            // { 
            //     return true;
            // }   
            // else{
            //     return false;
            // }
        }

    }
?>