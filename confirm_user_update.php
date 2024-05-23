<html>
<body>
<?php
session_start();
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
$con=mysqli_connect("localhost", "root","","badmintonevent") or die("Cannot connect to server.".mysqli_error($con));

$f_name=$_POST["f_name"];
$email=$_POST["email"];
$password=$_POST["pass"];
$p_num=$_POST["phone_num"];

$update_sql="UPDATE users SET password ='$password', full_name = '$f_name',email = '$email', phone_num = '$p_num' WHERE username = '$user'";
$sql_result=mysqli_query($con,$update_sql);
if($sql_result)
 //echo "Succesfully update the data.";
 echo '<script>alert("Succesfully update the data.")</script>'; 
else
 //echo "Error in updating the data";
 echo '<script>alert("Error in updating data")</script>'; 
?>

<a class="btn btn-primary" href="useradminindex.php" role="button">Back to User Profile</a>
</body>
</html>