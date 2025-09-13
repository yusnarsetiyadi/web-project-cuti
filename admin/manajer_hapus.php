<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from user where id=$id");
$c = mysqli_fetch_assoc($cek);
$foto = $c['foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from user where id=$id");
header("location:manajer.php?alert=hapus");