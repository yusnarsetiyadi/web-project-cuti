<?php
session_start();
include'../koneksi.php';
$saya = $_SESSION['id'];
$id = $_POST['id'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"update cuti set supervisor_id='$saya', supervisor_status='$status', supervisor_keterangan='$keterangan' where cuti_id='$id'");
header("location:cuti.php?alert=status");