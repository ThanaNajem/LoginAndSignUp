<?php
require_once('connection.php');
$conn = Connection::connect();
Class User
{

private $_userId =0;
private $_email = "";
private $_pass = "";
private $_fname = "";
private $_lname = "";

//  function __construct($_userId,$_email,$_pass,$_fname,$_lname)
// {

// $this->$_userId=$_userId;
// $this->$_email=$_email;
// $this->$_pass=$_pass;
// $this->$_fname=$_fname;
// $this->$_lname=$_lname;

// }

  public function __get($property) {

    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {

    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }

public function validateLogin($User)
{
global $conn;
$usrEmail = $User->__get("_email");
$usrPass = $User->__get("_pass");
 
$ValLogQuery ="SELECT `id`, `email`, `pass`, `fname`, `lname` FROM `users` WHERE email=:email AND pass=:pass";
$ValLogStmt = $conn->prepare($ValLogQuery);
$ValLogStmt->bindParam(':email',$usrEmail,PDO::PARAM_STR);
$ValLogStmt->bindValue(':pass',$usrPass,PDO::PARAM_STR);
$ValLogStmt->execute(); 
return $ValLogStmt->fetchAll(PDO::FETCH_ASSOC);

}

}
?>