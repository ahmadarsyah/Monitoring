<section class="content-header">
    <h1>Laporan<small>Drm Bulanan</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-manajer.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Laporan Bulanan</li>
    </ol>
</section>
            <?php
               include "dist/koneksi.php";
            ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><i class="fa fa-plus"></i> Add Laporan<a data-toggle="collapse" data-target="#formpegawai" href="#formpegawai" class="collapsed"></a></h4>
					</div>
			<div id="formpegawai" class="panel-collapse collapse">
			<div class="panel-body">
            <form action="cetak_lap.php" class="form-horizontal" method="POST" enctype="multipart/form-data" name="postform">
                <div class="box-body">
                <div class="form-group">
							<label class="col-sm-3 control-label">Dari Tanggal</label>
							<div class="col-sm-4">
								<div class="input-group date form_date col-sm-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
									<input type="text" name="dari" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label class="col-sm-3 control-label">Sampe Tanggal</label>
							<div class="col-sm-4">
								<div class="input-group date form_date col-sm-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
									<input type="text" name="sampai" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							</div>
						</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-7">
										<!--<input type="submit" value="Pencarian Data" name="pencarian" class="btn btn-danger"/>-->
										<input type="reset" value="Reset" class="btn btn-danger"/>
										<input type="submit" class="btn btn-primary" value="Export PDF" name="pdf">
									</div>
								</div>
                    </div>
					</div>
					</div>
					</div>
				</div>
                
            </form>
            <?php
                //proses jika sudah klik tombol pencarian data
                if(isset($_POST['pencarian'])){
                //menangkap nilai form
                $tanggal_awal=$_POST['dari'];
                $tanggal_akhir=$_POST['sampai'];
                if(empty($tanggal_awal) || empty($tanggal_akhir)){
                //jika data tanggal kosong
                echo "<div class='register-logo'><b>Oops!</b> Data Tidak Lengkap.</div>
			    <div class='box box-primary'>
				<div class='register-box-body'>
					<p>Harap periksa kembali dan pastikan data yang Anda masukan lengkap dan benar</p>
					<div class='row'>
						<div class='col-xs-8'></div>
						<div class='col-xs-4'>
							<button type='button' onclick=location.href='home-manajer.php' class='btn btn-block btn-warning'>Back</button>
						</div>
					</div>
				</div>
			    </div>";
                }
                else {
                    $query=mysql_query("SELECT td.Id_drm, b.nama, td.Tanggal, td.Jm_msk, td.Jm_mulai, td.Jm_selesai, td.Divisi, td.Kantor
                    FROM drm as td, tb_pegawai as b WHERE b.nip=td.nip AND Tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir'");
                }
            ?>
            </p>
            <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Tanggal</th>
								<th>Jam Masuk Kantor</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>Divisi</th>
								<th>Kantor</th>
							</tr>
						</thead>
						<tbody>	
							<?php
							while($user=mysql_fetch_array($query)){
						?>	
							<tr>
								<td><?php echo $user ['Id_drm'];?></td>
								<td><?php echo $user ['nama'];?></td>
								<td><?php echo $user ['Tanggal'];?></td>
								<td><?php echo $user ['Jm_msk'];?></td>
								<td><?php echo $user ['Jm_mulai'];?></td>
								<td><?php echo $user ['Jm_selesai'];?></td>
								<td><?php echo $user ['Divisi'];?></td>
								<td><?php echo $user ['Kantor'];?></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
            <?php
            }
            else{
                unset($_POST['pencarian']);
            }
            ?>
            
        </div>
			</div>
        </div>
	</div>
</section>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
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

