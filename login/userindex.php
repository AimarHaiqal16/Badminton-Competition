<html>
<body>
<?php
//call this function to check if session is exists or not
session_start();
$user=$_SESSION["username"]; //pass value $_SESSION variable to variable $user to display
echo "Welcome $user";
//if session is exists
if(isset ($user))
{
?>

<p>Nice to meet you</p>
<?php //put right before close </body> tag
}
else
 echo "No session exist or session is expired. Please log in again";
?>
</body>
</html> 