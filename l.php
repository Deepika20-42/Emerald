<?php
session_start();
require 'dbconfig/dbconfig.php';
?>
<html>
<head>
<title>LOGIN PAGE</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:white">
<id="main-wrapper">
<center> <h2>Login Form</h2> </center>
<form class="myform" action="index.php" method="post">
<label><b>Username:</label><br>
<input name="user" type="text" class="inputvalues" placeholder="Type ur username" required/><br>
<label><b>Password:</label><br>
<input name="pass" type="password" class="inputvalues" placeholder="Type ur password" required/><br>
<center><input name="login" type="submit" id="login_btn" value="Login"/><br>
<a href="forgot.php"><input type="button" id="forgot_btn" value="Forgot Password?"/><br></center>
</form>
<?php
if(isset($_POST['login']))
{ $username=$_POST['user'];
$password=$_POST['pass'];
$query="select * from user_info WHERE username='$username' AND password='$password' ";
$query_run= mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0){
$_SESSION['username']=$username;
header('location:homepage.php'); }
else{ echo '<script type="text/javascript"> alert("Invalid Credentials") </script>'; }
}
?>
</body>
</html>