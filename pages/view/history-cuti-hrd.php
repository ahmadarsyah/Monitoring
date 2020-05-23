<section class="content-header">
    <h1>History Cuti<small>Pegawai</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-hrd.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">History Cuti Pegawai</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilUser=mysql_query("SELECT  td.no_cuti, b.nama, b.nip, b.Divisi, td.tgl, td.jml_hari,
	td.dari, td.sampai, td.jenis, td.persetujuan
	FROM 	tb_mohoncuti as td, tb_pegawai as b WHERE b.nip=td.nip");
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
								<th>Nama</th>
								<th>Divisi</th>
								<th>Tgl Pengajuan</th>
								<th>Jumlah Hari</th>
								<th>Dari Tanggal</th>
								<th>Sampai Tanggal</th>
								<th>Jenis Cuti</th>
								<th>persetujuan</th>
								<th>Cetak</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($user=mysql_fetch_array($tampilUser)){
						?>	
							<tr>
								<td><?php echo $user['no_cuti'];?></td>
								<td><?php echo $user['nama'];?></td>
								<td><?php echo $user['Divisi'];?></td>
								<td><?php echo $user['tgl'];?></td>
								<td><?php echo $user['jml_hari'];?></td>
								<td><?php echo $user['dari'];?></td>
								<td><?php echo $user['sampai'];?></td>
								<td><?php echo $user['jenis'];?></td>
								<td><?php echo $user['persetujuan'];?></td>
								<td><a href="cetakhrd.php?no_cuti=<?php echo $user['no_cuti'];?>&jml_hari=<?php echo $user['jml_hari'];?>"<i class="fa fa-print"></i></a>
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