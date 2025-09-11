<?php 
include '../koneksi.php';
$nama = $_POST['nama'];
mysqli_query($koneksi,"insert into tbl_divisi values(NULL,'$nama')");
header("location:divisi.php?alert=tambah");