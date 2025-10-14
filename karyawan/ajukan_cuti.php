<?php include'header.php' ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Ajukan Cuti</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Ajukan Cuti</a></li>              
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">

							<?php 
							if(isset($_GET['alert'])){
								if($_GET['alert']=="gagal"){
									?>
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h5><i class="icon fas fa-info"></i> Alert!</h5>
										Permintaan cuti gagal, silahkan cek tanggal .
									</div>
									<?php
								}
								if($_GET['alert']=="gagal_batas_cuti"){
									?>
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h5><i class="icon fas fa-info"></i> Alert!</h5>
										Permintaan cuti gagal, sudah melebihi batas cuti dalam sehari pada divisi anda di tanggal <?= $_GET['info'] ?>.
									</div>
									<?php
								}
							}

							?>


							<center>
								<h2 class="card-title">Form Pengajuan Cuti</h2>
							</center>
							<br>						
							<div class="row">
								<div class="col-md-12">
									<form action="ajukan_cuti_act.php" method="POST">
										<div class="form-group">
											<table class="table table-bordered">
												<tr>
													<th width="1%">Pilih</th>
													<th>Cuti</th>
													<th>Sisa Cuti</th>
												</tr>
												<?php 
												$cek = mysqli_query($koneksi,"select * from jenis_cuti");
												while($c = mysqli_fetch_array($cek)){
														$idjenis = $c['jenis_cuti_id'];
														$saya = $_SESSION['id'];
														$xx = mysqli_query($koneksi,"select sum(jumlah_cuti) as total from cuti where jenis_cuti_id=$idjenis and user_id=$saya and manajer_status='Terima'");
														$x = mysqli_fetch_assoc($xx);
														$xtotal = $x['total'];
														$diberikan = $c['jenis_cuti_jumlah'];
														$sisa = $diberikan - $xtotal;
												?>
												<tr>
													<td>
														<input type="radio" name="jenis" value="<?= $idjenis ?>" 
																data-sisa="<?= $sisa ?>" required>
													</td>
													<td><?= $c['jenis_cuti_name'] ?></td>
													<td><?= $sisa ?></td>
												</tr>
												<?php } ?>
											</table>
											<input type="hidden" name="sisa" id="sisa">
										</div>
										<div class="form-group">
											<label>Mulai Cuti</label>
											<input type="date" name="mulai" class="form-control" required>
										</div>
										<!-- /.form-group -->
										<div class="form-group">
											<label>Akhir Cuti </label>
											<input type="date" name="akhir" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Alasan Cuti </label>
											<textarea class="form-control" name="alasan" required></textarea>
										</div>
										<div class="form-group">
											<label>Alamat Selama Cuti </label>
											<textarea class="form-control" name="alamat" required></textarea>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>									
									</form>
								</div>
								<!-- /.col -->
							</div>				
							
						</div>
					</div>

				</div>        
			</div>
		</div>    
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		const today = new Date();
		const tomorrow = new Date(today);
		tomorrow.setDate(today.getDate() + 1);
		const minDate = tomorrow.toISOString().split("T")[0];
		const mulai = document.querySelector('input[name="mulai"]');
		const akhir = document.querySelector('input[name="akhir"]');
		mulai.min = minDate;
		akhir.disabled = true;
		mulai.addEventListener("change", function () {
			akhir.disabled = false;
			const startDate = new Date(this.value);
			const minEndDate = startDate.toISOString().split("T")[0];
			akhir.min = minEndDate;
			if (akhir.value && akhir.value < minEndDate) {
				akhir.value = "";
			}
		});

		const radios = document.querySelectorAll('input[name="jenis"]');
		const sisaInput = document.getElementById('sisa');
		radios.forEach(radio => {
			radio.addEventListener('change', function() {
				sisaInput.value = this.dataset.sisa;
				console.log('Sisa cuti terpilih:', sisaInput.value);
			});
		});
	});
</script>

<?php include'footer.php' ?>