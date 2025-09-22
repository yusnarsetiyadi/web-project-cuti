\<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manajer - Aplikasi Pengajuan Cuti</title>  
	<link rel="icon" type="image/png" href="favicon.png">
	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body style="padding: 10px;">

	<table width="100%">
		<tr>

			<td width="85" align="center">
				<H5><u>LAPORAN DATA SUPERVISOR</u></H5>

			</td>

		</tr>
	</table>
	<table border="1">
		<thead>
			<tr>
				<th width="1%">No</th>
				<th>Divisi</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Kontak</th>
				<th>Email</th>
				<th>Jenis Kelamin</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			<?php
			session_start();
			include '../koneksi.php';
			$no=1;
			$divisi = $_SESSION['divisi'];
			$data = mysqli_query($koneksi,"select divisi.divisi_name as divisi_nama, user.* from user join divisi on user.divisi_id = divisi.divisi_id where user.divisi_id=$divisi and user.role_id=2");
			while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['divisi_nama'] ?></td>
					<td><?php echo $d['nip'] ?></td>
					<td><?php echo $d['nama'] ?></td>
					<td><?php echo $d['kontak'] ?></td>
					<td><?php echo $d['email'] ?></td>
					<td><?php echo $d['kelamin'] ?></td>
					<td><?php echo $d['username'] ?></td>  										
				</tr>
				<?php
			}
			?>

		</tfoot>
	</table>


</body>
</html>

<script>
	window.print();
	$(document).ready(function(){

	});
</script>