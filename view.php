<?php
session_start();
require 'dbconfig/dbconfig.php'; ?>
<html>
<head>
<title>DETAILS PAGE</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head> <body style="background-color:white"> <id="main-wrapper">
<center> <h2>Confirmed Details</h2> </center>
<form class="myform" action="finish.php" method="post">
<label><b>Username:</label><br>
<input name="user" type="text" class="inputvalues" placeholder="Enter registered username" required/><br>
<label><b>Password:</label><br>
<input name="pass" type="password" class="inputvalues" placeholder="Enter your password" required/>
<table>
<tr>
<th><b>ID<b></th>
<th>FullName</th>
<th>Address</th>
<th>Current Year/std</th>
<th>College/School Name</th>
<th>1.From</th>
<th>To</th>
<th>2.From</th>
<th>To</th> </tr><br>
<center><h3> Make note of the ID and visit nearby BusDepo</h3>
<h4>Pay the amount and get ur pass!!!</h4></center>
<input name="enter" type="submit" id="enter" value="Enter"/><b>
<input name="delete" type="submit" id="delete" value="Delete Details"/>
<a href="index.php"><input name="logout" type="button" id="out" value="LogOut"/><br>
</form>
<?php
if(isset($_POST['enter'])){
$username=$_POST['user'];
$password=$_POST['pass'];
$query="select * from user_details WHERE username='$username' AND password='$password' ";
$query_run =mysqli_query($con,$query);
if($row= mysqli_fetch_array($query_run)){
?><tr>
<td> <?php echo $row['id']; ?> </td>
<td> <?php echo $row['fullname']; ?> </td>
<td> <?php echo $row['address']; ?> </td>
<td> <?php echo $row['yearofstudy']; ?> </td>
<td> <?php echo $row['collname']; ?> </td>
<td> <?php echo $row['from_1']; ?> </td>
<td> <?php echo $row['to_1']; ?> </td>
<td> <?php echo $row['from_2']; ?> </td>
<td> <?php echo $row['to_2']; ?> </td></tr>
<?php }
else{ echo '<script type="text/javascript"> alert("No details to display") </script>'’; }}
if(isset($_POST['delete'])){
$username=$_POST['user'];
$password=$_POST['pass'];
$query="select * from user_details WHERE username='$username' AND password='$password' ";
$query_run =mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0){
$query="DELETE FROM user_details WHERE username='$username' AND password='$password' ";
$query_run =mysqli_query($con,$query);}
else{ echo '<script type="text/javascript"> alert("No record to delete") </script>'; } }
?>
</table></body></html>