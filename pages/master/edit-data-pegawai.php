<section class="content-header">
    <h1>Edit<small>Data Pegawai</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Edit Data Pegawai</li>
    </ol>
</section>
<div class="register-box">
<?php
	if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$tampilBarang	= mysql_query("SELECT * FROM tb_pegawai WHERE nip='$nip'");
	$hasil	= mysql_fetch_array ($tampilBarang);
				
	if ($_POST['edit'] == "edit") {
		$nama		=$_POST['nama'];
		$jk			=$_POST['jk'];
		$jab		=$_POST['jab'];
		$tmp_lhr	=$_POST['tmp_lhr'];
		$tgl_lhr	=$_POST['tgl_lhr'];
		$Divisi		=$_POST['Divisi'];
		$telp		=$_POST['telp'];
		$alamat		=$_POST['alamat'];
		
		$update= mysql_query ("UPDATE tb_pegawai SET nama='$nama', jk='$jk', tmp_lhr='$tmp_lhr', tgl_lhr='$tgl_lhr', Divisi='$Divisi', telp='$telp', alamat='$alamat' WHERE nip='$nip'");
		if($update){
			echo "<div class='register-logo'><b>Edit</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Edit Data Pegawai ".$nip." Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-admin.php?page=form-master-pegawai' class='btn btn-primary btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
?>
</div>