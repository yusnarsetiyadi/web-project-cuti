<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from admin where id='$id'");
$c = mysqli_fetch_assoc($cek);
$foto = $c['foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from admin where id='$id'");
header("location:admin.php?alert=hapus");