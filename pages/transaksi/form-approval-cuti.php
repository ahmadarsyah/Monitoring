<section class="content-header">
    <h1>Activated or Deactivate<small>User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Activated or Deactivate User</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['no_cuti']) AND ($_GET['nip']) AND ($_GET['jml_hari']) AND ($_GET['jenis'])) {
	$no_cuti	= $_GET['no_cuti'];
	$nip 		= $_GET['nip'];
	$jml_hari 	= $_GET['jml_hari'];
	$jenis	 	= $_GET['jenis'];
	echo "<div class='register-logo'><b>Activated or Deactivate</b> User!</div>	
		<div class='register-box-body'>
			<p>Silahkan tentukan status untuk user <b>$no_cuti</b></p>
			<div class='row'>
				<div class='col-xs-1'></div>
				<div class='col-xs-5'>
					<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-hrd.php?page=approved-cuti&no_cuti=".$no_cuti."&jml_hari=". $jml_hari ."&nip=". $nip ."'>Approved</a>
					</div> 
				</div>
				<div class='col-xs-5'>
					<div class='box-body box-profile'>
						<a class='btn btn-warning btn-block' href='home-hrd.php?page=not-approved-cuti&no_cuti=".$no_cuti."'>No Approved</a>
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