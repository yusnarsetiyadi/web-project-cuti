<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Pengajuan Cuti</title>
    <link rel="stylesheet" type="text/css" href="laporan.css"/>
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <style>

        ol.d {
          list-style-type: lower-number;
      }
  </style>

  <style type="text/css">

  </style>
</head>
<body style="padding: 10px;">
 <?php
 include '../koneksi.php';
 $idcuti = $_GET['id'];
 $data = mysqli_query($koneksi,"select user_supervisor.name as supervisor_nama, user_supervisor.nip as supervisor_nip, user.created_at as masuk_kerja, user.name as karyawan_nama, user.nip as karyawan_nip, role.role_name as karyawan_jabatan, user.kontak as karyawan_kontak, divisi.divisi_name as divisi_nama, cuti.*, user_manajer.name as manajer_nama, user_manajer.nip as manajer_nip, jenis_cuti.jenis_cuti_name as jenis_cuti_name, jenis_cuti.jenis_cuti_jumlah as jenis_cuti_jumlah from cuti join user on cuti.user_id = user.id join role on user.role_id = role.role_id join divisi on cuti.divisi_id = divisi.divisi_id join jenis_cuti on cuti.jenis_cuti_id = jenis_cuti.jenis_cuti_id join user as user_manajer on cuti.manajer_id = user_manajer.id join user as user_supervisor on cuti.supervisor_id = user_supervisor.id where cuti_id=$idcuti");
 $d = mysqli_fetch_assoc($data);     
 ?>

 <div style="float:right;display:block;width:200px">  
    <p>Jakarta Barat, <?php echo date('d-m-Y') ?></p>
    <p>Kepada <br>
        Yth,<br>
        HRD PT. Delta Tekno Perkasa<br>        
        Di 
        Jakarta Barat
    </p>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center><p><b>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</b></p></center>

<table border="1" border="1" width="670px">
    <tr>
        <th colspan="5" style="text-align: left;">1. Data Pegawai</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo $d['karyawan_nama'] ?></td>             
        <td>NIP </td>
        <td><?php echo $d['karyawan_nip'] ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td><?php echo $d['karyawan_jabatan'] ?></td>        
        <td>Masa Kerja</td>
        <td>
            <?php  
            $tanggalMasuk = new DateTime($d['masuk_kerja']);  
            $sekarang     = new DateTime();  
            $selisih      = $tanggalMasuk->diff($sekarang);  
            $masaKerjaBulan = ($selisih->y * 12) + $selisih->m;
            echo $masaKerjaBulan . " bulan";
            ?>
        </td>
    </tr>
    <tr>
        <td>Unit Kerja</td>
        <td><?php echo $d['divisi_nama'] ?></td>
    </tr>
</table>

<br>
<table border="1" border="1" width="670px">
    <tr>
        <th colspan="5" style="text-align: left;">II.JENIS CUTI YANG DIAMBIL</th>
    </tr>
    <tr>
        <td><?php echo $d['jenis_cuti_name'] ?></td>
        <td><?php echo $d['jenis_cuti_jumlah'] ?></td>
    </tr>    
</table>
<br>

<table border="1" border="1" width="670px">
    <tr>
        <th colspan="5" style="text-align: left;">III. ALASAN CUTI</th>
    </tr>
    <tr>
        <td><?php echo $d['alasan_cuti'] ?></td>        
    </tr>    
</table>
<br>

<table border="1" border="1" width="670px">
    <tr>
        <th colspan="6" style="text-align: left;">IV. LAMANYA CUTI</th>
    </tr>
    <tr>
        <td>Selama</td>        
        <td><?php echo $d['jumlah_cuti']." Hari" ?></td>        
        <td>Mulai Tanggal</td>        
        <td><?php echo date('d-m-Y', strtotime($d['tanggal_mulai'])) ?></td>
        <td>Sampai Tanggal</td>        
        <td><?php echo date('d-m-Y', strtotime($d['tanggal_selesai'])) ?></td>
    </tr>    
</table>
<br>

<table border="1" border="1" width="670px">
    <tr>
        <th colspan="6" style="text-align: left;">V. CATATAN CUTI</th>
    </tr>
    <tr>
        <td colspan="3">1. Cuti Tahunan</td>  
        <tr>
            <td>Tahun</td>
            <td>Sisa</td>
            <td>Keterangan</td>
        </tr>           
        <td colspan="3">2. Cuti lain</td>
        <tr>
            <td>Tahun</td>
            <td>Sisa</td>
            <td>Keterangan</td>
        </tr>             
    </tr>    

</table>
<br>


<table border="1" border="1" width="670px">
    <tr>
        <th colspan="5" style="text-align: left;">VI. ALAMAT SELAMA MENJALANKAN CUTI</th>
        <th>Telepon </th>
        <td><?php echo $d['karyawan_kontak'] ?></td>
    </tr>
    <tr>
        <td colspan="5"><?php echo $d['alamat_cuti'] ?></td>
        <td colspan="2">
            <center>Hormat Saya</center>
            <br>
            <br>
            <br>            
            <br>
            <center>
                <u><?php echo $d['karyawan_nama'] ?></u><br>
                <?php echo $d['karyawan_nip'] ?>
            </center>
        </td>
    </tr>

</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table border="1" border="1" width="670px">
    <tr>
        <th colspan="5" style="text-align: left;">VII. PERTIMBANGAN ATASAN LANGSUNG</th>        
    </tr>
    <tr>
     <td>DISETUJUI</td>
     <td>PERUBAHAN****</td>
     <td>DITANGGUHKAN****</td>
     <td>TIDAK DISETUJUI****</td>
 </tr>

 <tr>
    <td><br></td>    
    <td></td>    
    <td></td>    
    <td></td>    
</tr>

<tr>
    <td colspan="3"></td>
    <td>
        <center>Supervisor Divisi <?php echo $d['divisi_nama'] ?></center>
        <br>
        <br>
        <br>
        <br>
        <center>
            <u><?php echo $d['supervisor_nama'] ?></u><br>
            <?php echo $d['supervisor_nip'] ?>
        </center>
    </td>
</tr>

</table>
<br>


<table border="1" border="1" width="670px">
    <tr>
        <th colspan="5" style="text-align: left;">VIII. KEPUTUASN PEJABAT YANG MEMEBERIKAN CUTI</th>        
    </tr>
    <tr>
     <td>DISETUJUI</td>
     <td>PERUBAHAN****</td>
     <td>DITANGGUHKAN****</td>
     <td>TIDAK DISETUJUI****</td>
 </tr>
 <tr>
    <td><br></td>    
    <td></td>    
    <td></td>    
    <td></td>    
</tr>

<tr>
    <td colspan="3"></td>
    <td>
        <center>Manajer Divisi <?php echo $d['divisi_nama'] ?></center>
        <br>
        <br>
        <br>
        <br>
        <center>
            <u><?php echo $d['manajer_nama'] ?></u><br>
            <?php echo $d['manajer_nip'] ?>
        </center>
    </td>
</tr>

</table>
<br>

<br>


<p>Catatan :</p>
<ol class="d">
    <li>* Coret yang tidak perlu</li>
    <li>** Pilih salah satu dengan memberikan tanda centang</li>
    <li>*** Diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti</li>
    <li>**** Diberi tanda centang oleh atasannya</li>
    <li>N Cuti tahun yang berjalan</li>
    <li>N-1 Sisa Cuti 1 tahun sebelumnya</li>
    <li>N-2 Sisa Cuti 2 tahun sebelumnya</li>    
</ol>



</body>

</html>


<script>
    window.print();
    $(document).ready(function(){

    });
</script>