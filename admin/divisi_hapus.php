<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "delete from divisi where divisi_id=$id");
mysqli_query($koneksi, "delete from cuti where divisi_id=$id");
header("location:divisi.php?alert=hapus");