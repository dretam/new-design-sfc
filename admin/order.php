<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION['log'])) {
	header('location:login-admin.php');
} else if ($_SESSION['role'] != 'Admin') {
	header('location:../error.php');
} else {
};

$orderids = $_GET['orderid'];
$liatcust = mysqli_query($conn, "select * from login l, cart c where orderid='$orderids' and l.userid=c.userid");
$checkdb = mysqli_fetch_array($liatcust);
date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['kirim'])) {
	$updatestatus = mysqli_query($conn, "update cart set status='Progress' where orderid='$orderids'");

	if ($updatestatus) {
		echo " <div class='alert alert-success'>
			<center>Pesanan diproses!</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= manageorder.php'/>  ";
	} else {
		echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= manageorder.php'/> ";
	}
};

if (isset($_POST['selesai'])) {
	$updatestatus = mysqli_query($conn, "update cart set status='Selesai' where orderid='$orderids'");

	if ($updatestatus) {
		echo " <div class='alert alert-success'>
			<center>Transaksi diselesaikan!</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= manageorder.php'/>  ";
	} else {
		echo "<div class='alert alert-warning'>
			Gagal submit, silakan coba lagi!
		  </div>
		 <meta http-equiv='refresh' content='1; url= manageorder.php'/> ";
	}
};

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SFC - Pesanan <?php echo strtok($checkdb['namalengkap'], " "); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/metisMenu.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.min.css">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
	<link rel="manifest" href="../assets/icon/site.webmanifest">
	<link rel="mask-icon" href="../assets/icon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

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

		<?php include 'navbar.php'; ?>

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
										</script></b>
									</div>
								</h3>

							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- header area end -->


			<!-- page title area end -->
			<div class="main-content-inner">

				<!-- market value area start -->
				<div class="row mt-5 mb-5">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="d-sm-flex justify-content-between align-items-center">
									<h3>Order ID : #<?php echo $orderids ?></h3>

								</div>
								<p><?php echo $checkdb['namalengkap']; ?>
									(<?php
										$email = $checkdb['email'];
										echo "<a href='mailto:'.$email.'' target=_blank>$email</a>"
										?>)
								</p>
								<p>No. Telepon : <?php echo $checkdb['notelp']; ?></p>
								<p>Waktu Order : <?php echo $checkdb['tglorder']; ?></p>

								<?php
								?>
								<div class="data-tables datatable-dark">
									<table id="dataTable3" class="display" style="width:100%">
										<thead class="thead-dark">
											<tr style="text-align: center;">
												<th>No</th>
												<th>Layanan</th>
												<th hidden>Jumlah</th>
												<th>Institusi</th>
												<th>Nama Lengkap</th>
												<th>Tanggal Order</th>
												<th>Total</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$brgs = mysqli_query($conn, "SELECT * from detailorder d, layanan l where orderid='$orderids' and d.idlayanan=l.idlayanan order by d.idlayanan ASC");
											$no = 1;
											while ($p = mysqli_fetch_array($brgs)) {
												$total = $p['qty'] * $p['hargaafter'];

												$result = mysqli_query($conn, "SELECT SUM(d.qty*l.hargaafter) AS count FROM detailorder d, layanan l where orderid='$orderids' and d.idlayanan=l.idlayanan order by d.idlayanan ASC");
												$row = mysqli_fetch_assoc($result);
												$cekrow = mysqli_num_rows($result);
												$count = $row['count'];

											?>

												<tr style="text-align: center;">
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['namalayanan'] ?></td>
													<td hidden><?php echo $p['qty'] ?></td>
													<td>
														<?php
														echo $checkdb['institusi'];
														?>
													</td>
													<td><?php echo $checkdb['namalengkap']; ?></td>
													<td><?php echo $checkdb['tglorder']; ?></td>
													<td>Rp <?php echo number_format($total) ?></td>
												</tr>


											<?php
											}
											?>
										</tbody>
										<tfoot>
											<tr style="text-align: center;">
												<th colspan="6" style="text-align:right">Total: Rp <?php
																									$result1 = mysqli_query($conn, "SELECT SUM(d.qty*l.hargaafter) AS count FROM detailorder d, layanan l where orderid='$orderids' and d.idlayanan=l.idlayanan order by d.idlayanan ASC");
																									$cekrow = mysqli_num_rows($result1);
																									$row1 = mysqli_fetch_assoc($result1);
																									$count = $row1['count'];
																									if ($cekrow > 0) {
																										echo number_format($count);
																									} else {
																										echo 'No data';
																									} ?></th>
											</tr>
										</tfoot>
									</table>

								</div>
								<br>
								<?php

								if ($checkdb['status'] == 'Confirmed') {
									$ambilinfo = mysqli_query($conn, "select * from konfirmasi where orderid='$orderids'");
									while ($tarik = mysqli_fetch_array($ambilinfo)) {
										$met = $tarik['payment'];
										$namarek = $tarik['namarek'];
										$tglb = $tarik['tglbayar'];
										echo '
										Informasi Pembayaran
									<div class="data-tables datatable-dark">
									<table id="dataTable2" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th><center>Metode</center></th>
												<th><center>Nama Pembayar</center></th>
												<th><center>Tanggal Pembayaran</center></th>
												
											</tr></thead><tbody>
											<tr>
											<td><center>' . $met . '</center></td>
											<td><center>' . $namarek . '</center></td>
											<td><center>' . $tglb . '</center></td>
											</tr>
											</tbody>
										</table>
									</div>
									<br><br>
									<form method="post">
									<input type="submit" name="kirim" class="form-control btn btn-success" value="Kirim" \>
									</form>
									';
									};
								} else {
									echo '
									<form method="post">
									<input type="submit" name="selesai" class="form-control btn btn-success" value="Selesaikan" \>
									</form>
									';
								}
								?>
								<br>
							</div>

						</div>
					</div>
				</div>





				<!-- row area start-->
			</div>
		</div>
		<!-- main content area end -->

		<?php include 'footer.php'; ?>

	</div>
	<!-- page container area end -->



	<script type="text/javascript">
		$(document).ready(function() {
			$('#dataTable3').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'print'
				]
			});
		});
		$(document).ready(function() {
			$('#dataTable2').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'print'
				]
			});
		});
	</script>

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
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

	<!-- others plugins -->
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/scripts.js"></script>


</body>

</html>