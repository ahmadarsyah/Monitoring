<section class="content-header">
    <h1>History<small>Izin</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-pegawai.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">History Izin</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilUser=mysql_query("SELECT * FROM 	telat WHERE nip='$_SESSION[id_user]' "); 
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
								<th>No. telat</th>
								<th>Divisi</th>
								<th>Jenis Izin</th>
								<th>Tanggal Izin</th>
								<th>Jam Izin</th>
								<th>Lama Izin</th>
								<th>Alasan Izin</th>
								<th>Kegiatan Yang Ditinggalkan</th>
								<th>persetujuan</th>
							</tr>
						</thead>
						<tbody>	
							<?php
							while($user=mysql_fetch_array($tampilUser)){
						?>	
							<tr>
							<td><?php echo $user['id_telat'];?></td>
								<td><?php echo $user['divisi'];?></td>
								<td><?php echo $user['jenis_izin'];?></td>
								<td><?php echo $user['tanggal'];?></td>
								<td><?php echo $user['jam_izin'];?></td>
								<td><?php echo $user['lama_izin'];?></td>
								<td><?php echo $user['alasan_izin'];?></td>
								<td><?php echo $user['keg_kantor'];?></td>
								<td><?php echo $user['persetujuan'];?></td>
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