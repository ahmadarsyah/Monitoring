<section class="content-header">
    <h1>History<small>Cuti</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">History Cuti</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilUser=mysql_query("SELECT td.Id_drm, b.nama, td.Tanggal, td.Jm_msk, td.Jm_mulai, td.Jm_selesai, td.Divisi, td.Kantor
	FROM drm as td, tb_pegawai as b WHERE b.nip=td.nip");  
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
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
							while($user=mysql_fetch_array($tampilUser)){
						?>	
							<tr>
								<td><?php echo $user['Id_drm'];?></td>
								<td><?php echo $user['nama'];?></td>
								<td><?php echo $user['Tanggal'];?></td>
								<td><?php echo $user['Jm_msk'];?></td>
								<td><?php echo $user['Jm_mulai'];?></td>
								<td><?php echo $user['Jm_selesai'];?></td>
								<td><?php echo $user['Divisi'];?></td>
								<td><?php echo $user['Kantor'];?></td>
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