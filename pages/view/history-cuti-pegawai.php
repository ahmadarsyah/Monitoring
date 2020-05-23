<section class="content-header">
    <h1>History<small>Cuti</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">History Cuti</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilUser=mysql_query("SELECT * FROM 	tb_mohoncuti WHERE nip='$_SESSION[id_user]' "); 
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div>
						
					</div>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No. Cuti</th>
								<th>Tgl Pengajuan</th>
								<th>Jumlah Hari</th>
								<th>Dari Tanggal</th>
								<th>Sampai Tanggal</th>
								<th>Jenis Cuti</th>
								<th>Persetujuan</th>
								<!--<th>Cetak</th>-->
							</tr>
						</thead>
						<tbody>	
							<?php
							while($user=mysql_fetch_array($tampilUser)){
						?>	
							<tr>
								<td><?php echo $user['no_cuti'];?></td>
								<td><?php echo $user['tgl'];?></td>
								<td><?php echo $user['jml_hari'];?></td>
								<td><?php echo $user['dari'];?></td>
								<td><?php echo $user['sampai'];?></td>
								<td><?php echo $user['jenis'];?></td>
								<td><?php echo $user['persetujuan'];?></td>
								<!--<td><a href="cetak.php?no_cuti=<?php echo $user['no_cuti'];?>&jml_hari=<?php echo $user['jml_hari'];?>"<i class="fa fa-print"></i></a>-->
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