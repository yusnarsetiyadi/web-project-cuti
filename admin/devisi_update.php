<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
mysqli_query($koneksi,"update tbl_divisi set divisi_nama='$nama' where divisi_id='$id'");
header("location:divisi.php?alert=edit");