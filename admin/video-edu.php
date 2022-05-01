<?php
session_start();
include '../dbconnect.php';

if (!isset($_SESSION['log'])) {
	header('location:login_admin.php');
} else if ($_SESSION['role'] != 'Admin') {
    header('location:../error.php');
} else {
};

if (isset($_POST["addvideo"])) {
	$judul = $_POST['judul'];
	$link = $_POST['link'];
	
	$nama_file = $_FILES['uploadgambar']['name'];
	$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
	$random = crypt($nama_file, time());
	$ukuran_file = $_FILES['uploadgambar']['size'];
	$tipe_file = $_FILES['uploadgambar']['type'];
	$tmp_file = $_FILES['uploadgambar']['tmp_name'];
	$path = "../images/" . $random . '.' . $ext;
	$pathdb = "images/" . $random . '.' . $ext;

	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
		if ($ukuran_file <= 5000000) {
			if (move_uploaded_file($tmp_file, $path)) {
				$query = "insert into video (judul, gambar, link)
			  values('$judul', '$pathdb', '$link')";
				$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

				if ($sql) {
					echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
				} else {
					// Jika Gagal, Lakukan :
					echo "Sorry, there's a problem while submitting.";
					echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
				}
			} else {
				// Jika gambar gagal diupload, Lakukan :
				echo "Sorry, there's a problem while uploading the file.";
				echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
			}
		} else {
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Sorry, the file size is not allowed to more than 1mb";
			echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
		}
	} else {
		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		echo "Sorry, the image format should be JPG/PNG.";
		echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
	}
};

if (isset($_POST["hapus"])) {
	$kode = $_POST['idvideo'];
	$query2 = mysqli_query($conn, "delete from video where idvideo='$kode'");
	if ($query2) {
		echo "Berhasil Hapus";
		echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
	} else {
		echo "Gagal Hapus";
		echo "<br><meta http-equiv='refresh' content='3; URL=video-edu.php'> You will be redirected to the form in 3 seconds";
	}
};

// if (isset($_POST["updateproduct"])) {

// 	$namaproduk = $_POST['namaproduk'];
// 	$hargabefore = $_POST['hargabefore'];
// 	$hargaafter = $_POST['hargaafter'];

// 	$kode = $_POST['idproduknya'];

// 	$sql1 = mysqli_query($conn, "update produk (namaproduk, hargabefore, hargaafter) values('$namaproduk','$hargabefore','$hargaafter') where idproduk='$kode'"); // Eksekusi
// };
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Kelola Video Edukasi - SERCOB</title>
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
	
	<?php include'navbar.php'; ?>

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
									<h2>Daftar Video</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Video</button>
								</div>
								<div class="data-tables datatable-dark">
									<table id="dataTable3" class="display" style="width:100%">
										<thead class="thead-dark">
											<tr style="text-align: center;">
												<th>No.</th>
												<th>Gambar</th>
												<th>Judul</th>
												<th>Link Video</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$brgs = mysqli_query($conn, "SELECT * from video order by idvideo ASC");
											$no = 1;
											while ($p = mysqli_fetch_array($brgs)) {
											?>

												<tr style="text-align: center;">
													<form method="post">
														<td><?php echo $no++ ?></td>
														<td><img src="../<?php echo $p['gambar'] ?>" width="100px" height="100px" \></td>
														<td><?php echo $p['judul'] ?></td>
														<td><?php echo $p['link'] ?></td>
														<td>
															<input type="hidden" name="idvideo" value="<?php echo $p['idvideo'] ?>" \>
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
	
	<?php include'footer.php'; ?>

	</div>
	<!-- page container area end -->

	<!-- modal input -->
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Video</h4>
				</div>

				<div class="modal-body">
					<form action="video-edu.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Gambar</label>
							<input name="uploadgambar" type="file" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Judul</label>
							<input name="judul" type="text" class="form-control" required autofocus>
						</div>
						<div class="form-group">
							<label>Link</label>
							<input name="link" type="text" class="form-control" required>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input name="addvideo" type="submit" class="btn btn-primary" value="Tambah">
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- modal update -->
	<!-- <div id="myModal2" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Produk</h4>
				</div>

				<div class="modal-body">
					<form action="produk.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Produk</label>
							<input name="namaproduk" type="text" class="form-control" required autofocus>
						</div>
						<div class="form-group">
							<label>Harga Sebelum Diskon</label>
							<input name="hargabefore" type="number" class="form-control">
						</div>
						<div class="form-group">
							<label>Harga Setelah Diskon</label>
							<input name="hargaafter" type="number" class="form-control">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input name="updateproduct" type="submit" class="btn btn-primary" value="Update">
				</div>
				</form>
			</div>
		</div>
	</div> -->

	<script>
		$(document).ready(function() {
			$('#dataTable3').DataTable({
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