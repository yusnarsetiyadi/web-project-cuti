<?php 
include '../koneksi.php';
$id = $_POST['id'];
$divisi = $_POST['divisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update user set divisi_id=$divisi, nip='$nip', name='$nama', kelamin='$kelamin', alamat='$alamat', kontak='$kontak', username='$username', email='$email' where id=$id")or die(mysqli_error($koneksi));
		header("location:manajer.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update user set divisi_id=$divisi, nip='$nip', name='$nama', kelamin='$kelamin', alamat='$alamat', kontak='$kontak', username='$username', email='$email', password='$password' where id=$id")or die(mysqli_error($koneksi));
		header("location:manajer.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:manajer.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
			mysqli_query($koneksi, "update user set divisi_id=$divisi, nip='$nip', name='$nama', kelamin='$kelamin', alamat='$alamat', kontak='$kontak', username='$username', email='$email', foto='$file_gambar' where id=$id")or die(mysqli_error($koneksi));
			header("location:manajer.php?alert=edit");
		}else{
			mysqli_query($koneksi, "update user set divisi_id=$divisi, nip='$nip', name='$nama', kelamin='$kelamin', alamat='$alamat', kontak='$kontak', username='$username', email='$email', password='$password', foto='$file_gambar' where id=$id")or die(mysqli_error($koneksi));
			header("location:manajer.php?alert=edit");
		}
	}
}

