<section class="content-header">
    <h1>Input<small>Data User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Input Data User</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {
	$id_user	=$_POST['id_user'];
	$nama_user	=$_POST['nama_user'];
	$password	=$_POST['password'];
	$hak_akses	=$_POST['hak_akses'];
	
	include "dist/koneksi.php";
	$cekuser	=mysql_num_rows (mysql_query("SELECT id_user FROM tb_user WHERE id_user='$_POST[id_user]'"));
	
		if (empty($_POST['id_user']) || empty($_POST['nama_user']) || empty($_POST['password']) || empty($_POST['hak_akses'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else if($cekuser > 0) {
		echo "<div class='register-logo'><b>Oops!</b> ID User Not Available</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan ID User yang Anda masukan benar.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else{
		$insert = "INSERT INTO tb_user (id_user, nama_user, password, hak_akses, aktif) VALUES ('$id_user', '$nama_user', '$password', '$hak_akses', 'Y')";
		$query = mysql_query ($insert);
		
		if($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data User Berhasil.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-user' class='btn btn-danger btn-block btn-flat'>Next >></button>
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