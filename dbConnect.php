<?php  
include "config.php";
    class dbConnect {  

        public function connect() {  
            
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE);  
            if($conn->connect_error)// testing the connection  
            {  
                echo $conn->connect_error;
            }   
            else{
                return $conn;
            }
        }
       
    }
    
?>  