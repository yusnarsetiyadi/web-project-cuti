<?php 
include '../koneksi.php';
$divisi = $_POST['divisi'];
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$kontak = $_POST['kontak'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$created_at = date('Y-m-d H:i:s');

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$nip','$kontak','$kelamin','$alamat',$divisi,2,'$username','$password','supervisor_foto.png','','$email','$created_at')")or die(mysqli_error($koneksi));
	header("location:supervisor.php?alert=tambah");
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		header("location:supervisor.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$nip','$kontak','$kelamin','$alamat',$divisi,2,'$username','$password','$file_gambar','','$email','$created_at')")or die(mysqli_error($koneksi));
		header("location:supervisor.php?alert=tambah");
	}
}

