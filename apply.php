<?php
session_start();
require 'dbconfig/dbconfig.php' ?>
<html>
<head>
<title>Application form</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript">
function PreviewImage(){
var oFReader=new FileReader();
oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
oFReader.onload= function(oFREvent){
document.getElementById("uploadPreview").src=oFREvent.target.result; }; };
</script></head>
<body style="background-color:#bdc3c7">
<form class="myform" action="page1.php" method="post" enctype="multipart/form-data" >
<div id="main-wrapper">
<center>
<h2>Application Form</h2>
<img id="uploadPreview" src="image/front.jpg" class="avatar"/><br>
<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/><br> </center>
<label><b>Username:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Enter your username" required/><br>
<label><b>Fullname*:</b></label><br>
<input name="fullname" type="text" class="inputvalues" placeholder="Enter your fullname" required/><br><br>
<label><b>Gender:</b></label>
<input name="gender" type="radio" class="radiobtns" value="male" checked required>Male
<input name="gender" type="radio" class="radiobtns" value="female" required>Female<br><br>
<label><b>Father's Name:</b></label><br>
<input name="fathername" type="text" class="inputvalues" placeholder="Enter your father's name" required/><br>
<label><b>Address*:</b></label><br>
<input name="address" type="address" class="inputvalues" placeholder="Enter your address" required/><br><br>
<label><b>Qualification:</b></label>
<select class="qualification" name="qualification">
<option value="SCL">SCHOOL STUDENT</option>
<option value="BE">ENGINEERING</option>
<option value="BSC">ARTS AND SCIENCE</option>
<option value="AGRI">AGRICULTURE</option>
<option value="OTHER">WORKER</option>
</select><br><br>
<label><b>Current Year/Std*:(V std,....or 1st yr.....or other)</b></label>
<input name="c_year" type="text" class="inputvalues" placeholder="Year of Studying" required/><br>
<label><b>School/College/Workplace Name:</b></label><br>
<input name="collname" type="text" class="inputvalues" placeholder="Enter your school/college name" required/><br>
<label><b>1.From*:</b></label><br>
<input name="from_1" type="text" class="inputvalues" required/><br>
<label><b>To:</b></label><br>
<input name="to_1" type="text" class="inputvalues" required/><br>
<label><b>2.From*:</b></label><br>
<input name="from_2" type="text" class="inputvalues" /><br>
<label><b>To:</b></label><br>
<input name="to_2" type="text" class="inputvalues" /><br>
<label><b>Phone:</b></label><br>
<input name="phone" type="phone" class="inputvalues" placeholder="Enter phone number" required/><br>
<label><b>Password:</b></label><br>
<input name="pass" type="password" class="inputvalues" placeholder="Enter password" required/><br>
<label><b>Confirm Password:</label><br>
<input name="cpass" type="password" class="inputvalues" placeholder="Re-enter password" required/><br><br>
<input name="save" type="submit" id="save_btn" value="Save"/>
<input name="update" type="submit" id="update_btn" value="Update"/>
<a href="finish.php"><input name="finish" type="button" id="finish_btn" value="Finish"/><br>
</form>
<?php
if(isset($_POST['save']))
{
$username=$_POST['username']; $fullname=$_POST['fullname']; $gender=$_POST['gender'];
$fname=$_POST['fathername']; $address=$_POST['address']; $qual=$_POST['qualification'];
$year=$_POST['c_year']; $colname=$_POST['collname']; $f_1=$_POST['from_1'];
$t_1=$_POST['to_1']; $f_2=$_POST['from_2']; $t_2=$_POST['to_2'];
$phn=$_POST['phone']; $password=$_POST['pass']; $cpassword=$_POST['cpass'];
$img_name=$_FILES['imglink']['name']; $img_size=$_FILES['imglink']['size'];
$img_tmp=$_FILES['imglink']['tmp_name'];
$directory ='uploads/';
$target_file= $directory.$img_name;
if($password==$cpassword){
$query="select * from user_details WHERE username='$username'";
$query_run =mysqli_query($con,$query); if(mysqli_num_rows($query_run)>0){
echo '<script type="text/javascript"> alert("User already exists..Update details if required") </script>'; }
else if(file_exists($target_file)){
echo '<script type="text/javascript"> alert("Image already exists..Try another image file") </script>'; }
else if($img_size>2097152){
echo '<script type="text/javascript"> alert("Image file size larger than 2 MB..try another image")</script>'; }
else{
move_uploaded_file($img_tmp,$target_file);
$query="insert into user_details values('','$username','$fullname','$target_file','$gender','$fname','$address',
'$qual','$year','$colname','$f_1','$t_1','$f_2','$t_2','$phn','$password') ";
$query_run =mysqli_query($con,$query);
if($query_run){
echo '<script type="text/javascript"> alert("Form Saved Successfully") </script>'; }
else{
echo '<script type="text/javascript"> alert("Error in saving.....") </script>'; }
} }
else{
echo '<script type="text/javascript"> alert("Password and confirm password doesnot match") </script>'; }}
if(isset($_POST['update']))
{
$user= $_POST['username']; $fname = $_POST['fullname']; $address = $_POST['address'];
$year= $_POST['c_year']; $f_1 = $_POST['from_1']; $t_1 = $_POST['to_1'];
$f_2= $_POST['from_2']; $t_2= $_POST['to_2'];
$img_name=$_FILES['imglink']['name']; $img_size=$_FILES['imglink']['size'];
$img_tmp=$_FILES['imglink']['tmp_name']; $directory ='uploads/'; $target_file= $directory.$img_name;
$query="select * from user_details WHERE username='$user' ";
$query_run= mysqli_query($con,$query);
if(mysqli_num_rows($query_run)>0){
move_uploaded_file($img_tmp,$target_file);
$query="UPDATE user_details SET fullname='$fname',imglink='$target_file',address='$address',yearofstudy='$year',from_1='$f_1',to_1='$t_1',from_2='$f_2',to_2='$t_2' WHERE username='$user' ";
$query_run =mysqli_query($con,$query);
if($query_run){
echo '<script type="text/javascript"> alert("Updated Successfully") </script>'; }
else{
echo '<script type="text/javascript"> alert("Error!!!") </script>'; }}
else{
echo '<script type="text/javascript"> alert("Invalid Credentials") </script>'; }}
?> </div> </body> </html>