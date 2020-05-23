<section class="content-header">
    <h1>Master<small>Data User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data User</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilUser=mysql_query("SELECT * FROM 	tb_mohoncuti WHERE persetujuan='' ORDER BY no_cuti");
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary"></div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No. Cuti</th>
								<th>Tgl Pengajuan</th>
								<th>Jumlah Hari</th>
								<th>Dari Tanggal</th>
								<th>Sampai Tanggal</th>
								<th>Jenis Cuti</th>
								<th>persetujuan</th>
								<th>Action</th>
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
								<td class="tools"><a href="home-hrd.php?page=form-approval-cuti&no_cuti=<?=$user['no_cuti'];?>&nip=<?=$user['nip'];?>&jml_hari=<?=$user['jml_hari'];?>&jenis=<?=$user['jenis'];?>&title= approval"><i class="fa fa-check"></i></a></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
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