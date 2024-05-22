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
<?php
// Start the session to check if the user session exists
session_start();
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null; // Check if the session variable is set

if ($user) {
    //echo "Welcome $user";
    // User profile content goes here
    // You can fetch and display user-specific information from the database or session
    ?>
    <h2>User Profile</h2>
    <p>Name: <?php echo htmlspecialchars($user); ?></p>
    <a class="btn btn-primary" href="edit_user_profile.php" role="button">Edit Profile</a>
    <a class="btn btn-primary" href="viewuser.php" role="button">View Profile</a>
    <a class="btn btn-primary" href="reg_event.php" role="button">Register Event</a>
    <a class="btn btn-primary" href="index_usermain.php" role="button">Home</a>
    <a class="btn btn-primary" href="" role="button">Logout</a>
    <!-- Add more user-specific information here -->

    <?php
} else {
    echo "No session exist or session is expired. Please log in again.";
}
?>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




      
   