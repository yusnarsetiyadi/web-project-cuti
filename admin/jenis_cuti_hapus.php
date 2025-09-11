<?php 
include '../koneksi.php';
$id = $_GET['jenis_cuti_id'];
mysqli_query($koneksi,"delete from jenis_cuti where jenis_cuti_id=$id");
header("location:jenis_cuti.php?alert=hapus");