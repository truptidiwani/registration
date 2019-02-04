<?php
use  App\registration\dbConnect;
use  App\registration\user;
//include "dbConnect.php";

   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   session_start();  
   require 'vendor/autoload.php';
   $obj=new dbConnect();
   $get=$obj->connect();
   $sql="select * from user";
   $query=mysqli_query($get,$sql);
   echo "<table border='1'>
   <tr>
   <th>User Id</th>
   <th>User Name</th>
   <th>Email</th>
   <th>Password</th>
   <th>Role</th>
   <th>Active</th>
   <th>Edit</th>
   <th>Delete</th>
   </tr>";
   while ($rows = mysqli_fetch_array($query))
   {
     
        echo "<tr>";
        echo "<td>" . $rows['uid'] . "</td>";
        echo "<td>" . $rows['uname'] . "</td>";
        echo "<td>" . $rows['email'] . "</td>";
        echo "<td>" . $rows['pass'] . "</td>";
        echo "<td>" . $rows['roles'] . "</td>";
        echo "<td>" . $rows['active'] . "</td>";
        echo '<td><a href="edit.php?u_id=' . $rows['uid']. '">Edit</a></td>';//creating the link to edit each and every user
        echo '<td><a href="delete.php?u_id=' . $rows['uid']. '">Delete</a></td>';
        echo "</tr>";

     
   }
   echo "</table>";
?> 
