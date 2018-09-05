<?php
session_start();
require_once('users.php');
if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    header('Location: HPg.php');
    exit();
}

if (isset($_POST['usrName']) && isset($_POST['userPass'])) {
    $_userId = 0;
    $_email = $_POST['usrName'];
    $_pass = sha1($_POST['userPass']);
    $_lname = $_fname = "";
    $user = new User();
    $user->__set("_email", $_email);
    $user->__set("_pass", $_pass);
    $LoginUserObject = $user->validateLogin();
    if ($LoginUserObject) {
        //this is system's user
        $_SESSION['userID'] = $LoginUserObject[0]['id'];
        $_SESSION['UsrName'] = $LoginUserObject[0]['fname'] . ' ' . $LoginUserObject[0]['lname'];
        header("Location: HPg.php");
    } else {
        die("wrong credentials");
    }
}