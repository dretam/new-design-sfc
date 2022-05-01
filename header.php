<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div id="logo">
            <h1 style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;"><a href="index.php"><i class="bi bi-flower3"></i> SFC</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
        </div>

        <nav id="navbar" class="navbar">
            <ul style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">
                <li><a class="nav-link scrollto active" href="index.php#hero" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Home</a></li>
                <li><a class="nav-link scrollto" href="index.php#about" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">About</a></li>
                <li><a class="nav-link scrollto" href="index.php#features" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Services</a></li>
                <li><a class="nav-link scrollto" href="index.php#faq" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">FAQ</a></li>
                <li><a class="nav-link scrollto" href="index.php#contact" style="font-family: 'Red Hat Display', sans-serif; font-weight: bold;">Contact</a></li>

                <?php
                $sesi_nama = $_SESSION["name"] ?? null;
                if (!isset($_SESSION['log'])) {
                    echo "
                    <li class='dropdown'><a href='#' style='font-family: 'Red Hat Display', sans-serif; font-weight: bold;'><span>See More</span> <i class='bi bi-chevron-down'></i></a>
                        <ul>
                            <li><a href='login.php' style='font-family: 'Red Hat Display', sans-serif; font-weight: bold;'>Login</a></li>
                            <li><a href='register.php' style='font-family: 'Red Hat Display', sans-serif; font-weight: bold;'>Register</a></li>
                        </ul>
                    </li>
                    ";
                } else if ($_SESSION['role'] == 'Member') {
                    echo "
                    <li class='dropdown'><a href='#' style='font-family: 'Red Hat Display', sans-serif; font-weight: bold;'><span>Halo, " . strtok($sesi_nama, ' ') . " </span> <i class='bi bi-chevron-down'></i></a>
                        <ul>
                            <li><a href='pelanggan/index.php' style='font-family: 'Red Hat Display', sans-serif; font-weight: bold;'>User Panel</a></li>
                            <li><a href='logout.php' style='font-family: 'Red Hat Display', sans-serif; font-weight: bold;'>Logout</a></li>
                        </ul>
                    </li>
                    ";
                } else {
                    header('location:logout.php');
                }
                ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>