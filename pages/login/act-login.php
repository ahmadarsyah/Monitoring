<div class="login-box">
<?php
	include "dist/koneksi.php";
	$id_user		= $_POST['id_user'];
	$password		= $_POST['password'];
	$op 			= $_GET['op'];

	if($op=="in"){
		$sql = mysql_query("SELECT * FROM tb_user WHERE id_user='$id_user' AND password='$password'");
		if(mysql_num_rows($sql)==1){
			$qry = mysql_fetch_array($sql);
			$_SESSION['id_user'] = $qry['id_user'];
			$_SESSION['nama_user'] = $qry['nama_user'];
			$_SESSION['hak_akses'] = $qry['hak_akses'];
			
			if($qry['aktif']=="N"){
            echo "<div class='register-logo'><b>Oops!</b> User Tidak Aktif.</div>	
				<div class='register-box-body'>
					<p>Harap tunggu beberapa saat, atau silahkan hubungi Admin Anda.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>";
			}
			else if($qry['hak_akses']=="Admin"){
				header("location:home-admin.php");
			}
			else if($qry['hak_akses']=="Pegawai"){
				header("location:home-pegawai.php");
			}
			else if($qry['hak_akses']=="KADEP_SDM"){
				header("location:home-manajer.php");
			}
			else if($qry['hak_akses']=="HRD"){
				header("location:home-hrd.php");
			}
		}
		else{
			echo "<div class='register-logo'><b>Oops!</b> Login Failed.</div>	
				<div class='register-box-body'>
					<p>Email atau Password tidak sesuai. Silahkan diulang kembali.</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='index.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>";
		}
	}else if($op=="out"){
		unset($_SESSION['id_user']);
		unset($_SESSION['hak_akses']);
		header("location:index.php");
	}
?>
</div>