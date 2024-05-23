<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Function</title>
    <link rel="stylesheet" href="css/style.css">
	<style>
	body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff;
    color: #333;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    background-color: #ffdd57;
    color: #003366;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 20px;
}

form {
    margin: 20px 0;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #003366;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #ffdd57;
    color: #003366;
}
</style>
</head>
<body>

<?php
$con=mysqli_connect("localhost", "root", "","badmintonevent") or die("Cannot connect to server");
$username=@$_POST["username"];
$password=@$_POST["password"];
$sql="Select * from admin where adminusername='$username'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)== 0)
echo "Username does not exist";
else
{
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
if($row["adminpassword"] == $password)
{
session_start();
$_SESSION["adminusername"]= $username;

header("Location:index.php");
}
else
echo "Password wrong";
}
?>

</body>
</html>