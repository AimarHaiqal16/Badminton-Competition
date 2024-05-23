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
  <title>Skibidi Badminton Competition</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">Skibidi Badminton Competition</h1> <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index_usermain.php">Home</a></li>
          <li><a href="events_user.php">Categories</a></li>
          <li><a href="useradminindex.php" class="active">User Profile</a></li>
          <li><a href="logout_user.php">Logout</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url(assets/img/womenssingles.jpg);">
      <div class="container position-relative">
        <h1>User Profile</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">User Profile</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->


        <!-- View User Profile -->
    <br><br>
        <div class="container">
    <div class="row">
        <div class="col-md-6">

            <label for="username">Username:</label>
            <textarea id="username" name="un" class="form-control" rows="1" readonly><?php echo $row[1]; ?></textarea>

            <label for="password">Password:</label>
            <input type="password" id="password" name="add" class="form-control" value="<?php echo htmlspecialchars($row[2]); ?>" readonly>

            <label for="gender">Gender:</label>
            <textarea id="gender" name="add" class="form-control" rows="1" readonly><?php echo $row[6]; ?></textarea>
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
        <div> Your Registered Events : <br><br> </div>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Event Name</th>
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
                   
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br> <a  href="edit_user_profile.php" role="button" background-color= "#feb900";>Edit Profile</a> <br>
    <br></br>
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

  <footer id="footer" class="footer">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6 footer-about">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="sitename">Skibidi Badminton Competition</span>
      </a>
      <div class="footer-contact pt-3">
        <p><strong>Address:</strong></p>
        <p>TNB INTEGRATED LEARNING SOLUTION SDN BHD</p>
        <p>KM 7, Jalan Ikram-Uniten, Institut Latihan Sultan Ahmad Shah</p>
        <p>43009 Kajang, Selangor</p>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4> <br><br>  </h4>
      <ul>
        <p><strong>Phone:</strong></p>
        <p><span>+601 1545 9436</span></p>
      </ul>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4> <br><br>  </h4>
      <ul>
        <p><strong>Email:</strong> </p>
        <p><span>aimarhaiqal16@yahoo.com</span></p>
      </ul>
    </div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">Skibidi</strong> <span>All Rights Reserved</span></p>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</div>

</footer>

</body>

</html>




      
   