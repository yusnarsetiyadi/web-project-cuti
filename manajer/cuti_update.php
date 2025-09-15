<?php
session_start();
include'../koneksi.php';
$saya = $_SESSION['id'];
$id = $_POST['id'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];
mysqli_query($koneksi,"update cuti set manajer_id=$saya, manajer_status='$status', manajer_keterangan='$keterangan' where cuti_id=$id");
if ($status=="Terima"){
   // kirim email kalo diterima
}else{
   // kirim email kalo ditolak di manajer
}
header("location:cuti.php?alert=status");