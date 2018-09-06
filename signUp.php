<?php
  session_start();
require_once('users.php');
$user = new User();
if (isset($_POST['UsrFname'])&&isset($_POST['UsrLname'])&&isset($_POST['UsrEmail'])&&isset($_POST['UsrPass'])) {
	
$email =$_POST['UsrEmail'];
$pass =$_POST['UsrPass'];
$fname =$_POST['UsrFname'];
$lname = $_POST['UsrLname'];
$user = new User();
$user->__set("_email", $email);
$user->__set("_pass", $pass);
$user->__set("_fname", $fname);
$user->__set("_lname", $lname);
$regUsrCount = $user->UsrReg($user); 
if ($regUsrCount!=0) 
{
	$done = true ;

$_SESSION['userID']=$regUsrCount;
}
else
{
$done = false;
}
echo $done;
}


?>