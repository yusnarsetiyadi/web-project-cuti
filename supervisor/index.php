<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Supervisor</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">        
      <div class="row">
        <div class="col-lg-3 col-6">            
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $divisi = mysqli_query($koneksi,"select * from divisi");
              $dv = mysqli_num_rows($divisi);
              ?>
              <h3><?php echo $dv ?></h3>
              <p>Total Divisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>              
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
             <?php
             $jenis_cuti = mysqli_query($koneksi,"select * from jenis_cuti");
             $jc = mysqli_num_rows($jenis_cuti);
             ?>
             <h3><?php echo $jc ?></h3>                
             <p>Jenis Cuti</p>
           </div>
           <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>              
        </div>
      </div>          
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <?php
            $karyawan = mysqli_query($koneksi,"select * from user where role_id=1");
            $kr = mysqli_num_rows($karyawan);
            ?>
            <h3><?php echo $kr ?></h3>
            <p>Karyawan</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-tie"></i>
          </div>              
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <?php
            $divisi = $_SESSION['divisi'];
            $cuti = mysqli_query($koneksi,"select * from cuti where divisi_id=$divisi");
            $ct = mysqli_num_rows($cuti);
            ?>
            <h3><?php echo $ct ?></h3>
            <p>Penajuan Cuti</p>
          </div>
          <div class="icon">
            <i class="fas fa-play"></i>
          </div>              
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <div class="col-md-3">

        <?php
        $saya = $_SESSION['id'];
        $data = mysqli_query($koneksi,"select divisi.divisi_name as divisi_nama, user.* from user join divisi on user.divisi_id = divisi.divisi_id where id=$saya");
        $d = mysqli_fetch_assoc($data);
        ?>

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php
              if($d['foto']=="supervisor_foto.png"){
                ?>
                <img class="profile-user-img img-fluid img-circle"
                src="../dist/img/supervisor_foto.png"
                alt="User profile picture">
                <?php
              }else{
                ?>
                <img class="profile-user-img img-fluid img-circle"
                src="../gambar/user/<?php echo $d['foto'] ?>"
                alt="User profile picture">
                <?php
              }

              ?>               
            </div>

            <h3 class="profile-username text-center"><?php echo $d['name'] ?></h3>
            <p class="text-muted text-center"><?php echo $d['nip'] ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Divisi</b> <a class="float-right"><?php echo $d['divisi_nama'] ?></a>
              </li>                              
            </ul>
            <center>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSupervisor">
                &nbsp EDIT
              </button>
            </center>
            <form action="profil_update.php" method="post" enctype="multipart/form-data">
              <div class="modal fade" id="editSupervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"><?php echo $d['alamat'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Kontak</label>
                        <input type="number" name="kontak" value="<?php echo $d['kontak'] ?>" required="required" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo $d['email'] ?>" required="required" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $d['username'] ?>" required="required" class="form-control" placeholder="Username">
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
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">Profil Saya</h3>              
          </div>

          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane">
                <!-- Post -->
                <div class="post">


                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <tr>
                        <th>Nama</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['name'] ?></td>
                      </tr>
                      <tr>
                        <th>NIK/NIP</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['nip'] ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['kelamin'] ?></td>
                      </tr>
                      <tr>
                        <th>Kontak</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['kontak'] ?></td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['email'] ?></td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['alamat'] ?></td>
                      </tr>
                      <tr>
                        <th>Username</th>
                        <th width="1%">:</th>
                        <td><?php echo $d['username'] ?></td>
                      </tr>

                      <tr>
                        <th>Tanda Tangan</th>
                        <th width="1%">:</th>
                        <td>
                          <img style="width: 90px; height: 90px;" src="../gambar/tanda_tangan/<?php echo $d['tanda_tangan'] ?>">
                        </td>
                      </tr> 
                    </table>

                    <center>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTandaTangan">
                        &nbsp UPDATE TANDA TANGAN
                      </button>
                    </center>
                    <form action="tanda_tangan_update.php" method="post" enctype="multipart/form-data">
                      <div class="modal fade" id="editTandaTangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">EDIT TANDA TANGAN</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">                      
                              <div class="form-group">
                                <label>FOTO TANDA TANGAN</label>
                                <input type="file" name="foto">
                                <br>
                                <small style="color: red;"><b>FILE TANDA TANGAN BEREKTENSI .PNG </b><p>* input jika akan diganti </p></small>
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

              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<?php include 'footer.php'; ?>