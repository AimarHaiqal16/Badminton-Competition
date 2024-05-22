<?php
session_start();
$user = isset($_SESSION["username"]) ? $_SESSION["username"] : null; // Check if the session variable is set
$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
$con=mysqli_connect("localhost", "root","","badmintonevent(1)") or die("Cannot connect to server.".mysqli_error($con));
$sql="SELECT * FROM users WHERE username='$user'";
$result=mysqli_query($con,$sql) or die("Cannot execute sql.");
$row=mysqli_fetch_assoc($result);
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i>>>></i>
              <div>
                <br>
                <h4><a href="" class="stretched-link">Men's Singles</a></h4>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i>>>></i>
              <div>
                <br>
                <h4><a href="" class="stretched-link">Women's Singles</a></h4>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i>>>></i>
              <div>
                <br>
                <h4><a href="" class="stretched-link">Men's Doubles</a></h4>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i>>>></i>
              <div>
                <br>
                <h4><a href="" class="stretched-link">Women's Doubles</a></h4>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i>>>></i>
              <div>
                <br>
                <h4><a href="" class="stretched-link">Mixed Doubles</a></h4>
              </div>
            </div><!-- End Icon Box -->

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>