<?php
    session_start();
    use  App\registration\dbConnect;   
if( $_SESSION['uname'])
{
            echo "welcome ".$_SESSION['uname']."! ";
            
}
if($_GET['role']=="admin")
{
?> 

<html>
    <body>
        <form action="logout.php" method="POST">
            <h2 style>Welcome admin:<strong><?php $_SESSION['uname'];?><strong></h2>
            <a href="display.php" >Display Users</a><br><br>
            <a href="add.php" >Add User</a><br><br>
            <a href="update.php" >Update</a><br><br>
            <a href="delete.php">Delete</a><br><br>
            <a href="login.php" >Logout</a><br><br>
        </form>
     </body>
</html>
<?php
}
else{
    echo "Welcome user";
}
?>