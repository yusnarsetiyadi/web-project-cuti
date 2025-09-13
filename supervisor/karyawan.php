<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data Karyawan</li>
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
						<h3 class="card-title">Data Karyawan Divisi Saya</h3>						
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
									<th width="10%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								$divisi = $_SESSION['divisi'];
								$data = mysqli_query($koneksi,"select divisi.divisi_name as divisi_nama, user.* from user join divisi on user.divisi_id = divisi.divisi_id where user.divisi_id=$divisi");
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
											if($d['foto']=="karyawan_foto.png"){
												?>
												<!--<img src="../dist/img/supervisor_foto.png" class="img-circle elevation-2" alt="User Image"> -->
												<img src="../dist/img/karyawan_foto.png" class="img-thumbnail" alt="Cinque Terre" width="60px" height="40px"> 
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
												<a href="karyawan_detail.php?id=<?php echo $d['id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-search"></i></a>
											
											</center>

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