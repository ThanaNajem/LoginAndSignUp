<?php
session_start();
if
(
	isset($_SESSSION['userID'])
&&
	!empty($_SESSSION['userID'])
) {
	  header('Location: HPg.php');
	}
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
 