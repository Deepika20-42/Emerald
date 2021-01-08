<?php
session_start();
require 'dbconfig/dbconfig.php'; ?>
<html>
<head>
<title>Password change</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:white">
<id="main-wrapper">
<center> <h2>Reset password </h2></center>
<form class="myform" action="forgot.php" method="post">
<label><b>Username:</label><br>
<input name="user" type="text" class="inputvalues" placeholder="Enter username" required/><br>
<label><b>Old Password:</label><br><input name="opass" type="password"
class="inputvalues" placeholder="Enter last remembered password" required/><br>
<label><b>New Password:</label><br>
<input name="npass" type="password" class="inputvalues" placeholder="Enter new password"/><br>
<center><input name="reset" type="submit" id="reset_btn" value="Reset Password"/><br>
<a href="index.php"><input name="login" type="button" id="login_btn" value="Login"/><br></center>
</form>
<?php
if(isset($_POST['reset'])){
$user=$_POST['user'];
$new_password=$_POST['npass'];
$query="select * from user_info WHERE username='$user' ";
$query_run= mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0){
$query_1="UPDATE user_info SET password='$new_password' WHERE username='$user' ";
$query_run_1 =mysqli_query($con,$query_1);
if($query_run_1){
$query_2="UPDATE user_details SET password='$new_password' WHERE username='$user' ";
$query_run_2 =mysqli_query($con,$query_2);
if($query_run_2){
echo '<script type="text/javascript"> alert("Reset password Successful Now Login with new password") </script>'; } }
else{ echo '<script type="text/javascript"> alert("Error!!!") </script>'; } }
else{ echo '<script type="text/javascript"> alert("Invalid Credentials") </script>'; }
}
?>
</div> </body> </html>