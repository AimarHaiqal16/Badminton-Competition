<?php
session_start();

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']);
$user_id = $_SESSION['user_id'] ?? null;

// Database connection settings
$host = 'localhost';
$db = 'badmintonevent';
$user = 'root';
$pass = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Fetch events from the database
$events = [];
$stmt = $pdo->query('SELECT event_id, event_name, quota, gender FROM events');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $events[] = $row;
}

// Fetch user details if logged in
$user = null;
if ($is_logged_in) {
    $stmt = $pdo->prepare('SELECT gender FROM users WHERE user_id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About - Skibidi Badminton Competition Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- =======================================================
  * Template Name: Skibidi Badminton Competition
  * Template URL: https://bootstrapmade.com/Skibidi Badminton Competition-bootstrap-construction-website-template/
  * Updated: May 10 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .icon-box {
      display: flex;
      position: relative;
      margin-bottom: 10px;
    }
    .icon-box i {
      margin-right: 10px;
    }
    .icon-box h4 {
      margin: 0;
    }
    .stretched-link {
      text-decoration: none;
      color: yellow;
      cursor: pointer;
    }
    .popup {
      display: none;
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
      padding: 20px;
      background: white;
      color: black;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }
    .main-container {
      display: flex;
      justify-content: space-between;
    }
    .main-content {
      flex: 1;
      margin-right: 20px;
    }
    .categories-container {
      width: 300px;
    }
    .popup-buttons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .popup-buttons button {
      margin: 0 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #feb900;
      color: black;
      cursor: pointer;
    }
  </style>

</head>

<body class="about-page">

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
          <li><a href="events_user.php" class="active">Categories</a></li>
          <li><a href="userindex.php">User Profile</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url(assets/img/WIN_20220903_21_30_26_Pro.jpg);">
      <div class="container position-relative">
        <h1>Categories</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Categories</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->




    <section id="alt-services" class="alt-services section">

      <div class="container">

        <div class="row justify-content-around gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="assets\img\hero-LCW.jpg" alt=""></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>Pick a Category!</h3>
            <p>Participants can choose to enter more than one category, so go ahead and join!</p>

            <div id="eventButtonsContainer" class="d-flex flex-column"></div>
          </div>
        </div>

      </div>
      
<!-- Popup elements -->
<div id="popup-overlay" class="popup-overlay"></div>
      <div id="confirmation-popup" class="popup">
        <p id="confirmation-message">Are you sure you want to apply for this event?</p>
        <div class="popup-buttons">
          <button id="confirm-button">Yes</button>
          <button id="cancel-button">No</button>
        </div>
      </div>
      <div id="error-popup" class="popup">
        <p id="error-message"></p>
        <div class="popup-buttons">
          <button id="close-button">Close</button>
        </div>
      </div>

      <div id="eventButtonsContainer" class="categories-container"></div>
    </div>

    </section>



  </main>

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

  <script>
    var events = <?php echo json_encode($events); ?>;
    var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
    var userId = <?php echo json_encode($user_id); ?>;
    var userGender = <?php echo json_encode($user['gender'] ?? null); ?>;
    var loginUrl = '/login.php';

    console.log(events);

    var eventButtonsContainer = document.getElementById('eventButtonsContainer');

    events.forEach(function(event) {
      var eventDiv = document.createElement('div');
      eventDiv.classList.add('icon-box', 'd-flex', 'position-relative');
      eventDiv.setAttribute('data-aos', 'fade-up');
      eventDiv.setAttribute('data-aos-delay', '300');

      var iconElement = document.createElement('i');
      iconElement.innerText = '>>>';

      var innerDiv = document.createElement('div');

      var lineBreak = document.createElement('br');

      var h4Element = document.createElement('h4');

      var linkElement = document.createElement('a');
      linkElement.setAttribute('href', '#');
      linkElement.classList.add('stretched-link');
      linkElement.innerText = event.event_name;
      linkElement.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Event clicked:', event.event_name);
        validateAndApply(event.event_id, event.gender, event.quota);
      });

      h4Element.appendChild(linkElement);

      innerDiv.appendChild(lineBreak);
      innerDiv.appendChild(h4Element);

      eventDiv.appendChild(iconElement);
      eventDiv.appendChild(innerDiv);

      eventButtonsContainer.appendChild(eventDiv);
    });

    document.getElementById('popup-overlay').addEventListener('click', function() {
      document.getElementById('popup-overlay').style.display = 'none';
      document.getElementById('login-popup').style.display = 'none';
      document.getElementById('confirmation-popup').style.display = 'none';
    });

    document.getElementById('close-button').addEventListener('click', function() {
      document.getElementById('popup-overlay').style.display = 'none';
      document.getElementById('error-popup').style.display = 'none';
    });

    function validateAndApply(eventId, eventGender, eventQuota) {
      console.log('Validating application for event ID:', eventId);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'validate_application.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          console.log('Validation response:', response);
          if (response.success) {
            document.getElementById('confirmation-popup').style.display = 'flex';
            document.getElementById('confirm-button').onclick = function() {
              applyForEvent(eventId);
            };
            document.getElementById('cancel-button').onclick = function() {
              document.getElementById('confirmation-popup').style.display = 'none';
            };
          } else {
            document.getElementById('error-message').innerText = response.message;
            document.getElementById('popup-overlay').style.display = 'block';
            document.getElementById('error-popup').style.display = 'block';
          }
        }
      };
      xhr.send('user_id=' + userId + '&event_id=' + eventId + '&user_gender=' + userGender + '&event_gender=' + eventGender + '&event_quota=' + eventQuota);
    }

    function applyForEvent(eventId) {
      console.log('Applying for event ID:', eventId);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'apply_event.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          console.log('Application response:', response);
          document.getElementById('error-message').innerText = response.message;
          document.getElementById('popup-overlay').style.display = 'block';
          document.getElementById('error-popup').style.display = 'block';
          document.getElementById('confirmation-popup').style.display = 'none';
        }
      };
      xhr.send('user_id=' + userId + '&event_id=' + eventId);
    }
  </script>

</body>

</html>