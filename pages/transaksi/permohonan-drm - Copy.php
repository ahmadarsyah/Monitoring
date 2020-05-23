<section class="content-header">
    <h1>Permohonan<small>Izin</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Permohonan Izin</li>
    </ol>
</section>
<div class="register-box">
<?php
	include "dist/koneksi.php";
	function kdauto($tabel, $inisial){
		$struktur   = mysql_query("SELECT * FROM $tabel");
		$field      = mysql_field_name($struktur,0);
		$panjang    = mysql_field_len($struktur,0);
		$qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
		$row  = mysql_fetch_array($qry);
		if ($row[0]=="") {
		$angka=0;
		}
		else {
		$angka= substr($row[0], strlen($inisial));
		}
		$angka++;
		$angka      =strval($angka);
		$tmp  ="";
		for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
		}
		return $inisial.$tmp.$angka;
	}
	$Id_drm		=kdauto("drm","");
	$nip		=$_SESSION['id_user'];
	
		
	if ($_POST['save'] == "save") {
	$Hari 					=$_POST['Hari'];
	$Tanggal 				=$_POST['Tanggal'];
	$Jm_msk					=$_POST['Jm_msk'];
	$Jm_mulai				=$_POST['Jm_mulai'];
	$Jm_selesai				=$_POST['Jm_selesai'];
	$Kantor					=$_POST['Kantor'];
	$Divisi					=$_POST['Divisi'];
	$Pembacaan_visi_misi	=$_POST['Pembacaan_visi_misi'];
	$Pembacaan_attaubah		=$_POST['Pembacaan_attaubah'];
	$Share_medsos			=$_POST['Share_medsos'];
	$Input_muthabaah		=$_POST['Input_muthabaah'];
	$Jm_plg_sblm			=$_POST['Jm_plg_sblm'];
	$Aktivitas_sblm			=$_POST['Aktivitas_sblm'];
	$Pembahansan_drm		=$_POST['Pembahansan_drm'];
	
	
	if (empty($_POST['Hari']) || empty($_POST['Tanggal']) || empty($_POST['Jm_msk']) || empty($_POST['Jm_mulai']) || empty($_POST['Jm_selesai']) || empty($_POST['Kantor']) || empty($_POST['Divisi']) || empty($_POST['Pembacaan_visi_misi'])
	|| empty($_POST['Pembacaan_attaubah']) || empty($_POST['Share_medsos']) || empty($_POST['Input_muthabaah']) || empty($_POST['Jm_plg_sblm']) || empty($_POST['Aktivitas_sblm']) || empty($_POST['Pembahansan_drm'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-pegawai.php?page=form-permohonan-drm' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
	}

	else{
		$insert = "INSERT INTO drm (Id_drm, nip, Hari, Tanggal, Jm_msk, Jm_mulai, Jm_selesai, Kantor, Divisi, Pembacaan_visi_misi, Pembacaan_attaubah, Share_medsos, Input_muthabaah, Jm_plg_sblm, Aktivitas_sblm, Pembahansan_drm) VALUES 
		('$Id_drm','$nip','$Hari','$Tanggal','$Jm_msk', '$Jm_mulai', '$Jm_selesai', '$Kantor', '$Divisi', '$Pembacaan_visi_misi','$Pembacaan_attaubah','$Share_medsos','$Input_muthabaah','$Jm_plg_sblm','$Aktivitas_sblm', '$Pembahansan_drm')";
		$query = mysql_query ($insert);
		
		
		if($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body'>
					<p>Input Data Izin Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-pegawai.php' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
				echo mysql_error();
			}
		}
	}
?>
</div>