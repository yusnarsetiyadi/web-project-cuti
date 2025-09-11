<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manajer - Aplikasi Pengajuan Cuti</title>
  <link rel="stylesheet" type="text/css" href="laporan.css"/>
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body style="padding: 10px;">

  <table width="100%">
     <tr>

        <td width="85" align="center">
           <H5><u>LAPORAN DATA PERMOHONAN CUTI</u></H5>

       </td>

   </tr>
</table>
<table border="1">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th>Devisi</th>
            <th>NIP / Nama</th>
            <th>Kontak</th>
            <th>Tanggal request</th>
            <th>Jenis / Jumlah Cuti</th>            
            <th>Supervisor</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        include '../koneksi.php';
        $divisi = $_SESSION['divisi'];
        $no=1;
        $data = mysqli_query($koneksi,"select * from cuti, tbl_divisi,tbl_karyawan, tbl_jenis_cuti, tbl_supervisor where divisi_id='$divisi' and divisi_id=divisi_id and jenis_cuti_id=jenis_id and user_id=karyawan_id and supervisor_id=supervisor_id");
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['divisi_nama'] ?></td>
                <td><?php echo $d['karyawan_nip']. " /".$d['karyawan_nama'] ?></td>                
                <td><?php echo $d['karyawan_kontak'] ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tanggal_cuti'])) ?></td>
                <td>
                	<?php
                	echo $d['jumlah_cuti']." Hari";
                	?>                	

                </td>    
                <td><?php echo $d['supervisor_nama'] ?></td>                  
                <td><?php echo $d['supervisor_status'] ?></td>                  

            </tr>
            <?php
        }
        ?>

    </tfoot>
</table>


</body>
</html>

 <script>
    window.print();
    $(document).ready(function(){

    });
</script>