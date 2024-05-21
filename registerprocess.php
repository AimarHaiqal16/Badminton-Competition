<html>
<body>
<?php
$con=mysqli_connect("localhost", "root", "","badmintonevent") or die("Cannot connect to
server.".mysqli_error($con));

 $username=@$_POST["username"];
 $password=@$_POST["pass"];
 $confirmpassword=@$_POST["confirmpass"];
 $email=@$_POST["email"];
 $f_name=@$_POST["full_name"];
 $p_num=@$_POST["phone_num"];
 $gender=@$_POST["gender"];


 $duplicate = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' OR email ='$email'");

 if(mysqli_num_rows($duplicate) > 0){
     echo
     "<script> alert('Username or Email Has already taken');</script>";
 }
 else{
     if($password == $confirmpassword){
         $query = "INSERT INTO users VALUES(null,'$username','$password','$email', '$f_name', '$p_num','null','$gender')";
     mysqli_query($con,$query);
     echo
     "<script> alert('Registration Succesful');</script>";
     }
     else{
         echo 
         "<script> alert('Password Does Not Match');</script>";
     }
 }
?>
</body>
</html> 

