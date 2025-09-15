<?php
session_start();
include'../koneksi.php';
$saya = $_SESSION['id'];
$id = $_POST['id'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];
if ($status=="Terima"){
   mysqli_query($koneksi,"update cuti set supervisor_id=$saya, supervisor_status='$status', supervisor_keterangan='$keterangan' where cuti_id=$id");
}else{
   mysqli_query($koneksi,"update cuti set supervisor_id=$saya, supervisor_status='$status', supervisor_keterangan='$keterangan', manajer_id=$saya, manajer_status='$status', manajer_keterangan='$keterangan' where cuti_id=$id");
   // kirim email kalo ditolak di supervisor
}
header("location:cuti.php?alert=status");