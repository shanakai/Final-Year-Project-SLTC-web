<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
ini_set('display_errors',0);
session_start();
if( isset( $_SESSION['id'] ) ) {
  if($_SESSION['type'] == "user")
  {
$id = $_SESSION['id'];
  }
  else {
    header("Location: http://localhost/vis/user/login/");
  die();
  }
}

else {
  header("Location: http://localhost/vis/user/login/");
die();
}

$url = 'http://localhost:8080/auth/users';
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);
$resultArray = json_decode($result, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>vis</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">

</head>

<body>

<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="index.php"><img src="../assets/img/logo.png" alt=""></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a class="nav-link scrollto" href="">My Profile</a></li>
          <li><a class="nav-link scrollto" href="my_logs.php">My Logs</a></li>
          <li class="dropdown"><a href="#"><span>My Vehicles</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_new_vehicle.php">Add new vehicle</a></li>
             
              <li><a href="my_vehicles.php">My Vehicles</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="../services/logout.php">LOG OUT</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>My Profile</b></h2>
          <ol>
            <li><a href="index.html">Driver Home</a></li>
            <li>My Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
     
<br>
 <div class="col-6 offset-4">
 <div class="card" style="width: 20rem;">
  <img class="card-img-top" src="https://www.svgrepo.com/show/227902/driver.svg" style="padding: 2px;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><b>Name: </b><?php echo $_SESSION["name"] . ' ' . $_SESSION["lname"]?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b>NIC: </b> <?php echo $_SESSION["nic"] ?></li>
    <li class="list-group-item"><b>Address: </b><?php echo $_SESSION["address"] ?></li>
    <li class="list-group-item"><b>Email: </b><?php echo $_SESSION["email"] ?></li>
  </ul>
  
</div>
</div>

    </section>

  </main><!-- End #main -->

  <div class="footer1">
  <p  class="fp">Vehicle Information System</p>
</div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
</body>

</html>