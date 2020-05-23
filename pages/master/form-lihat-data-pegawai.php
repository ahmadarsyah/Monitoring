<?php
	if (isset($_GET['nip'])) {
	$nip = $_GET['nip'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "dist/koneksi.php";
	$ambilData=mysql_query("SELECT * FROM tb_pegawai WHERE nip='$nip'");
	$hasil=mysql_fetch_array($ambilData);
		$nip = $hasil['nip'];
?>
<section class="content-header">
    <h1>Form<small>Lihat Data Pegawai <b>#<?=$nip?></b></small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Lihat Data Pegawai</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['nama'];?>" disabled="disabled" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['jk'];?>" disabled="disabled" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jabatan</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['jab'];?>" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?=$hasil['tmp_lhr'];?>" disabled="disabled">
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" value="<?=$hasil['tgl_lhr'];?>" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Divisi</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['Divisi'];?>" disabled="disabled">
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-sm-3 control-label">Divisi</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['agama'];?>" disabled="disabled">
							</div>
						</div>-->
						<!--<div class="form-group">
							<label class="col-sm-3 control-label">Status</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['status'];?>" disabled="disabled">
							</div>
						</div>-->
						<div class="form-group">
							<label class="col-sm-3 control-label">No. Telp</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" value="<?=$hasil['telp'];?>" disabled="disabled">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Alamat</label>
							<div class="col-sm-7">
								<textarea type="text" class="form-control" disabled="disabled"><?=$hasil['alamat'];?></textarea>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>