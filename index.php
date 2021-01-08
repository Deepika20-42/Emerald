<?php require 'dbconfig/dbconfig.php'; ?>
<html>
<head>
<title>REGISTER PAGE</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color:white">
<id="main-wrapper"> <center>
<p> <font size="15" color="green"> Welcome to Online Bus Pass Registration </font></p></center>
<form class="myform" action="index.php" method="post">
<label><b>Username:</label><br>
<input name="username" type="text" class="inputvalues" placeholder="Enter username" required/><br>
<label><b>Email:</label><br>
<input name="email" type="text" class="inputvalues" placeholder="Enter Email-Id" required/><br>
<label><b>Password:</label><br>
<input name="pass" type="password" class="inputvalues" placeholder="Enter password" required/><br>
<label><b>Confirm Password:</label><br>
<input name="cpass" type="password" class="inputvalues" placeholder="Re-enter password"required/><br>
<center><h4><input name="submit_btn" type="submit" id="signup_btn" value="SignUp"/>
<br><br>OR<br>
<a href="index.php"><input type="button" id="login_btn" value="Login"/><br><h4></center>
</form>
<?php
if(isset($_POST['submit_btn'])){
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
if($password==$cpassword){
$query="select * from user_info WHERE username='$username'";
$query_run =mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0){
echo '<script type="text/javascript"> alert("User already exists...try another name") </script>'; }
else{
$query="insert into user_info values('$username','$email','$password')";
$query_run =mysqli_query($con,$query);
if($query_run){
echo '<script type="text/javascript"> alert("User Registered") </script>'; }
else{ echo '<script type="text/javascript"> alert("Error") </script>'; } } }
else{ echo '<script type="text/javascript"> alert("Password doesnot match") </script>; } }
?>
</body>
</html>