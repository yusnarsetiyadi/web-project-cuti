<?php 
session_start();
include '../koneksi.php';
$karyawan = $_SESSION['id'];
$divisi = $_SESSION['divisi'];
$jenis = $_POST['jenis'];
$tanggal_request = date('Y-m-d');
$mulai = $_POST['mulai'];
$akhir = $_POST['akhir'];
$alasan = $_POST['alasan'];
$alamat = $_POST['alamat'];
$sisa = $_POST['sisa'];

$tanggal_awal = strtotime($mulai); 
$tanggal_akhir = strtotime($akhir);

$jumlah_hari = ($tanggal_akhir - $tanggal_awal) / (60 * 60 * 24) + 1;

if ($tanggal_akhir < $tanggal_awal) {
    header("location:ajukan_cuti.php?alert=gagal");
    exit;
}

if ($jumlah_hari > $sisa) {
    header("location:ajukan_cuti.php?alert=gagal");
    exit;
}

mysqli_query($koneksi, "
    INSERT INTO cuti 
    (cuti_id, divisi_id, jenis_cuti_id, user_id, tanggal_cuti, tanggal_mulai, tanggal_selesai, jumlah_cuti, alasan_cuti, alamat_cuti) 
    VALUES (NULL, $divisi, $jenis, $karyawan, '$tanggal_request', '$mulai', '$akhir', '$jumlah_hari', '$alasan', '$alamat')
");

header("location:cuti_saya.php?alert=tambah");
?>
