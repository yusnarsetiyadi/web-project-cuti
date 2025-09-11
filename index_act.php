<?php 
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

if($level == "Admin"){
	$cek = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['id'];
		$_SESSION['nama'] = $d['name'];
		$_SESSION['email'] = $d['email'];
		$_SESSION['status'] = "Admin";
		header("location:admin/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else if($level=="Manajer"){
	$cek = mysqli_query($koneksi,"select * from user where role_id=3 and username='$username' and password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['id'];
		$_SESSION['nama'] = $d['name'];
		$_SESSION['email'] = $d['email'];
		$_SESSION['divisi'] = $d['divisi_id'];
		$_SESSION['status'] = "Manajer";
		header("location:manajer/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else if($level=="Supervisor"){
	$cek = mysqli_query($koneksi,"select * from user where role_id=2 and username='$username' and password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['id'];
		$_SESSION['nama'] = $d['name'];
		$_SESSION['email'] = $d['email'];
		$_SESSION['divisi'] = $d['divisi_id'];
		$_SESSION['status'] = "Supervisor";
		header("location:supervisor/");
	}else{
		header("location:index.php?alert=gagal");
	}
}else if($level=="Karyawan"){
	$cek = mysqli_query($koneksi,"select * from user where role_id=1 and username='$username' and password='$password'");
	$d = mysqli_fetch_array($cek);
	if(mysqli_num_rows($cek) > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $d['id'];
		$_SESSION['nama'] = $d['name'];
		$_SESSION['email'] = $d['email'];
		$_SESSION['divisi'] = $d['divisi_id'];
		$_SESSION['status'] = "Karyawan";
		header("location:karyawan/");
	}else{
		header("location:index.php?alert=gagal");
	}
}



?>