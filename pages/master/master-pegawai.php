<section class="content-header">
    <h1>Input<small>Data Pegawai</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Input Data Pegawai</li>
    </ol>
</section>
<div class="register-box">
<?php	
	if ($_POST['save'] == "save") {
	$nip			=$_POST['nip'];
	$nama			=$_POST['nama'];
	$jk				=$_POST['jk'];
	$jab			=$_POST['jab'];
	$tmp_lhr		=$_POST['tmp_lhr'];
	$tgl_lhr		=$_POST['tgl_lhr'];
	$Divisi			=$_POST['Divisi'];
	$telp			=$_POST['telp'];
	$alamat			=$_POST['alamat'];
	$cuti			=$_POST['hak_cuti_tahunan'];
	
	include "dist/koneksi.php";
	
		if (empty($_POST['nama']) || empty($_POST['jk']) || empty($_POST['jab']) || empty($_POST['tmp_lhr']) || empty($_POST['tgl_lhr']) || empty($_POST['Divisi']) || empty($_POST['telp']) || empty($_POST['alamat'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-pegawai' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
		}
		
		else{
		$insert = "INSERT INTO tb_pegawai (nip, nama, jk, jab, tmp_lhr, tgl_lhr, Divisi, telp, alamat, hak_cuti_tahunan) VALUES ('$nip', '$nama', '$jk', '$jab', '$tmp_lhr', '$tgl_lhr', '$Divisi', '$telp', '$alamat', '$cuti')";
		$query = mysql_query ($insert);
		
		$insert_user = "INSERT INTO tb_user (id_user, nama_user, password, hak_akses, aktif) VALUES ('$nip', '$nama', '$nip', 'Pegawai', 'N')";
		$query = mysql_query ($insert_user);

		if($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data Pegawai Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-pegawai' class='btn btn-danger btn-block btn-flat'>Next >></button>
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