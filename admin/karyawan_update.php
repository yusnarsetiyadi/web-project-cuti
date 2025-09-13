<?php 
include '../koneksi.php';
$id = $_POST['id'];
$divisi = $_POST['divisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$kontak = $_POST['kontak'];

$username = $_POST['username'];
$password = md5($_POST['password']);


$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update user set divisi_id=$divisi_id, nip='$nip', name='$nama', kelamin='$kelamin', kontak='$kontak', alamat='$alamat', email='$email' username='$username' where id=$id")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update user set divisi_id=$divisi_id, nip='$nip', name='$nama', kelamin='$kelamin', kontak='$kontak', alamat='$alamat', email='$email' username='$username', password='$password' where id=$id")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:manajer.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
		mysqli_query($koneksi, "update user set divisi_id=$divisi_id, nip='$nip', name='$nama', kelamin='$kelamin', kontak='$kontak', alamat='$alamat', email='$email' username='$username', foto='$file_gambar' where id=$id")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update user set divisi_id=$divisi_id, nip='$nip', name='$nama', kelamin='$kelamin', kontak='$kontak', alamat='$alamat', email='$email' username='$username', password='$password', foto='$file_gambar' where id=$id")or die(mysqli_error($koneksi));
		header("location:karyawan.php?alert=edit");
	}
	}
}

