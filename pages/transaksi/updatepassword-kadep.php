<?php

include "dist/koneksi.php";
//tangkap data dari ubahdatapegawai.php
$id_pegawai   = mysql_real_escape_string($_POST['id_pegawai']);
$passwordbaru = mysql_real_escape_string($_POST['passwordbaru']);

//update data di database sesuai id_cln
$query = mysql_query("UPDATE tb_user SET password='$passwordbaru' WHERE id_user='$id_pegawai'") or die(mysql_error());

if (empty($_POST['id_pegawai']) || empty($_POST['passwordbaru'])) {
		echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			<div class='box box-primary'>
            <div class='register-box-body control-label col-sm-offset-4 col-sm-4'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-manajer.php?page=ubah-passward-hrd' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			</div>";
	}

if ($query){
			echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
				<div class='register-box-body control-label col-sm-offset-4 col-sm-4'>
					<p>Input Data Izin Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-manajer.php' class='btn btn-danger btn-block btn-flat'>Next >></button>
						</div>
					</div>
				</div>";
		} else {
            echo "<div class='register-logo'><b>Input Data</b> Successful!</div>	
            <div class='register-box-body control-label col-sm-offset-4 col-sm-4'>
					<p>Input Data Izin Berhasil</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-manajer.php?page=ubah-passward-hrd'class='btn btn-block btn-warning'>Back</button>						</div>
					</div>
				</div>";
}
?>
