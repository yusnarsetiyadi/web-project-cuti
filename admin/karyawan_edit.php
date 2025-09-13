<?php include 'header.php'; ?>
<div class="content-wrapper">	
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Karyawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Edit Data Karyawan</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Data Karyawan</h3>
            <div class="float-right">
              <a href="karyawan.php" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i> &nbsp Kembali</a>              
            </div>
            <div class="card-tools">
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              	<form action="karyawan_update.php" method="POST">
                  <?php 
                  $id = $_GET['id'];
                  $data = mysqli_query($koneksi,"select * from user where id='$id'");
                  $d = mysqli_fetch_assoc($data);
                  ?>
              		<div class="form-group">
              			<label>NIP</label>
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
              			<input type="number" name="nip" value="<?php echo $d['nip'] ?>" class="form-control" required placeholder="Misal : 11121***">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Nama </label>
              			<input type="text" name="nama" value="<?php echo $d['name'] ?>" class="form-control" required placeholder="Misal : Hamdan, Ali, ...">
              		</div>
              		<div class="form-group">
              			<label>Kontak </label>
              			<input type="number" name="kontak" value="<?php echo $d['kontak'] ?>" class="form-control" required placeholder="Misal : 0822**, ...">
              		</div>
						<div class="form-group">
              			<label>Email </label>
              			<input type="text" name="email" value="<?php echo $d['email'] ?>" class="form-control" required placeholder="Misal : test@example.com">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Username </label>
              			<input type="text" name="username" value="<?php echo $d['username'] ?>" class="form-control" required placeholder="Misal : Hamdan, Ali, ...">
              		</div>
              		<!-- /.form-group -->
              		<div class="form-group">
              			<label>Password </label>
              			<input type="password" name="password" class="form-control" placeholder=" ***">
                    <small><p style="color:red;">* input jika akan diganti</p></small>
              		</div>
              	</div>
              	<!-- /.col -->
              	<div class="col-md-6">
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
              			<label>Kelamin</label>
              			<select class="form-control" name="kelamin" required>
              				<option value="">--Pilih--</option>
              				<option <?php if($d['kelamin']=="Laki-Laki"){echo "selected='selected'";} ?> value="Laki-Laki">Laki-Laki</option>
              				<option <?php if($d['kelamin']=="Perempuan"){echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
              			</select>
              		</div>
              		<div class="form-group">
              			<label>Alamat</label>
              			<textarea class="form-control" name="alamat" required><?php echo $d['alamat'] ?></textarea>
              		</div>
              		<div class="form-group">
              			<label>Foto</label>
              			<input type="file" name="foto">
                    <small><p style="color:red;">* input jika akan diganti</p></small>
              		</div>                
              		<div class="modal-footer">
              			<button type="submit" class="btn btn-primary">Simpan</button>
              		</div>
              	</form>
                
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<?php include 'footer.php'; ?>