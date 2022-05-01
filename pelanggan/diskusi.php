<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION['log'])) {
	header('location:../login.php');
} else if ($_SESSION['role'] != 'Member') {
	header('location:../error.php');
} else {
};

$uid = $_SESSION['id'];
$info = mysqli_query($conn, "select * from login where userid='$uid'");
$d = mysqli_fetch_array($info);

if (isset($_POST["add"])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$isi = $_POST['isi'];

	$query = "insert into diskusi (nama, email, isi) values('$nama','$email','$isi')";
	$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

	if ($sql) {
		echo "<br><meta http-equiv='refresh' content='3; URL=diskusi.php'> You will be redirected to the form in 3 seconds";
	} else {
		// Jika Gagal, Lakukan :
		echo "Sorry, there's a problem while submitting.";
		echo "<br><meta http-equiv='refresh' content='3; URL=diskusi.php'> You will be redirected to the form in 3 seconds";
	}
};

if (isset($_POST["hapus"])) {
	$iddiskusi = $_POST['iddiskusi'];
	$query2 = mysqli_query($conn, "delete from diskusi where iddiskusi='$iddiskusi'");
	if ($query2) {
		echo "Berhasil Hapus";
		echo "<br><meta http-equiv='refresh' content='3; URL=diskusi.php'> You will be redirected to the form in 3 seconds";
	} else {
		echo "Gagal Hapus";
		echo "<br><meta http-equiv='refresh' content='3; URL=diskusi.php'> You will be redirected to the form in 3 seconds";
	}
};
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Panel Diskusi - SERCOB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/metisMenu.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.min.css">

	<!-- icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../icon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../icon/favicon-16x16.png">
	<link rel="manifest" href="../icon/site.webmanifest">
	<!-- //icon -->

	<!-- amchart css -->
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

	<!-- others css -->
	<link rel="stylesheet" href="assets/css/typography.css">
	<link rel="stylesheet" href="assets/css/default-css.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<!-- modernizr css -->
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!-- preloader area start -->
	<div id="preloader">
		<div class="loader"></div>
	</div>
	<!-- preloader area end -->
	<!-- page container area start -->
	<div class="page-container">
		<!-- sidebar menu area start -->
		<div class="sidebar-menu">
			<div class="main-menu">
				<div class="menu-inner">
					<nav>
						<ul class="metismenu" id="menu">
							<li><a href="index.php"><i class="ti-home"></i><span>Home</span></a></li>
							<li><a href="../index.php"><i class="ti-dashboard"></i><span>Kembali ke Halaman Awal</span></a></li>
							<li>
								<a href="info_akun.php"><i class="ti-panel"></i><span>Kelola Akun</span></a>
							</li>
							<li class="active">
								<a href="diskusi.php"><i class="ti-comments"></i><span>Panel Diskusi</span></a>
							</li>
							<li>
								<a href="logout.php"><i class="ti-share-alt"></i><span>Logout</span></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- sidebar menu area end -->
		<!-- main content area start -->
		<div class="main-content">
			<!-- header area start -->
			<div class="header-area">
				<div class="row align-items-center">
					<!-- nav and search button -->
					<div class="col-md-6 col-sm-8 clearfix">
						<div class="nav-btn pull-left">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
					<!-- profile info & task notification -->
					<div class="col-md-6 col-sm-4 clearfix">
						<ul class="notification-area pull-right">
							<li>
								<h3>
									<div class="date">
										<script type='text/javascript'>
											<!--
											var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
											var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
											var date = new Date();
											var day = date.getDate();
											var month = date.getMonth();
											var thisDay = date.getDay(),
												thisDay = myDays[thisDay];
											var yy = date.getYear();
											var year = (yy < 1000) ? yy + 1900 : yy;
											document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
											//
											-->
										</script></b>
									</div>
								</h3>

							</li>
						</ul>
					</div>
				</div>
			</div>


			<!-- page title area end -->
			<div class="main-content-inner">

				<!-- market value area start -->
				<div class="row mt-5 mb-5">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="d-sm-flex justify-content-between align-items-center">
									<h2>Panel Diskusi</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Topik</button>
								</div>
								<div class="data-tables datatable-dark" style="overflow-x: auto;">
									<table class="display" style="width:100%; margin:auto;">
										<thead class="thead-dark">
											<tr style="text-align: center; margin: auto;">
												<th style="padding: 10px;">No.</th>
												<th style="padding: 10px;">Nama</th>
												<th style="padding: 10px;">Email</th>
												<th style="padding: 10px;">Topik Diskusi</th>
												<th style="padding: 10px;">Balasan</th>
												<th style="padding: 10px;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$brgs = mysqli_query($conn, "SELECT login.userid, login.namalengkap, login.email, diskusi.iddiskusi, diskusi.isi, diskusi.balasan from login left join diskusi on login.email=diskusi.email where userid='$uid'");
											$no = 1;
											while ($p = mysqli_fetch_array($brgs)) {
											?>

												<tr style="text-align: center; margin: auto;">
													<form method="post">
														<td style="padding: 10px;"><?php echo $no++ ?></td>
														<td style="padding: 10px; overflow-wrap: break-word;"><?php echo $p['namalengkap'] ?></td>
														<td style="padding: 10px; overflow-wrap: break-word;"><?php echo $p['email'] ?></td>
														<td style="padding: 10px; overflow-wrap: break-word; text-align: justify;"><?php echo $p['isi'] ?></td>
														<td style="padding: 10px; overflow-wrap: break-word; text-align: justify;"><?php echo $p['balasan'] ?></td>
														<td style="padding: 10px; overflow-wrap: break-word;">
															<button class="btn btn-warning form-control">
																<a href="edit-post.php?id=<?php echo $p['iddiskusi']; ?>" style="color: white;">Edit</a>
															</button>
															<input type="hidden" name="iddiskusi" value="<?php echo $p['iddiskusi'] ?>" \>
															<input type="submit" name="hapus" class="form-control btn-danger" value="Hapus" \>
														</td>
													</form>
												</tr>

											<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- row area start-->
		</div>
	</div>
	<!-- main content area end -->
	<!-- footer area start-->
	<footer>
		<div class="footer-area">
			<p>© 2021 SERCOB. All Rights Reserved</p>
		</div>
	</footer>
	<!-- footer area end-->
	</div>
	<!-- page container area end -->

	<!-- modal input -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Topik Diskusi</h4>
				</div>

				<div class="modal-body">
					<form action="diskusi.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama</label>
							<input name="nama" type="text" class="form-control" value="<?php echo $d['namalengkap']; ?>" required autofocus readonly>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input name="email" type="text" class="form-control" value="<?php echo $d['email']; ?>" required readonly>
						</div>
						<div class="form-group">
							<label>Diskusi</label>
							<textarea name="isi" cols="30" class="form-control" rows="10" placeholder="Isi pertanyaan/pernyataan anda" required></textarea>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input name="add" type="submit" class="btn btn-primary" value="Tambah">
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- jquery latest version -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!-- bootstrap 4 js -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/jquery.slimscroll.min.js"></script>
	<script src="assets/js/jquery.slicknav.min.js"></script>
	<!-- Start datatable js -->
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<!-- start chart js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
	<!-- start highcharts js -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<!-- start zingchart js -->
	<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
	<script>
		zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
		ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
	</script>
	<!-- all line chart activation -->
	<script src="assets/js/line-chart.js"></script>
	<!-- all pie chart -->
	<script src="assets/js/pie-chart.js"></script>
	<!-- others plugins -->
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>

</html>