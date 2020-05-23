<section class="content-header">
    <h1>Data<small>Cuti Tahunan</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data Cuti Tahunan</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
		//fungsi kode otomatis
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
	$tampilPeg=mysql_query("SELECT * FROM tb_pegawai ORDER BY nip");
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <h4 class="panel-title"><i class="fa fa-plus"></i> Add Data Cuti Tahunan<a data-toggle="collapse" data-target="#formaddcuti" href="#formaddcuti" class="collapsed"></a></h4>
							</div>
							<div id="formaddcuti" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-hrd.php?page=input-data-cuti-tahunan" class="form-horizontal" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-3 control-label">Jumlah Cuti Tahunan</label>
											<div class="col-sm-3">
												<?php
												include "dist/koneksi.php";
												$data = mysql_query("SELECT * FROM tb_pegawai");        
												echo '<select name="nip" onchange="changeValue(this.value)" class="form-control">';    
												echo '<option value="">Pilih NIP</option>';    
												while ($row = mysql_fetch_array($data)) {    
													echo '<option value="'.$row['nip'].'">'. $row['nip'].' - '.$row['nama'].'</option>';    
												}    
												echo '</select>';
												?>
											</div>
											<div class="col-sm-3">
												<input type="text" name="hak_cuti_tahunan" class="form-control" placeholder="Jumlah" maxlength="2">
											</div>
											<div class="col-sm-3">
												<button type="submit" name="save" value="save" class="btn btn-danger">Save</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama</th>
								<th>Sisa Hak Cuti Tahunan</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($peg=mysql_fetch_array($tampilPeg)){
						?>	
							<tr>
								<td><?php echo $peg['nip'];?></td>
								<td><?php echo $peg['nama'];?></td>
								<td align="center"><?php echo $peg['hak_cuti_tahunan'];?> Hari</td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
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