<!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supervisor - Aplikasi Pengajuan Cuti</title>
    <link rel="stylesheet" type="text/css" href="laporan.css"/>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

 </head>
 <body style="padding: 10px;">
     <?php
     include '../koneksi.php';
     $idcuti = $_GET['id'];
     $data = mysqli_query($koneksi,"select * from cuti, tbl_karyawan, tbl_manajer, tbl_divisi,tbl_jenis_cuti,tbl_supervisor where cuti_id='$idcuti' and user_id=karyawan_id and divisi_id=divisi_id and jenis_cuti_id=jenis_id and supervisor_id=supervisor_id and manajer_id=manajer_id");
     $d = mysqli_fetch_assoc($data);
     $idkaryawan = $d['user_id'];
     ?>

    <table width="100%">
        <tr>
            
            <td width="85" align="center">
                <H5><u>SURAT PERMOHONAN DAN SURAT IJIN CUTI</u><br> <small><?php echo $d['jenis_nama'] ?></small></H5>
               
            </td>

        </tr>
    </table>
    
    <p>Bersama surat ini diberitahukan bahwa :</p>
    <table class="table">
        <tr>
            <td>Nama </td>
            <th>:</th>
            <td><?php echo $d['karyawan_nama']; ?></td>
        </tr>
        <tr>
            <td>NIP/NIK</td>
            <th>:</th>
            <td><?php echo $d['karyawan_nip']; ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <th>:</th>
            <td><?php echo $d['karyawan_jabatan']; ?></td>
        </tr> 
         <tr>
            <td>Devisi</td>
            <th>:</th>
            <td><?php echo $d['divisi_nama']; ?></td>
        </tr>    
        <tr>
            <td>Jenis Cuti</td>
            <th>:</th>
            <td><?php echo $d['jenis_nama']; ?></td>
        </tr>  
        <tr>
            <td>Lama Cuti</td>
            <th>:</th>
            <td>
               <?php
             
               $tgl1 = strtotime($d['tanggal_mulai']); 
               $tgl2 = strtotime($d['tanggal_selesai']); 

               $jarak = $tgl2 - $tgl1;

               $hari = $jarak / 60 / 60 / 24;
               echo $hari;
               ?>
            </td>
        </tr> 
        <tr>
            <td>Dari Tanggal s/d Tanggal</td>
            <th>:</th>
            <td><?php echo date('d-m-Y', strtotime($d['tanggal_mulai'])). " s/d ". date('d-n-Y',strtotime($d['tanggal_selesai'])) ?></td>
        </tr> 
        <tr>
            <td>Alasan Cuti</td>
            <th>:</th>
            <td><?php echo $d['alasan_cuti']; ?></td>
        </tr>
        <tr>
            <td>Alamat Cuti</td>
            <th>:</th>
            <td><?php echo $d['alamat_cuti']; ?></td>
        </tr>  
       
        <tr>
            <td>Keterangan</td>
            <th>:</th>
            <td><?php echo $d['supervisor_keterangan']; ?></td>
        </tr>                           
    </table> 

  

    <div class="tandatangan" >            
       <p><?php echo $d['supervisor_status'] ?><br>
          <?php echo "Devisi ".$d['divisi_nama'] ?></p>
          <img style="width:70px; height: 70px;" src="../gambar/tanda_tangan/<?php echo $d['supervisor_tanda_tangan'] ?>"> 
          <br/>      
          <?php echo $d['supervisor_nama']; ?>  
      </div>
      <div class="tandatangan2">      
          <p>Deli Serdang, <?php echo date('d-m-Y') ?> <br>
          Pemohon, </p>      
          <img style="width:70px; height: 70px;" src="../gambar/tanda_tangan/<?php echo $d['karyawan_tanda_tangan'] ?>"><br>             
          <?php echo $d['karyawan_nama'] ?>
      </div>

      <div class="tandatangan" >
          <br/>
          <p>Mengetahui, <br> Manager</p>
          <img style="width:70px; height: 70px;" src="../gambar/tanda_tangan/<?php echo $d['manajer_tanda_tangan'] ?>"></br>        
          <?php echo $d['manajer_nama'] ?>
      </div>
 </body>
 </html>


 <script>
    window.print();
    $(document).ready(function(){

    });
</script>