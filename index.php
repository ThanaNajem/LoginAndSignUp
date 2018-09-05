<?php
session_start();
if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    var_dump($_SESSION['userID']);
    header('Location: HPg.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="handler col-xs-12 col-sm-9 col-md-6 ">
    <form method="post" action="#">
        <div class="sign ">
            <h3>Sign Up</h3>
            <p>First Name</p>
            <div class="fname">
                <input type="text" class="form-control" id="fname">
                <pre class="warning">first name shoud contain at least one character</pre>
            </div>
            <p>Last Name</p>
            <div class="lname">
                <input type="text" class="form-control" id="lname">
                <pre class="warning">last name shoud contain at least one character</pre>
            </div>
            <p>Email</p>
            <div class="email">
                <input type="text" class="form-control" id="email">
                <pre class="warning">email is incorrect format</pre>
            </div>
            <p>Password</p>
            <div class="pass">
                <input type="password" class="form-control" id="password">
                <pre class="warning">minimum 8 characters
length with at least 
1 special char 
2 digits
one capital letter</pre>

            </div>
            <button id="sign_up">Sign up</button>
            <span>Do you have an account! <a href="#" data=".log" data-parent=".sign">Login</a></span>

            <div class="success">

            </div>
        </div>
    </form>
    <form method="post" action="#">
        <div class="log d-none">
            <h3>login</h3>
            <p>Email</p>
            <input type="text" id="usrNameOrEmail" class="form-control">
            <p>Password</p>
            <input type="password" id="pass" class="form-control">
            <button id="login">login</button>
            <span>Don't have an account! <a href="#" data=".sign" data-parent=".log">Sign Up Here</a></span>
            <pre class="warning">Incorrect username or password</pre>
        </div>
    </form>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>