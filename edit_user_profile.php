<?php
session_start();
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null; // Check if the session variable is set
$con=mysqli_connect("localhost", "root","","badmintonevent(1)") or die("Cannot connect to server.".mysqli_error($con));
//$idCustomer=$_POST["idCustomer"];
$sql="SELECT * FROM users WHERE username='$user'";
$result=mysqli_query($con,$sql) or die("Cannot execute sql.");
$row=mysqli_fetch_array($result,MYSQLI_NUM);
?>

<html>
<body>
<p>Fill the blanks below to update your data </p>
<form name="form_update"method="post" action="confirm_user_update.php">

Full Name :
 <input name="f_name" type="text" placeholder="<?php echo $row[4]; ?>">
 Email : 
 <input name="email" type="text" placeholder="<?php echo $row[3]; ?>">
 Password :
 <input name="pass" type="text" placeholder="<?php echo $row[2]; ?>">
 Phone Number :
 <input name="phone_num" type="text" placeholder="<?php echo $row[5]; ?>">
 <p>
 <input name="update" type="submit" value="Update">
 <input type="reset" name="Reset" value="Reset">
 </p>
</form>
</body>
</html>






