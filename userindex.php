<?php
// Start the session to check if the user session exists
session_start();
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null; // Check if the session variable is set
$con=mysqli_connect("localhost", "root", "","badmintonevent") or die("Cannot connect to server.".mysqli_error($con));

$sql = "SELECT * FROM users WHERE username='$user'";
$result = mysqli_query($con, $sql) or die("Cannot execute SQL query.");
$row=mysqli_fetch_array($result,MYSQLI_BOTH);


if($user==$row[1])
{


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog - Skibidi Badminton Competition Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="blog-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center text-decoration-none">
        <h1 class="sitename mb-0">Skibidi Badminton Competition</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index_usermain.php">Home</a></li>
          <!--<li><a href="admins.html">Admin</a></li>-->
          <li><a href="events_user.php">Categories</a></li>
          <li><a href="userindex.php">User Profile</a></li>
          <li><a href="logout_user.php">Logut</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <nav class="breadcrumbs">
        </nav>
      </div>
    </div><!-- End Page Title -->


        <!-- View User Profile -->
    <br><br>
        <div class="container">
    <h1>User Profile</h1>
    <div class="row">
        <div class="col-md-6">
            <label for="userID">User ID:</label>
            <textarea id="userID" name="id" class="form-control" rows="1" readonly><?php echo $row[0]; ?></textarea>

            <label for="username">Username:</label>
            <textarea id="username" name="un" class="form-control" rows="1" readonly><?php echo $row[1]; ?></textarea>

            <label for="password">Password:</label>
<input type="password" id="password" name="add" class="form-control" value="<?php echo htmlspecialchars($row[2]); ?>" readonly>

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

$sql3 = "SELECT * FROM applications WHERE user_id='$userid'";
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
    </tr>
  </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
                    <td>
                    <?php
                        $reg_id = $user['event_id'];
                        $sql4 = "SELECT event_name FROM events WHERE event_id='$reg_id'";
                        $result4 = $con->query($sql4);
                        if ($result4->num_rows > 0) {
                            $event = $result4->fetch_assoc();
                            echo htmlspecialchars($event['event_name']);
                        } else {
                            echo "Event not found";
                        }
                        ?>
                </td>
                        <td><?= $user['event_id'] ?></td>
                   
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br> <a class="btn btn-primary" href="edit_user_profile.php" role="button">Edit Profile</a> <br>
</div>
<?php
} else {
    echo "<p>No registered events found for this user.</p>";
}
?>

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




      
   