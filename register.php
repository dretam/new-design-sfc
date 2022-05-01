<?php
session_start();
if (!isset($_SESSION['log'])) {
} else {
  header('location:index.php');
};

include 'dbconnect.php';

if (isset($_POST['adduser'])) {
  $namalengkap = $_POST['namalengkap'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $notelp = $_POST['notelp'];
  $institusi = $_POST['institusi'];
  $pekerjaan = $_POST['pekerjaan'];

  $query = "insert into login (namalengkap, email, password, notelp, institusi, pekerjaan) values('$namalengkap','$email','$password','$notelp','$institusi','$pekerjaan')";
  $sql = mysqli_query($conn, $query); // eksekusi atau jalankan query dari variabel $query

  if ($sql) {
    $success = true;
  } else {
    // jika gagal, lakukan:
    $fail = true;
  }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SFC | Register</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon/favicon-16x16.png">
  <link rel="manifest" href="assets/icon/site.webmanifest">
  <link rel="mask-icon" href="assets/icon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Avilon - v4.6.1
  * Template URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #1de099, #1dc8cd);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #1de099, #1dc8cd)
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <h1 style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;"><a href="index.php"><i class="bi bi-flower3"></i> SFC</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php#hero" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#features" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Services</a></li>
          <li><a class="nav-link scrollto" href="index.php#faq" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">FAQ</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Contact</a></li>
          <li class="dropdown"><a href="#" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;"><span>See More</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="login.php" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Login</a></li>
              <li><a href="register.php" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Register</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <br>
  <br>

  <section class="vh-150">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-8">
          <div class="card gradient-custom text-white" style="border-radius: 25px;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                <p class="text-white-50 mb-5">Please register your account!</p>

                <?php if (isset($fail)) : ?>
                  <p style="color: red; font-style: italic; text-align: center;">Register Failed</p>
                <?php endif; ?>

                <?php if (isset($success)) : ?>
                  <p style="color: green; font-style: italic; text-align: center;">Your account has been registered! Let's login into our website!</p>
                  <meta http-equiv='refresh' content='2; URL=login.php'>
                <?php endif; ?>

                <form class="col s12" action="register.php" method="post" enctype="multipart/form-data">

                  <div class="row">
                    <div class="form-outline form-white mb-4 col-12 col-xl-6">
                      <input type="text" id="namalengkap" name="namalengkap" class="form-control form-control-lg" placeholder="Full Name" required />
                    </div>

                    <div class="form-outline form-white mb-4 col-12 col-xl-6">
                      <input type="text" id="institusi" name="institusi" class="form-control form-control-lg" placeholder="Institution" required />
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-outline form-white mb-4 col-12 col-xl-6">
                      <input type="text" id="pekerjaan" name="pekerjaan" class="form-control form-control-lg" placeholder="Occupation" required />
                    </div>

                    <div class="form-outline form-white mb-4 col-12 col-xl-6">
                      <input type="text" id="notelp" name="notelp" class="form-control form-control-lg" placeholder="Phone" required maxlength="15" />
                    </div>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" minlength="8" required />
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="adduser">Register</button>

                </form>
              </div>

              <div>
                <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Footer ======= -->

  <?php include 'footer.php'; ?>

  <!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>