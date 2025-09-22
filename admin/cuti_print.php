<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Pengajuan Cuti</title>
    <link rel="icon" type="image/png" href="favicon.png">
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
 $data = mysqli_query($koneksi, "
    SELECT 
        cuti.*,
        user.created_at                 AS masuk_kerja,
        user.name                       AS karyawan_nama,
        user.nip                        AS karyawan_nip,
        role.role_name                  AS karyawan_jabatan,
        user.kontak                     AS karyawan_kontak,
        user.tanda_tangan               AS karyawan_tanda_tangan,
        user_supervisor.name            AS supervisor_nama,
        user_supervisor.nip             AS supervisor_nip,
        user_supervisor.tanda_tangan    AS supervisor_tanda_tangan,
        user_manajer.name               AS manajer_nama,
        user_manajer.nip                AS manajer_nip,
        user_manajer.tanda_tangan       AS manajer_tanda_tangan,
        jenis_cuti.jenis_cuti_name      AS jenis_cuti_name,
        jenis_cuti.jenis_cuti_jumlah    AS jenis_cuti_jumlah,
        divisi.divisi_name              AS divisi_nama
    FROM cuti
    JOIN user ON cuti.user_id = user.id
    JOIN role ON user.role_id = role.role_id
    JOIN divisi ON cuti.divisi_id = divisi.divisi_id
    JOIN jenis_cuti ON cuti.jenis_cuti_id = jenis_cuti.jenis_cuti_id
    JOIN user AS user_manajer ON cuti.manajer_id = user_manajer.id
    JOIN user AS user_supervisor ON cuti.supervisor_id = user_supervisor.id
    WHERE cuti_id = $idcuti
 ");
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
            <?php if($d['karyawan_tanda_tangan']!=""){ ?>
                <div style="width:200px; height:100px; 
                            display:flex; align-items:center; justify-content:center; margin:auto;">
                    <img src="../gambar/tanda_tangan/<?php echo $d['karyawan_tanda_tangan'] ?>" 
                        alt="Tanda Tangan"
                        style="max-width:180px; max-height:90px; object-fit:contain;">
                </div>
            <?php }else{ ?>
                <div style="width:200px; height:100px; 
                            display:flex; align-items:center; justify-content:center; margin:auto;">
                    <img src="../dist/img/logo_delta.png" 
                        alt="Logo Delta"
                        style="max-width:150px; max-height:70px; object-fit:contain;">
                </div>
            <?php } ?>
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
     <td>DISETUJUI****</td>
     <td>PERUBAHAN****</td>
     <td>DITANGGUHKAN****</td>
     <td>TIDAK DISETUJUI****</td>
 </tr>

 <tr>
    <td>
        <?php
        if ($d['supervisor_status']=="Terima"){
            ?>
                <center>&#10003;</center>
            <?php
        }else{
            ?>
            <br>
            <?php
        }
        ?>
    </td>    
    <td></td>    
    <td></td>    
    <td>
        <?php
        if ($d['supervisor_status']=="Tolak"){
            ?>
                <center>&#10003;</center>
            <?php
        }else{
            ?>
            <br>
            <?php
        }
        ?>
    </td>    
</tr>

<tr>
    <td colspan="3"><?php echo $d['supervisor_keterangan'] ?></td>
    <td>
        <center>Supervisor Divisi <?php echo $d['divisi_nama'] ?></center>
        <?php if($d['supervisor_tanda_tangan']!=""){ ?>
            <div style="width:200px; height:100px; 
                        display:flex; align-items:center; justify-content:center; margin:auto;">
                <img src="../gambar/tanda_tangan/<?php echo $d['supervisor_tanda_tangan'] ?>" 
                    alt="Tanda Tangan"
                    style="max-width:180px; max-height:90px; object-fit:contain;">
            </div>
        <?php }else{ ?>
            <div style="width:200px; height:100px; 
                        display:flex; align-items:center; justify-content:center; margin:auto;">
                <img src="../dist/img/logo_delta.png" 
                    alt="Logo Delta"
                    style="max-width:150px; max-height:70px; object-fit:contain;">
            </div>
        <?php } ?>
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
     <td>DISETUJUI****</td>
     <td>PERUBAHAN****</td>
     <td>DITANGGUHKAN****</td>
     <td>TIDAK DISETUJUI****</td>
 </tr>
 <tr>
    <td>
        <?php
        if ($d['manajer_status']=="Terima"){
            ?>
                <center>&#10003;</center>
            <?php
        }else{
            ?>
            <br>
            <?php
        }
        ?>
    </td>    
    <td></td>    
    <td></td>    
    <td>
        <?php
        if ($d['manajer_status']=="Tolak"){
            ?>
                <center>&#10003;</center>
            <?php
        }else{
            ?>
            <br>
            <?php
        }
        ?>
    </td>    
</tr>

<tr>
    <td colspan="3"><?php echo $d['manajer_keterangan'] ?></td>
    <td>
        <center>Manajer Divisi <?php echo $d['divisi_nama'] ?></center>
        <?php if($d['manajer_tanda_tangan']!=""){ ?>
            <div style="width:200px; height:100px; 
                        display:flex; align-items:center; justify-content:center; margin:auto;">
                <img src="../gambar/tanda_tangan/<?php echo $d['manajer_tanda_tangan'] ?>" 
                    alt="Tanda Tangan"
                    style="max-width:180px; max-height:90px; object-fit:contain;">
            </div>
        <?php }else{ ?>
            <div style="width:200px; height:100px; 
                        display:flex; align-items:center; justify-content:center; margin:auto;">
                <img src="../dist/img/logo_delta.png" 
                    alt="Logo Delta"
                    style="max-width:150px; max-height:70px; object-fit:contain;">
            </div>
        <?php } ?>
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
    <li>*** Diisi oleh pejabat yang menangani bidang kepegawaian sebelum karyawan mengajukan cuti</li>
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