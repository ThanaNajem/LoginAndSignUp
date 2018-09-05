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

public function UsrReg($User)
{
  global $conn;
try {
  $email=$User->__get("_email");
  $pass=sha1($User->__get("_pass"));
  $fname=$User->__get("_fname");
  $lname=$User->__get("_lname");

  $lastInsertId = 0;
  $regQuery = 
"INSERT INTO
`users`
SET 
`email`=:email,
`pass`=:pass,
`fname`=:fname, 
`lname`=:lname;";
$regStmt = $conn->prepare($regQuery);
$regStmt->bindParam(':email',$email,PDO::PARAM_STR);
$regStmt->bindParam(':pass',$pass,PDO::PARAM_STR);
$regStmt->bindParam(':fname',$fname,PDO::PARAM_STR);
$regStmt->bindParam(':lname',$lname,PDO::PARAM_STR);
$regStmt->execute();
$lastInsertId = $conn->lastInsertId();
  
return $lastInsertId;
} catch (PDOException $e) {
  echo $e->getMessage();
}
}

}
?>