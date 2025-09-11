<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
mysqli_query($koneksi,"update divisi set divisi_name='$nama' where divisi_id=$id");
header("location:divisi.php?alert=edit");