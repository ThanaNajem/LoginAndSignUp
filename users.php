<?php
require_once('connection.php');

Class User
{

    private $_userId = 0;
    private $_email = "";
    private $_pass = "";
    private $_fname = "";
    private $_lname = "";
    private $conn;

    function __construct()
    {
        $this->conn = Connection::connect();
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

    public function validateLogin()
    {
        $usrEmail = $this->_email;
        $usrPass = $this->_pass;
        $ValLogQuery = "SELECT `id`, `email`, `pass`, `fname`, `lname` FROM `users` WHERE email=:email AND pass=:pass";
        $ValLogStmt = $this->conn->prepare($ValLogQuery);
        $ValLogStmt->bindParam(':email', $usrEmail, PDO::PARAM_STR);
        $ValLogStmt->bindValue(':pass', $usrPass, PDO::PARAM_STR);
        $ValLogStmt->execute();
        return $ValLogStmt->fetch(PDO::FETCH_ASSOC);
    }

    public function UsrReg()
    {
        try {
            $email = $this->_email;
            $pass = sha1($this->_pass);
            $fname = $this->_fname;
            $lname = $this->_lname;

            $regQuery = "INSERT INTO `users` SET  `email`=:email, `pass`=:pass, `fname`=:fname,`lname`=:lname;";
            $regStmt = $this->conn->prepare($regQuery);
            $regStmt->bindParam(':email', $email, PDO::PARAM_STR);
            $regStmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $regStmt->bindParam(':fname', $fname, PDO::PARAM_STR);
            $regStmt->bindParam(':lname', $lname, PDO::PARAM_STR);
            $regStmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }

}