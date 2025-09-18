<?php
session_start();
include '../koneksi.php';
include '../mailer.php';

$saya = $_SESSION['id'];
$supervisor = $_SESSION['nama'];

$id = $_POST['id'];
$status = $_POST['status'];
$keterangan = $_POST['keterangan'];
$karyawan_email = $_POST['karyawan_email'];
$karyawan_nama = $_POST['karyawan_nama'];
$subject = "";
$bodyHtml = "";


if ($status == "Terima") {
   mysqli_query($koneksi,"update cuti set supervisor_id=$saya, supervisor_status='$status', supervisor_keterangan='$keterangan' where cuti_id=$id");

   $subject  = "Pengajuan Cuti Diterima Supervisor";
   $statusLabel = "<span style='color:#28a745; font-weight:bold;'>DITERIMA ✅</span>";
   $extraInfo  = "<p>Mohon tunggu manajer Anda untuk menyetujui pengajuan cuti.</p>";
} else {
   mysqli_query($koneksi,"update cuti set supervisor_id=$saya, supervisor_status='$status', supervisor_keterangan='$keterangan', manajer_id=$saya, manajer_status='$status', manajer_keterangan='$keterangan' where cuti_id=$id");

   $subject  = "Pengajuan Cuti Ditolak Supervisor";
   $statusLabel = "<span style='color:#dc3545; font-weight:bold;'>DITOLAK ❌</span>";
   $extraInfo  = "<p>Silakan hubungi supervisor Anda untuk informasi lebih lanjut. Draf pengajuan cuti dapat di download melalui website <a href='https://cutideltatekno.my.id' target='_blank' style='color:#007bff; text-decoration:none;'>cutideltatekno.my.id</a>.</p>";
}

$bodyHtml = "
<div style='font-family: Arial, sans-serif; color:#333;'>
  <div style='background:#004085; color:#fff; padding:15px; border-radius:8px 8px 0 0;'>
    <h2 style='margin:0;'>Sistem Cuti PT. Delta Tekno Perkasa</h2>
  </div>
  <div style='border:1px solid #ddd; border-top:none; padding:20px; border-radius:0 0 8px 8px;'>
    <p>Halo, $karyawan_nama</p>
    <p>Pengajuan cuti Anda telah <b>$statusLabel</b> oleh supervisor.</p>
    <table style='width:100%; border-collapse:collapse; margin:15px 0;'>
      <tr>
        <td style='padding:8px; border:1px solid #ddd; width:30%;'><b>Supervisor</b></td>
        <td style='padding:8px; border:1px solid #ddd;'>$supervisor</td>
      </tr>
      <tr>
        <td style='padding:8px; border:1px solid #ddd;'><b>Keterangan</b></td>
        <td style='padding:8px; border:1px solid #ddd;'>$keterangan</td>
      </tr>
    </table>
    $extraInfo
    <hr style='margin:20px 0;'>
    <p style='font-size:12px; color:#888;'>Email ini dikirim otomatis oleh sistem cuti PT. Delta Tekno Perkasa. Mohon tidak membalas email ini.</p>
  </div>
</div>";

$response = sendEmail($karyawan_email, $subject, $bodyHtml);
file_put_contents("../email_log.txt", date('Y-m-d H:i:s') . " - " . $response . "\n", FILE_APPEND);

header("location:cuti.php?alert=status");