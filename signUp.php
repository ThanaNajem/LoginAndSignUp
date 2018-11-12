<?php
session_start();
require_once('users.php');
$user = new User();
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
    
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user  = new User();
    $user->__set("_email", $email);
    $user->__set("_pass", $pass);
    $user->__set("_fname", $fname);
    $user->__set("_lname", $lname);
    $regUsrCount = $user->UsrRegistration($user);
    $done        = "";
    if ($regUsrCount != 0) {
        $done = true;
        
        $_SESSION['userID'] = $regUsrCount;
    } else {
        $done = false;
    }
    echo $done;
}


?>