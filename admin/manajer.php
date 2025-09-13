<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Manajer</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data Manajer</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Manajer</h3>
						<div class="float-right">
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addManajer">
								<i class="fa fa-plus"></i> &nbsp Tambah
							</button>


							<form action="manajer_act.php" method="post" enctype="multipart/form-data">
								<div class="modal fade" id="addManajer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tambah Data Manajer</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>

											</div>
											<div class="modal-body">
												<div class="form-group">
													<label>Divisi</label>
													<select class="form-control" name="divisi" required>
														<option value="">--Pilih--</option>
														<?php
														$divisi = mysqli_query($koneksi,"select * from divisi");
														while($dv = mysqli_fetch_array($divisi)){
															?>
															<option value="<?php echo $dv['divisi_id'] ?>"><?php echo $dv['divisi_name'] ?></option>
															<?php
														}

														?>
													</select>
												</div>
												<div class="form-group">
													<label>NIP/NIK</label>
													<input type="text" name="nip" required="required" class="form-control" placeholder="Misal : 1111******">
												</div>
												<div class="form-group">
													<label>Nama </label>
													<input type="text" name="nama" required="required" class="form-control" placeholder="Misal : Ahmed, Medial">
												</div>
												<div class="form-group">
													<label>Jenis Kelamin </label>
													<select class="form-control" name="kelamin" required>
														<option value="">--Pilihh--</option>
														<option value="Laki-Laki">Laki-Laki</option>
														<option value="Perempuan">Perempuan</option>
													</select>
												</div>
												<div class="form-group">
													<label>Alamat</label>
													<textarea class="form-control" name="alamat" required></textarea>
												</div>
												<div class="form-group">
													<label>Kontak</label>
													<input type="number" name="kontak" required="required" class="form-control" placeholder="Misal : 0822*****">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" required="required" class="form-control" placeholder="Misal : 0822*****">
												</div>
												<div class="form-group">
													<label>Username</label>
													<input type="text" name="username" required="required" class="form-control" placeholder="Username">
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" required="required" class="form-control" placeholder="******">
												</div>
												<div class="form-group">
													<label>Foto</label>
													<input type="file" name="foto">
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</div>
								</div>
							</form>


						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th>Divisi</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Kontak</th>
									<th>Email</th>
									<th>Jenis Kelamin</th>
									<th>Username</th>
									<th>Foto</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								$data = mysqli_query($koneksi,"select divisi.divisi_name as divisi_nama, user.* from user join divisi on user.divisi_id = divisi.divisi_id where user.role_id=3");
								while($d = mysqli_fetch_array($data)){
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['divisi_nama'] ?></td>
										<td><?php echo $d['nip'] ?></td>
										<td><?php echo $d['name'] ?></td>
										<td><?php echo $d['kontak'] ?></td>
										<td><?php echo $d['email'] ?></td>
										<td><?php echo $d['kelamin'] ?></td>
										<td><?php echo $d['username'] ?></td>                			
										<td>
											<?php 
											if($d['foto']=="manajer_foto.png"){
												?>
												<img
												src="../dist/img/manajer_foto.png" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px"> 
												<?php 
											}else{ 
												?> 
												<img src="../gambar/user/<?php echo $d['foto'] ?>" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px">
												<?php 
											} 
											?>
										</td>
										<td>
											<center>
												<button type="button" class="btn btn-warning btn-sm btn-icon" data-toggle="modal" data-target="#edit_manajer_<?php echo $d['id'] ?>">
													<i class="fas fa-cog"></i>
												</button> 

												<button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="modal" data-target="#hapus_manajer_<?php echo $d['id'] ?>">
													<i class="fas fa-trash"></i>
												</button> 
											</center>

											<form action="manajer_update.php" method="post" enctype="multipart/form-data">
												<div class="modal fade" id="edit_manajer_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Data Manajer</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>

															</div>
															<div class="modal-body">
																<div class="form-group">
																	<label>Divisi</label>
																	<select class="form-control" name="divisi" required>
																		<option value="">--Pilih--</option>
																		<?php
																		$divisi = mysqli_query($koneksi,"select * from divisi");
																		while($dv = mysqli_fetch_array($divisi)){
																			?>
																			<option <?php if($d['divisi_id']==$dv['divisi_id']){echo "selected='selected'";} ?> value="<?php echo $dv['divisi_id'] ?>"><?php echo $dv['divisi_name'] ?></option>
																			<?php
																		}

																		?>
																	</select>
																</div>
																<div class="form-group">
																	<label>NIP/NIK</label>
																	<input type="hidden" name="id" value="<?php echo $d['id'] ?>">
																	<input type="number" name="nip" value="<?php echo $d['nip'] ?>" required="required" class="form-control" placeholder="Misal : 1111******">
																</div>
																<div class="form-group">
																	<label>Nama </label>
																	<input type="text" name="nama" value="<?php echo $d['name'] ?>" required="required" class="form-control" placeholder="Misal : Ahmed, Medial">
																</div>
																<div class="form-group">
																	<label>Jenis Kelamin </label>
																	<select class="form-control" name="kelamin" required>
																		<option value="">--Pilihh--</option>
																		<option <?php if($d['kelamin']=="Laki-Laki"){echo "selected='selected'" ;} ?> value="Laki-Laki">Laki-Laki</option>
																		<option <?php if($d['kelamin']=='Perempuan'){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
																	</select>
																</div>
																<div class="form-group">
																	<label>Alamat</label>
																	<textarea class="form-control" name="alamat" required><?php echo $d['alamat'] ?></textarea>
																</div>
																<div class="form-group">
																	<label>Kontak</label>
																	<input type="number" name="kontak" value="<?php echo $d['kontak'] ?>" required="required" class="form-control" placeholder="Misal : 0822*****">
																</div>
																<div class="form-group">
																	<label>Email</label>
																	<input type="text" name="email" value="<?php echo $d['email'] ?>" required="required" class="form-control" placeholder="Misal : test@example.com">
																</div>
																<div class="form-group">
																	<label>Username</label>
																	<input type="text" name="username" required="required" value="<?php echo $d['username'] ?>" class="form-control" placeholder="Username">
																</div>
																<div class="form-group">
																	<label>Password</label>
																	<input type="password" name="password" class="form-control" placeholder="******">
																	<small><p style="color:red;">* input jika akan diganti</p></small>
																</div>
																<div class="form-group">
																	<label>Foto</label>
																	<input type="file" name="foto">
																	<small><p style="color:red;">* input jika akan diganti</p></small>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-primary">Simpan</button>
															</div>
														</div>
													</div>
												</div>
											</form>


											<!-- modal hapus -->
											<div class="modal fade" id="hapus_manajer_<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>

														</div>
														<div class="modal-body">
															<p>Yakin ingin menghapus data ini ?</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
															<a href="manajer_hapus.php?id=<?php echo $d['id'] ?>" class="btn btn-primary">Hapus</a>
														</div>
													</div>
												</div>
											</div>


										</td>
									</tr>
									<?php
								}
								?>

							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php include 'footer.php'; ?>