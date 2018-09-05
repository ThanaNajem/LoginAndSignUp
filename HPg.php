<?php
session_start();
if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    header('Location: login.php');
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
        <span style="display:inline-block; margin-right:5px;">Hello login user in homepage</span><a href="logout.php">Logout</a>
    </strong>
</center>

</p>
</body>
</html>
 