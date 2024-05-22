<?php
session_start();
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null; // Check if the session variable is set
//echo "Welcome $user";

$con=mysqli_connect("localhost", "root", "","badmintonevent(1)") or die("Cannot connect to server.".mysqli_error($con));

$sql = "SELECT * FROM users WHERE username='$user'";
$result = mysqli_query($con, $sql) or die("Cannot execute SQL query.");
$row=mysqli_fetch_array($result,MYSQLI_BOTH);


if($user==$row[1])
{

?>
<!doctype html>
<html lang="en">
  <head>
    <title>User Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- View User Profile -->
    
    <div class="container">
    <h1>User Profile</h1>
    <div class="row">
        <div class="col-md-6">
            <label for="userID">User ID:</label>
            <textarea id="userID" name="id" class="form-control" rows="1" readonly><?php echo $row[0]; ?></textarea>

            <label for="username">Username:</label>
            <textarea id="username" name="un" class="form-control" rows="1" readonly><?php echo $row[1]; ?></textarea>

            <label for="password">Password:</label>
            <textarea id="password" name="add" class="form-control" rows="1" readonly><?php echo $row[2]; ?></textarea>
        </div>
        <div class="col-md-6">
            <label for="email">Email:</label>
            <textarea id="email" name="add" class="form-control" rows="1" readonly><?php echo $row[3]; ?></textarea>

            <label for="fullName">Full Name:</label>
            <textarea id="fullName" name="add" class="form-control" rows="1" readonly><?php echo $row[4]; ?></textarea>

            <label for="phoneNumber">Phone Number:</label>
            <textarea id="phoneNumber" name="add" class="form-control" rows="1" readonly><?php echo $row[5]; ?></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="gender">Gender:</label>
            <textarea id="gender" name="add" class="form-control" rows="1" readonly><?php echo $row[6]; ?></textarea>
        </div>
    </div>
</div>
<?php
}
else
echo "<p>Customer ID is not exist</p>";
?>

<!--  View Registered Event --> 
<br><br>

<?php
// Retrieve user ID from the user information
$userid = $row['user_id'];

$sql3 = "SELECT * FROM registration WHERE user_id='$userid'";
$result3 = $con->query($sql3);
$users = [];
if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        $users[] = $row3;
    }

?>

<div class="container">
        <div> Your Registered Event : <br><br> </div>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Event Name</th>
      <th scope="col">Event ID</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
                    <td>
                    <?php
                    $reg_id = $user['reg_id']; // Get the reg_id from the database
                    switch ($reg_id) {
                        case 1:
                            echo "Men's Singles";
                            break;
                        case 2:
                            echo "Women's Singles";
                            break;
                        case 3:
                            echo "Men's Doubles";
                            break;
                        case 4:
                            echo "Women's Doubles";
                            break;
                        case 5:
                            echo "Mixed Doubles";
                            break;
                        case 6:
                            echo "Boy's Under 12 Singles";
                            break;
                        case 8:
                            echo "Girl's Under 12 Singles!";
                            break;
                        default:
                            echo "Event not specified!";
                    }
                    ?>
                </td>
                        <td><?= $user['event_id'] ?></td>
                        <td><?= $user['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br> <a class="btn btn-primary" href="userindex.php" role="button">Back to User Profile</a> <br>
</div>
<?php
} else {
    echo "<p>No registered events found for this user.</p>";
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
