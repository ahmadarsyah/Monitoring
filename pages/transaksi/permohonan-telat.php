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
	$id_telat	=kdauto("telat","");
	$nip		=$_SESSION['id_user'];
	
		
	if ($_POST['save'] == "save") {
	$divisi 		=$_POST['divisi'];
	$departemen 	=$_POST['departemen'];
	$jenis_izin		=$_POST['jenis_izin'];
	$tanggal		=$_POST['tanggal'];
	$hari			=$_POST['hari'];
	$jam_izin		=$_POST['jam_izin'];
	$lama_izin		=$_POST['lama_izin'];
	$alasan_izin	=$_POST['alasan_izin'];
	$keg_kantor		=$_POST['keg_kantor'];
	
	
	if (empty($_POST['divisi']) || empty($_POST['departemen']) || empty($_POST['jenis_izin']) || empty($_POST['tanggal']) || empty($_POST['hari']) || empty($_POST['jam_izin']) || empty($_POST['lama_izin']) || empty($_POST['alasan_izin'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-pegawai.php?page=form-permohonan-telat' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
	}

	else{
		$insert = "INSERT INTO telat (id_telat, nip, divisi, departemen, jenis_izin, tanggal, hari, jam_izin, lama_izin, alasan_izin, keg_kantor) VALUES 
		('$id_telat','$nip','$divisi','$departemen','$jenis_izin', '$tanggal', '$hari', '$jam_izin', '$lama_izin', '$alasan_izin','$keg_kantor')";
		$query = mysql_query ($insert);

		$tampildrm=mysql_query("SELECT td.Id_drm, b.nama, td.Tanggal, td.Jm_msk, td.Jm_mulai, td.Jm_selesai, td.Divisi, td.Kantor
		FROM drm as td, tb_pegawai as b WHERE b.nip=td.nip");

		while($user=mysql_fetch_array($tampildrm)){

		$id=($user['Id_drm']);
		}
		$insert_lap = "INSERT INTO rekap_bulanan (id_telat, Id_drm, nip, Tanggal) VALUES ('$id_telat','$id','$nip','$tanggal')";
		$query = mysql_query ($insert_lap);
		
		
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
			}
		}
	}
?>
</div>