<section class="content-header">
    <h1>Form<small>Izin telat & izin meninggalkan kantor</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Form izin telat</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form action="home-pegawai.php?page=permohonan-telat" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
										<label class="col-sm-3 control-label">Divisi</label>
											<div class="col-sm-4">
												<select name="divisi" class="form-control">
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
							<label class="col-sm-3 control-label">Departemen</label>
							<div class="col-sm-4">
								<select name="departemen" class="form-control">
									<option value="">Pilih</option>
									<option value="Humas & Media">Humas dan Media</option>
									<option value="Keuangan & Sdm">Keuangan dan Sdm</option>
									<option value="Program">Program</option>
								</select>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Jenis Izin</label>
							<div class="col-sm-4">
								<select name="jenis_izin" class="form-control">
									<option value="">Pilih</option>
									<option value="Telat Masuk">Telat Masuk</option>
									<option value="Meninggalkan Kantor">Meninggalkan Kantor</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal</label>
							<div class="col-sm-4">
								<div class="input-group date form_date col-sm-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
									<input type="text" name="tanggal" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Hari</label>
							<div class="col-sm-4">
								<input type="text" name="hari" class="form-control" maxlength="64">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Jam Izin</label>
							<div class="col-sm-4">
								<input type="time" name="jam_izin" class="form-control" maxlength="64">
							</div><p>cth 09:00</p>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Lama Izin</label>
							<div class="col-sm-4">
								<input type="text" name="lama_izin" class="form-control" maxlength="64">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Alasan Izin</label>
							<div class="col-sm-4">
								<input type="text" name="alasan_izin" class="form-control" maxlength="64">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kegiatan yang ditinggalkan</label>
							<div class="col-sm-4">
								<input type="text" name="keg_kantor" class="form-control" maxlength="64">
							</div>
						</div>
						<br /><br /><br />
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-7">
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