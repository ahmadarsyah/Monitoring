<section class="content-header">
    <h1>Deactivate<small>User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Deactivate User</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['no_cuti'])) {
	$id_user	= $_GET['no_cuti'];
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	
	include "dist/koneksi.php";
	$deactivate = "UPDATE tb_mohoncuti SET persetujuan='DITOLAK' WHERE no_cuti='$id_user'";
	$query = mysql_query ($deactivate);		
		if($query){
		echo "<div class='register-logo'><b>Deactivate</b> User!</div>	
			<div class='register-box-body'>
				<p>Status Cuti sekarang adalah <b>DITOLAK</b></p>
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
?>
</div>