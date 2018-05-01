<!DOCTYPE html>
<html>
<head>
<!-- Programmer: Joccelyn Cardenas -->
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="final.css">
</head>
<body>
<?php
session_start ();
?>
<h1>Login</h1>
<br>
<form style="clear:both;" action="controller.php" method="POST">
Username: <input type='text' name='user' id='username' required>
<br>
Password: <input type='password' name='pswd' id='password' required>
<br>
<input type="submit" value="login" >
<?php 
if( isset($_SESSION['loginError']))
    echo   "<p id='toChange'>".$_SESSION['loginError']."</p>";
?>
</form>


</body>
</html>

<?php
?>
