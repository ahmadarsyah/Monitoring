<section class="content-header">
    <h1>Activated or Deactivate<small>User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Activated or Deactivate User</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['id_user']) AND ($_GET['aktif'])) {
	$id_user	= $_GET['id_user'];
	$aktif 		= $_GET['aktif'];
	}
	else{
		die ("Error. No ID Selected! ");	
	}
	echo "<div class='register-logo'><b>Activated or Deactivate</b> User!</div>	
		<div class='register-box-body'>
			<p>Silahkan tentukan status untuk user <b>$id_user</b></p>
			<p>Status sekarang aktif = <b>$aktif</b></p>
			<div class='row'>
				<div class='col-xs-1'></div>
				<div class='col-xs-5'>
					<div class='box-body box-profile'>
						<a class='btn btn-primary btn-block' href='home-admin.php?page=activated-user&id_user=".$id_user."'>Activated</a>
					</div>
				</div>
				<div class='col-xs-5'>
					<div class='box-body box-profile'>
						<a class='btn btn-warning btn-block' href='home-admin.php?page=deactivate-user&id_user=".$id_user."'>Deactivate</a>
					</div>
				</div>
				<div class='col-xs-1'></div>
			</div>
		</div>";
?>
</div>