<?php
    session_start();
if( $_SESSION['uname'])
{
            echo "welcome".$_SESSION['uname']."!";
}
?> 

<html>
    <body>
        <form action="logout.php" method="POST">
            <h2>welcome</h2>
            <button>Logout</button><br><br>
        </form>
     </body>
</html>
