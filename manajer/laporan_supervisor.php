<?php include 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Supervisor</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Laporan Supervisor</li>
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
						<h3 class="card-title">laporan Supervisor</h3>	
						<div class="float-right">
							<a href="laporan_supervisor_print.php" target="_BLANK" class="btn btn-sm btn-success">
								<i class="fa fa-print"></i> &nbsp Print
							</a>							
						</div>					
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table class="table table-bordered table-striped">
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
								</tr>
							</thead>
							<tbody>
								<?php
								$divisi = $_SESSION['divisi'];
								$no=1;
								$data = mysqli_query($koneksi,"select divisi.divisi_name as divisi_nama, user.* from user join divisi on user.divisi_id = divisi.divisi_id where user.divisi_id=$divisi and user.role_id=2");
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