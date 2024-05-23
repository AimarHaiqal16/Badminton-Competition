<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Button</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }

        .container {
            text-align: center;
        }

        .success-button {
            text-decoration :none;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .success-button:hover {
            background-color: #218838;
        }

        .success-button:active {
            background-color: #1e7e34;
            transform: scale(0.98);
        }
    </style>
</head>
<body>
<?php
$con=mysqli_connect("localhost", "root", "","badmintonevent") or die("Cannot connect to server.".mysqli_error($con));

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
         $query = "INSERT INTO users VALUES(null,'$username','$password','$email', '$f_name', '$p_num', '$gender')";
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

<div class="container">
	<h1> You have successfully registered!</h1>
        <a href="index_usermain.php" class="success-button">Success</a>

    </div>

</body>
</html> 
