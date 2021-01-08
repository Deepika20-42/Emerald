<html>
<head>
<title>HOME PAGE</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7"> <div id="main-wrapper">
<center> <h2>Welcome <?php echo $_SESSION['username'] ?></h2></center>
<form class="myform" action="homepage.php" method="post">
<a href="page1.php"><input type="button" id="apply_online" value="Apply Online"/><br>
<a href="finish.php"><input type="button" id="view" value="View Details"/><br>
<input name="logout" type="submit" id="logout_btn" value="LogOut"/><br>
</form>
<?php
if(isset($_POST['logout'])){
session_destroy();
header('location:index.php'); }
?>
</div> </body> </html>