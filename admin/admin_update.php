<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	if($_POST['password']==""){
		mysqli_query($koneksi, "update admin set name='$nama', kontak='$kontak', email='$email' username='$username' where id='$id'")or die(mysqli_error($koneksi));
		header("location:admin.php?alert=edit");
	}else{
		mysqli_query($koneksi, "update admin set name='$nama', kontak='$kontak', email='$email' username='$username', password='$password' where id='$id'")or die(mysqli_error($koneksi));
		header("location:admin.php?alert=edit");
	}
	
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		if($_POST['password']==""){
			mysqli_query($koneksi, "update admin set name='$nama', kontak='$kontak', email='$email' username='$username', foto='$file_gambar' where id='$id'")or die(mysqli_error($koneksi));
			header("location:admin.php?alert=edit");
		}else{
			mysqli_query($koneksi, "update admin set name='$nama', kontak='$kontak', email='$email' username='$username', password='$password', foto='$file_gambar' where id='$id'")or die(mysqli_error($koneksi));
			header("location:admin.php?alert=edit");
		}
	}
}

