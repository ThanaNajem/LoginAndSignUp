<?php
session_start();
if
(
	isset($_SESSION['userID'])
&&
	!empty($_SESSION['userID'])
) {
	?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>
	
  <center> 
<strong> 
	<?php 
echo '
<span style="display:inline-block; margin-right:5px;">Hello login user in homepage</span><a href="logout.php">Logout</a>';
	?>
</strong>;
</center>
	
</p>
</body>
</html>
 

	<?php
	}
	else{

echo '
<span style="display:inline-block; margin-right:5px;">Please login </span><a href="index.php">Login</a>';
	}
?>