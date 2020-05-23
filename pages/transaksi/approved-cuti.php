<section class="content-header">
    <h1>Approved<small>User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Deactivate User</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['no_cuti']) AND ($_GET['jml_hari']) AND ($_GET['nip'])) {
	$id_user	= $_GET['no_cuti'];
	$jml_hari = $_GET['jml_hari'];
	$nip = $_GET['nip'];
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$deactivate = "UPDATE tb_mohoncuti  SET persetujuan='DISETUJUI' WHERE no_cuti='$id_user'";
	$query = mysql_query ($deactivate);	
	$kurang_query = "UPDATE tb_pegawai SET hak_cuti_tahunan = hak_cuti_tahunan - $jml_hari WHERE nip= '$nip'";
	$query2 = mysql_query($kurang_query);	
	if(!$query2){
		die("Query error!" . mysql_error());
	}
		if($query && $query2){
		echo "<div class='register-logo'><b>Approved</b> User!</div>	
			<div class='register-box-body'>
				<p>Status Cuti sekarang adalah <b>DISETUJUI</b></p>
				<div class='row'>
					<div class='col-xs-8'></div>
					<div class='col-xs-4'>
						<div class='box-body box-profile'>
							<a class='btn btn-primary btn-block' href='home-hrd.php?page=pre-approval-cuti'>OK</a>
						</div>
					</div>
				</div>
			</div>";
		}
?>
</div>