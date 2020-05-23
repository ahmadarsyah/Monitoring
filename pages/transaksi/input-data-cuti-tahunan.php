<section class="content-header">
    <h1>Input<small>Data Cuti Tahunan</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Input Data Cuti Tahunan</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {
	$nip				=$_POST['nip'];
	$hak_cuti_tahunan	=$_POST['hak_cuti_tahunan'];
	
		if (empty($_POST['nip']) || empty($_POST['hak_cuti_tahunan'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-hrd.php?page=form-input-data-cuti-tahunan' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else{
		include "dist/koneksi.php";
		$updateHak = "UPDATE tb_pegawai SET hak_cuti_tahunan=hak_cuti_tahunan + $hak_cuti_tahunan WHERE nip='$nip'";
		$query = mysql_query ($updateHak);
		
		if($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data Cuti Tahunan Berhasil.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-hrd.php?page=form-input-data-cuti-tahunan' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>