<section class="content-header">
    <h1>Activated or Deactivate<small>User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Activated or Deactivate User</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_telat']) AND ($_GET['nip']) AND ($_GET['jenis_izin'])) {
	$id_telat	= $_GET['id_telat'];
	$nip 		= $_GET['nip'];
	$jenis 		= $_GET['jenis_izin'];
	echo "<div class='register-logo'><b>Activated or Deactivate</b> User!</div>	
		<div class='register-box-body'>
			<p>Silahkan tentukan status untuk user <b>$id_telat</b></p>
			<div class='row'>
				<div class='col-xs-1'></div>
				<div class='col-xs-5'>
					<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-hrd.php?page=approved-izin&id_telat=".$id_telat."'>Approved</a>
					</div>
				</div>
				<div class='col-xs-5'>
					<div class='box-body box-profile'>
						<a class='btn btn-warning btn-block' href='home-hrd.php?page=not-approved-izin&id_telat=".$id_telat."'>No Approved</a>
					</div>
				</div>
				<div class='col-xs-1'></div>
			</div>
		</div>";

	}else{
		die ("Error. No ID Selected! ");
			
	}
	?>
</div>