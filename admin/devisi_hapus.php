<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from tbl_divisi where divisi_id='$id'");
mysqli_query($koneksi, "delete from tbl_cuti where cuti_divisi='$id'");
header("location:divisi.php?alert=hapus");