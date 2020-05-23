<div class="col-md-12">
											<h4> Harap diingat password terbaru Anda! </h4>
											<br>
											<br>
											<form class="form-horizontal" role="form" method="post" action="home-hrd.php?page=update-passward-hrd">
												<?php
													$username = $_SESSION['nama_user'];
													$query = mysql_query("SELECT id_user, password FROM tb_user WHERE nama_user='$username'");
													$data = mysql_fetch_array($query);
													?>
													<div class="form-group">
													<label class="control-label col-sm-4">ID Pegawai:</label>
													<div class="col-sm-7">
														<input type="text" name="id_pegawai" class="form-control" placeholder="Auto Generated" readonly value="<?php echo $data['id_user']; ?>">
													</div>
													</div>
													<div class="form-group">
													<label class="control-label col-sm-4">Password Lama:</label>
													<div class="col-sm-7">
														<input type="password" name="passwordlama" class="form-control" placeholder="Auto Generated" readonly value="<?php echo $data['password']; ?>">
													</div>
													</div>
													<div class="form-group">
													<label class="control-label col-sm-4">Password Baru:</label>
													<div class="col-sm-7">
														<input type="password" name="passwordbaru" class="form-control" placeholder="Password Baru" required>
													</div>
													</div>
													<div class="form-group">
													<label class="control-label col-sm-4">Konfirmasi Password:</label>
													<div class="col-sm-7">
														<input type="password" name="konfirmasipassword" class="form-control" placeholder="Konfirmasi Password" required>
													</div>
													</div>
													<div class="form-group">
														<div class="col-sm-offset-4 col-sm-10">
															<button type="submit" class="btn btn-info btn-fill">Submit</button>
														</div>
													</div>
											</form>                    
                                            </div>