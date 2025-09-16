<?php 
include '../koneksi.php';
$divisi = $_POST['divisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$created_at = date('Y-m-d H:i:s');

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$nip','$kontak','$kelamin','$alamat',$divisi,3,'$username','$password','manajer_foto.png','','$email','$created_at')")or die(mysqli_error($koneksi));
	header("location:manajer.php?alert=tambah");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:manajer.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$nip','$kontak','$kelamin','$alamat',$divisi,3,'$username','$password','$file_gambar','','$email','$created_at')")or die(mysqli_error($koneksi));
	header("location:manajer.php?alert=tambah");
	}
}

