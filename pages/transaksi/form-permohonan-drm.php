<section class="content-header">
    <h1>Form<small>input drm</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Form input rapat harian</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-pegawai.php?page=permohonan-drm" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-5 control-label">Hari</label>
							<div class="col-sm-4">
								<select name="Hari" class="form-control">
									<option value="">Pilih</option>
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Tanggal</label>
							<div class="col-sm-4">
								<div class="input-group date form_date col-sm-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
									<input type="text" name="Tanggal" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Jam Masuk Kantor</label>
							<div class="col-sm-4">
								<input type="time" name="Jm_msk" class="form-control" maxlength="64">
							</div><p class="col-sm-3">cth 09:00</p>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Jam Mulai Drm</label>
							<div class="col-sm-4">
								<input type="time" name="Jm_mulai" class="form-control" maxlength="64">
							</div><p class="col-sm-3">cth 09:00</p>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Jam Selesai Drm</label>
							<div class="col-sm-4">
								<input type="time" name="Jm_selesai" class="form-control" maxlength="64">
							</div><p class="col-sm-3">cth 09:00</p>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-5 control-label">Kantor</label>
							<div class="col-sm-4">
								<select name="Kantor" class="form-control">
									<option value="">Pilih</option>
									<option value="Pusat">Pusat</option>
									<option value="Cab_pdg">Cabang Pandeglang</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Divisi</label>
							<div class="col-sm-4">
								<select name="Divisi" class="form-control">
								<option value="">Pilih</option>
								<option value="Media">Media</option>
								<option value="Fundraising">Fundraising</option>
								<option value="Humas dan Crm">Humas dan Crm</option>
								<option value="Keuangan">Keuangan</option>
								<option value="SDM">SDM</option>
								<option value="Pendayagunaan">Pendayagunaan</option>
								<option value="Pendistribusian">Pendistribusian</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Pembacaan Visi & Misi</label>
							<div class="col-sm-4">
								<select name="Pembacaan_visi_misi" class="form-control">
									<option value="">Pilih</option>
									<option value="sudah">sudah</option>
									<option value="belum">belum</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Pembacaan Qs attaubah ayat 60 & 103</label>
							<div class="col-sm-4">
								<select name="Pembacaan_attaubah" class="form-control">
									<option value="">Pilih</option>
									<option value="sudah">sudah</option>
									<option value="belum">belum</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Share, like & Comment Medsos</label>
							<div class="col-sm-4">
								<select name="Share_medsos" class="form-control">
									<option value="">Pilih</option>
									<option value="sudah">sudah</option>
									<option value="belum">belum</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Input Muthabaah Yaumiah</label>
							<div class="col-sm-4">
								<select name="Input_muthabaah" class="form-control">
									<option value="">Pilih</option>
									<option value="sudah">sudah</option>
									<option value="belum">belum</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Jam Pulang Hari Sebelumnya</label>
							<div class="col-sm-4">
								<input type="time" name="Jm_plg_sblm" class="form-control" maxlength="64">
							</div><p class="col-sm-3">cth 09:00</p>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Aktivitas Pada Hari Sebelumnya</label>
							<div class="col-sm-4">
								<input type="text" name="Aktivitas_sblm" class="form-control" maxlength="64">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-5 control-label">Pembahasan Drm</label>
							<div class="col-sm-4">
								<input type="text" name="Pembahansan_drm" class="form-control" maxlength="64">
							</div>
						</div>
						<br /><br /><br />
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-5">
								<button type="submit" name="save" value="save" class="btn btn-danger">Kirim</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- datepicker -->
<script type="text/javascript" src="plugins/datepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
	 $('.form_date').datetimepicker({
			language:  'id',
			weekStart: 1,
			todayBtn:  1,
	  autoclose: 1,
	  todayHighlight: 1,
	  startView: 2,
	  minView: 2,
	  forceParse: 0
		});
</script>