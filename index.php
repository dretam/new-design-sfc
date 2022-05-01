<?php
session_start();

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  $subject = "About SFC Services";

  $mail_header = "From:" . $name . "<" . $email . ">" . " <" . $phone . ">\r\n";

  $recipient = "suwarnadwipa.floracenter@gmail.com";

  mail($recipient, $subject, $message, $mail_header)
    or die("Error!");

  $success = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SFC | Company Profile</title>
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
</head>

<body>

  <!-- ======= Header ======= -->

  <?php include 'header.php'; ?>

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="hero-text" data-aos="zoom-out">
      <h2 style="font-family: 'Shrikhand', cursive; font-weight: bold;">Welcome to Suwarnadwipa Flora Center</h2>
      <p style="font-family: Lemon/Milk;">Enjoy The Green of Sumatera</p>
      <p style="font-family: 'Nunito', sans-serif;">Rasakan pesona puspa secara lebih nyata dalam teknologi virtual reality</p>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

    <!-- <div class="product-screens">

      <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
        <img src="assets/img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
        <img src="assets/img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3" data-aos="fade-up">
        <img src="assets/img/product-screen-3.png" alt="">
      </div>

    </div> -->

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="section-bg" style="margin-bottom: -100px;">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">About Us</h3>
          <span class="section-divider"></span>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <p class="section-description">
                Suwarnadwipa Flora Center (SFC) merupakan platform virtual event yang didukung oleh SVCC Indonesia
                untuk membantu klien membuat event virtual dan hybrid dengan lebih nyata mulai dari konferensi, webinar hingga expo secara efektif dan efisien pada dunia puspa Sumatera.
              </p>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
            <center>
              <iframe class="video" style="border-radius: 25px;" width="560" height="315" src="https://www.youtube.com/embed/2eFoInNP8G4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center>
          </div>

          <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
            <h3 style="font-weight: bold;"><i class="bi bi-patch-question"></i> WHY</h3>
            <p class="section-description" style="font-style: italic;">Rendahnya wawasan masyarakat mengenai pentingnya pelestarian flora endemik yang dapat mengakibatkan kepunahan</p>

            <h3 style="font-weight: bold;"><i class="bi bi-patch-question"></i> HOW</h3>
            <p class="section-description" style="font-style: italic;">Menyediakan produk berupa platform virtual event management serta bekerja sama dengan instansi pemerintahan bidang botani untuk memperkenalkan dan mengedukasi masyarakat terkait flora endemik khususnya di Regional Sumatera</p>

            <h3 style="font-weight: bold;"><i class="bi bi-patch-question"></i> WHAT</h3>
            <p class="section-description" style="font-style: italic;">Menyelenggarakan Suwarnadwipa Flora Center Virtual Expo dan Webinar mengenai flora dari pulau Sumatera</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Featuress Section ======= -->
    <section id="features" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header">
              <h3 class="section-title">Our Services</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="assets/img/product-features.png" alt="" data-aos="fade-right">
          </div>

          <div class="col-lg-8 col-md-7 mt-3">

            <div class="row">

              <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-tv"></i></div>
                <h4 class="title" style="font-weight: bold;"><a href="">Webinar</a></h4>
                <p class="description">Hadirkan Webinar dengan jangkauan lebih dari 6000+ pengunjung yang dilengkapi berbagai fitur interaktif dan gamifikasi.</p>
                <a href="https://srikanditelkomgroup.svcc.io/webinar/live" target="_blank"><button type="button" class="btn btn-lg" style="background : linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%); color: white; border-radius: 20px;">Go to Demo</button></a>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                <div class="icon"><i class="bi bi-headset-vr"></i></div>
                <h4 class="title" style="font-weight: bold;"><a href="">Virtual Expo</a></h4>
                <p class="description">Berikan pengalaman imersif pada pengunjung acara dengan desain 3D beresolusi hingga 4K, latar musik dan terintegrasi dengan media sosial.</p>
                <a href="https://sfc-expo.000webhostapp.com/sfc-expo/" target="_blank"><button type="button" class="btn btn-lg" style="background : linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%); color: white; border-radius: 20px;">Go to Demo</button></a>
              </div>

            </div>

          </div>

        </div>

      </div>

    </section><!-- End Featuress Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3 class="cta-title">Konsultasikan ide virtual event anda secara gratis</h3>
            <p class="cta-text">Kami akan membantu anda menjawab pertanyaan seputar layanan SFC</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle scrollto" href="#contact">Call</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-12 col-md-2 mt-5 ml-auto mr-auto d-block">
            <img src="assets/img/clients/athon-official.png" alt="">
          </div>

          <div class="col-12 col-md-2 ml-auto mr-auto d-block">
            <img src="assets/img/clients/dk-1.png" alt="">
          </div>

          <div class="col-12 col-md-2 mt-5 ml-auto mr-auto d-block">
            <img src="assets/img/clients/fina-official.png" alt="">
          </div>

          <div class="col-12 col-md-2 ml-auto mr-auto d-block">
            <img src="assets/img/clients/itb.png" alt="">
          </div>

          <div class="col-12 col-md-2 mt-3 ml-auto mr-auto d-block">
            <img src="assets/img/clients/itdri.png" alt="">
          </div>

          <div class="col-12 col-md-2 mt-3 ml-auto mr-auto d-block">
            <img src="assets/img/clients/dlh.png" alt="">
          </div>

        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= More Features Section ======= -->
    <section id="more-features" class="section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3 class="section-title">More Features</h3>
          <span class="section-divider"></span>
          <p class="section-description">Kami menyediakan berbagai layanan dan fitur terlengkap untuk memudahkan dan menunjang virtual event anda</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="box rounded">
              <div class="icon"><i class="bi bi-boxes"></i></div>
              <h4 class="title"><a href="">Customable Content</a></h4>
              <p class="description">Memberikan kemudahan kustomisasi desain konten pada laman event webinar atau virtual expo anda</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box rounded">
              <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
              <h4 class="title"><a href="">Report Analysis</a></h4>
              <p class="description">Dapatkan detail keseluruhan data acara terkait aktivitas pengunjung, kinerja booth dan laporan lainnya sesuai kebutuhan anda dengan analytics tool yang akurat melalui interpretasi statistik dan grafik</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box rounded">
              <div class="icon"><i class="bi bi-controller"></i></div>
              <h4 class="title"><a href="">Mini Games</a></h4>
              <p class="description">Memberikan warna baru dalam acara anda dengan menghadirkan pengalaman menyenangkan bermain mini games. Tingkatkan engagement pengunjung melalui tantangan dan kumpulkan poin sebanyak-banyaknya</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box rounded">
              <div class="icon"><i class="bi bi-bounding-box"></i></div>
              <h4 class="title"><a href="">Framework</a></h4>
              <p class="description">Tingkatkan brand awarness event anda dengan menampilkan banner dan desain yang menarik di laman utama webinar atau virtual expo</p>
              <br>
              <p class="description">Dan masih banyak lagi ...</p>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End More Features Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3 class="section-title">Frequently Asked Questions</h3>
          <span class="section-divider"></span>
        </div>

        <br>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Kenapa harus menggunakan virtual event? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Virtual event memiliki potensi luar biasa dalam meningkatkan keterlibatan audiens dan mempromosikan merek atau produk Anda. Dengan menggunakan virtual event SFC, Anda dapat menjangkau ribuan audiens dengan tampilan event yang menarik didukung dengan teknologi terkini. Nikmati beragam produk SFC dan rasakan banyak keuntungan dengan virtual event.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Di mana saya dapat mengetahui pricing jika ingin menggunakan produk SFC? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Jika Anda ingin mengetahui rincian harga dari produk kami, silakan menghubungi kami di panel kontak yang tertera.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Apakah layanan SFC dapat custom by request? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Untuk semua layanan seperti landing page dan virtual booth dapat dikustomisasikan sesuai kebutuhan dan keinginan konsumen.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Apakah konsultasi yang saya lakukan akan dikenakan biaya? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Anda akan mendapatkan konsultasi secara gratis hanya pada pertemuan pertama. Konsultasi selanjutnya akan dikenakan biaya.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Apakah saya bisa mendapatkan pelayanan secara offline/onsite? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                SFC akan memberikan layanan untuk kebutuhan acara Anda secara offline atau onsite seperti penyediaan camera equipment, dll.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Our Team</h3>
          <span class="section-divider"></span>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/team/2-fix.jpg" alt=""></div>
              <h4>Taufan Perkasa Putra</h4>
              <span>Business Development</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/team/7-fix.jpg" alt=""></div>
              <h4>Dolores Sibuea</h4>
              <span>Digital Marketing</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/team/13-fix.jpg" alt=""></div>
              <h4>Andreas Pratama</h4>
              <span>Web Developer</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="assets/img/team/8-fix.jpg" alt=""></div>
              <h4>Halimah Hana</h4>
              <span>Digital Marketing</span>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Team Section  -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container" data-aos="fade-up">
        <div class="row">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3><a href="index.php"><i class="bi bi-flower3"></i> SFC</a></h3>
              <p>Suwarnadwipa Flora Center (SFC) merupakan platform virtual event yang didukung oleh SVCC Indonesia untuk membantu klien membuat event virtual dan hybrid dengan lebih nyata mulai dari konferensi, webinar hingga expo secara efektif dan efisien pada dunia puspa Sumatera</p>
              <div class="social-links">
                <a href="https://www.instagram.com/suwarnadwipa.floracenter/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCLmiW7rqeyxKAmo_TSCQbZg" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
                <a href="https://www.linkedin.com/company/smarteye-id/" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p><a href="https://goo.gl/maps/hqndzRQx48HYoJ5P6" target="_blink">Jl. Prof. HM. Yamin Sh No.2, Kesawan, Kec. Medan Bar., Kota Medan, Sumatera Utara 20236</a></p>
              </div>

              <div style="margin-top: -15px;">
                <i class="bi bi-envelope"></i>
                <p><a href="mailto:suwarnadwipa.floracenter@gmail.com">suwarnadwipa.floracenter@gmail.com</a></p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p><a href="https://wa.wizard.id/7e411b" target="_blink">+62 8118 982 11 - WhatsApp and Call</a></p>
              </div>

            </div>
          </div>

          <div class="col-lg-4 col-md-8">
            <div class="form">
              <form action="index.php#contact" method="post">
                <div class="row">

                  <?php if (isset($success)) : ?>
                    <div class='alert alert-success d-flex align-items-center' role='alert'>
                      <div>
                        <i class="bi bi-check-circle"></i> Mail sent! Thank you, buddy! We will reply your mail ASAP!
                      </div>
                    </div>
                    <meta http-equiv='refresh' content='3; url= index.php' />
                  <?php endif; ?>

                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:10" data-msg="Please enter at least 8 chars" required>
                  </div>
                  <div class="form-group col-lg-6 mt-3 mt-lg-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:12" data-msg="Please enter at least 12 chars of phone">
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center mt-3"><button type="submit" name="submit" value="submit" class="btn btn-lg" style="background : linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%); color: white; border-radius: 20px;" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <?php include 'footer.php'; ?>

  <!-- End  Footer -->

  <a href="#hero" class="back-to-top d-flex align-items-center justify-content-center scrollto"><i class="bi bi-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>