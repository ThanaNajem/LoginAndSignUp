<?php
   session_start();
   if (isset($_SESSION['userID'])
   &&
   !empty($_SESSION['userID'])) {
      var_dump($_SESSION['userID']);
        header('Location: HPg.php');
   }
   ?>
<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta charset="UTF-8">
      <title></title>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="handler col-xs-12 col-sm-9 col-md-6 ">
         <form method="post"   id="signUpForm">
            <div class="signUp">
               <h3>Sign Up</h3>
               <p>First Name</p>
               <div class="fname">
                  <input type="text"  class="form-control" id="fname" name="fname"  > 
               </div>
               <p>Last Name</p>
               <div class="lname">
                  <input type="text"  class="form-control" id="lname" name="lname" > 
               </div>
               <p>Email</p>
               <div class="email">
                  <input type="text"  class="form-control" id="email" name="email" >
               </div>
               <p>Password</p>
               <div class="pass">
                  <input type="password"  class="form-control" id="password" name="password" >
               </div>
               <button id="sign_up">Sign up</button>
               <span>Do you have an account! <a href="index.php" >Login</a></span>
               <div id="registrationStatus">
               </div>
            </div>
         </form>
      </div>
      <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script  type="text/javascript" src="js/validateAtSignUpAndValidateUser.js"></script>  
   </body>
</html>