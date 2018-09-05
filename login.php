<?php
session_start();
// if (isset($_SESSSION['userID'])
// &&
// !empty($_SESSSION['userID'])) {
// 	  header('Location: HPg.php');
// }
require_once('users.php');
if (
	isset( $_POST['usrName'] )
	&& 
	isset( $_POST['userPass']) 
	) 

{

  $_userId=0;
  $_email=$_POST['usrName'];
  $_pass=sha1($_POST['userPass']);
  $_fname="";
  $_lname="";
$user = new User();
$user->__set("_email", $_email);
$user->__set("_pass", $_pass); 
$LoginUserObject = $user->validateLogin($user);
   
$d=false;
if ($LoginUserObject!=null) 
{
	//this is system's user
$_SESSSION['userID']=$LoginUserObject[0]['id'];
$_SESSSION['UsrName']=$LoginUserObject[0]['fname'].' '.$LoginUserObject[0]['lname']; 
 $d=true;
	
 	 // header("Location: HPg.php");
}
 else
 {
 $d=false;
 	 // header("Location: index.php");
 }
 echo $d;
}

?>