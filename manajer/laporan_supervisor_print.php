\<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Manajer - Aplikasi Pengajuan Cuti</title>  
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
			$data = mysqli_query($koneksi,"select * from tbl_supervisor, tbl_divisi where supervisor_divisi='$divisi' and supervisor_divisi=divisi_id");
			while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['divisi_nama'] ?></td>
					<td><?php echo $d['supervisor_nip'] ?></td>
					<td><?php echo $d['supervisor_nama'] ?></td>
					<td><?php echo $d['supervisor_kontak'] ?></td>
					<td><?php echo $d['supervisor_kelamin'] ?></td>
					<td><?php echo $d['supervisor_username'] ?></td>  										
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