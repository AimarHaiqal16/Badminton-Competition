<html>
<head>
<title>User Index</title>
</head>
<body>
<?php
$con=mysqli_connect("localhost", "root", "","badmintonevent") or die("Cannot connect to server");
$username=@$_POST["username"];
$password=@$_POST["pass"];
$sql="SELECT * FROM users WHERE username='$username'";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result) == 0){
echo "Username does not exist";
}
else
{
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);
    if($row["password"] ==$password)
    {
        session_start();
        $_SESSION["username"]= $username;
        $_SESSION["user_id"] = $row["user_id"];
        //go to userindex.php page
        header("Location:index_usermain.php");
       // echo "Success";
    }
    else
    echo "Password wrong";
}
?>
</body>
</html>