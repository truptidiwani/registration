<?php
require 'vendor/autoload.php';
use App\registration\user;
error_reporting(E_ALL); ini_set('display_errors', 1);

session_start();

$user_check = $_SESSION['uname'];
$obj2 = new user();
$check = $obj2->checkifadmin($_SESSION['uname']);
if(!$check){
    echo"u are not authorised to this page";//only admins are allowed to this page
}
//this will return the data of all the users with that particular id
if(isset($_GET['u_id'])){
    $result = $obj2->showUid($_GET['u_id']);
    $row = mysqli_fetch_array($result);
}
else{
    //give empty if there is no id given in the get
    $row['uname']='';
    $row['email']='';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div >
<form  action="<?php echo'edit.php?u_id=' . $row['uid']. '' ?>" method="POST">
        <h2 >Edit</h2>
        <label for="inputName" >Name</label>
        <input type="uname" name="uname"   placeholder="User Name" value="<?php echo $row['uname'] ?>"required >
        <label for="inputEmail" >Email</label>
    
        <input type="email" name="email" placeholder="Email" value="<?php echo $row['email'] ?>" required>
        
        <label for="roles">Role</label>
       
        <select  name="roles">
        <option value="admin">Admin</option>
        <option value="Member">User</option>
        </select>
        
        <select name="active">
        <option value='0'>Inactive</option>
        <option value='1'>Active</option>
        </select>
        <button  type="submit">update</button>
      </form>
</div>
</body>
</html>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {   
        $uid= $row['uid'];
        $uname= $_POST['uname'];
        $email= $_POST['email'];
        $roles = $_POST['roles'];
        $active = $_POST['active'];
        
        $val=$obj2->update($uid, $uname, $email, $roles, $active);
        if($val){
        echo '<h1>Update Successfully!!</h1>';
        }
    }


?>