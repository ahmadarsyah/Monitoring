<?php
session_start();
if(!isset($_SESSION['id_user'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hak_akses']!="HRD"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan HRD.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi Monitoring Online</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="dist/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="dist/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/bootstrap-datetimepicker.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<script type="text/javascript" src="plugins/datatables/jquery.js"></script>
	<link href="img/logo.png" rel="shortcut icon" type="image/x-icon" />
			
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<?php
	include "dist/koneksi.php";
	$tampilCuti=mysql_query("SELECT * FROM tb_mohoncuti WHERE persetujuan='' ORDER BY tgl DESC");
	$jmlcut=mysql_num_rows($tampilCuti);
	
	$tampilIzin=mysql_query("SELECT * FROM telat WHERE persetujuan='' ORDER BY tanggal DESC");
	$jml_izin=mysql_num_rows($tampilIzin);
?>
<body class="hold-transition skin-red fixed sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		<a href="home-hrd.php" class="logo"><span class="logo-mini">CUTI</span><span class="logo-lg"><b>Monitoring</b> Online</span></a>
		<nav class="navbar navbar-static-top" role="navigation">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-inbox"></i><span class="label label-warning"><?=$jmlcut?></span></a>
						<ul class="dropdown-menu">
							<li class="header">Anda memiliki <?=$jmlcut?> permohonan cuti</li>
						</ul>
					</li>
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src='dist/img/profile/no-image.jpg' class='user-image' alt='User Image'>
							<span class="hidden-xs">Aplikasi Monitoring Online</span> &nbsp;<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img src='dist/img/profile/no-image.jpg' class='img-circle' alt='User Image'>
								<p>Welcome - <?php echo $_SESSION['nama_user'] ?><small><?php echo $_SESSION['hak_akses'] ?></small></p>
							</li>
							<li class="user-body">
								<div class="row">
								</div>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<?php echo date("d-m-Y");?>
								</div>
								<div class="pull-right">
								  <a href="pages/login/act-logout.php" class="btn btn-default btn-flat">Log out</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				<li class="header">MAIN NAVIGATION</li>
				<li class="treeview"><a href="home-hrd.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></i></a></li>
				<li class="treeview"><a href="home-hrd.php?page=form-input-data-cuti-tahunan"><i class="fa fa-book"></i> <span>Input Data Cuti Tahunan</span></a></li>
				<li class="treeview"><a href="home-hrd.php?page=pre-approval-cuti"><i class="fa fa-gear"></i> <span>Approval Cuti</span><small class="label pull-right bg-yellow"><?=$jmlcut?></small></a></li>
				<li class="treeview"><a href="home-hrd.php?page=pre-approval-izin"><i class="fa fa-gear"></i> <span>Approval Izin</span><small class="label pull-right bg-yellow"><?=$jml_izin?></small></a></li>
				<li class="treeview"><a href="home-hrd.php?page=history-cuti-hrd"><i class="fa fa-exchange"></i> <span>History</span></a></li>
				<li class="treeview"><a href="home-hrd.php?page=ubah-passward-hrd"><i class="pe-7s-note2"></i><span>Ubah Password</span></i></a></li>
			</ul>
		</section>
	</aside>
	<div class="content-wrapper">
		<section class="content">
			<?php
				$page = (isset($_GET['page']))? $_GET['page'] : "main";
				switch ($page) {
					case 'form-input-data-cuti-tahunan': include "pages/transaksi/form-input-data-cuti-tahunan.php"; break;
					case 'input-data-cuti-tahunan': include "pages/transaksi/input-data-cuti-tahunan.php"; break;
					case 'pre-approval-cuti': include "pages/transaksi/pre-approval-cuti.php"; break;
					case 'pre-approval-izin': include "pages/transaksi/pre-approval-izin.php"; break;
					case 'form-approval-cuti': include "pages/transaksi/form-approval-cuti.php"; break;
					case 'form-approval-izin': include "pages/transaksi/form-approval-izin.php"; break;
					case 'approved-cuti': include "pages/transaksi/approved-cuti.php"; break;
					case 'approved-izin': include "pages/transaksi/approved-izin.php"; break;
					case 'not-approved-cuti': include "pages/transaksi/not-approved-cuti.php"; break;
					case 'not-approved-izin': include "pages/transaksi/not-approved-izin.php"; break;
					case 'history-cuti-hrd': include "pages/view/history-cuti-hrd.php"; break;
					case 'ubah-passward-hrd': include "pages/transaksi/ubahpassword-hrd.php"; break;
					case 'update-passward-hrd': include "pages/transaksi/updatepassword-hrd.php"; break;
					default : include 'dashboard.php';	
				}
			?>
		</section>
	</div>
	<footer class="main-footer">
	<center> ® Tugas Akhir 2020 | © Ardiansyah </center>
	</footer>
</div>
	<!-- ./wrapper -->
	<!-- jQuery 2.1.4 -->
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.5 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="plugins/morris/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/knob/jquery.knob.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
</html>