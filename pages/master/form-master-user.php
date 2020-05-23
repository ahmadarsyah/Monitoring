<section class="content-header">
    <h1>Master<small>Data User</small></h1>
    <ol class="breadcrumb">
        <li><a href="home-admin.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Data User</li>
    </ol>
</section>
<?php
	include "dist/koneksi.php";
	$tampilUser=mysql_query("SELECT * FROM tb_user ORDER BY id_user");
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <h4 class="panel-title"><i class="fa fa-plus"></i> Add Data User<a data-toggle="collapse" data-target="#formuser" href="#formuser" class="collapsed"></a></h4>
							</div>
							<div id="formuser" class="panel-collapse collapse">
								<div class="panel-body">
									<form action="home-admin.php?page=master-user" class="form-horizontal" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-3 control-label">ID User</label>
											<div class="col-sm-7">
												<input type="text" name="id_user" class="form-control" placeholder="Username" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama User</label>
											<div class="col-sm-7">
												<input type="text" name="nama_user" class="form-control" placeholder="Nama" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-7">
												<input type="text" name="password" class="form-control" placeholder="Password" maxlength="64">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Hak Akses</label>
											<div class="col-sm-7">
												<select name="hak_akses" class="form-control">
													<option value="">Pilih</option>
													<option value="Admin">Admin</option>
													<option value="HRD">HRD</option>
													<option value="KADEP_SDM">KADEP SDM</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-7">
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
								<th>ID User</th>
								<th>Nama</th>
								<th>Password</th>
								<th>Hak Akses</th>
								<th>Aktif</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($user=mysql_fetch_array($tampilUser)){
						?>	
							<tr>
								<td><?php echo $user['id_user'];?></td>
								<td><?php echo $user['nama_user'];?></td>
								<td><?php echo $user['password'];?></td>
								<td><?php echo $user['hak_akses'];?></td>
								<td><?php echo $user['aktif'];?></td>
								<td align="center"><a href="home-admin.php?page=pre-activated-deactivate-user&id_user=<?=$user['id_user'];?>&aktif=<?=$user['aktif'];?>" title="Activated OR Deactivate"><i class="fa  fa-refresh"></i></a></td>
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