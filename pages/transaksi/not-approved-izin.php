<section class="content-header">
    <h1>Izin<small>Pegawai</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Izin Pegawai</li>
    </ol>
</section>
<div class="register-box">
<?php
	//error_reporting(
//		E_ALL^(E_NOTICE | E_WARNING)
//	);
	include "dist/koneksi.php";
	if (!isset($_POST['id_telat'])) {
	$id_telat	= $_GET['id_telat'];
	$activated = "UPDATE telat SET persetujuan='DITOLAK' WHERE id_telat = '$id_telat' ";
	$query = mysql_query ($activated);		
		if($query){
		echo "<div class='register-logo'><b>Izin</b> Pegawai!</div>	
			<div class='register-box-body'>
				<p>Status user  sekarang adalah <b>DITOLAK</b></p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
							<a class='btn btn-primary btn-block' href='home-hrd.php?page=pre-approval-izin'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
	}else{
		die ("Error. No ID Selected! ");
	}
	
?>
</div>