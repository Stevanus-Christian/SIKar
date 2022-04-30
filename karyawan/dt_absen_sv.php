<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
	$id_karyawan = $_POST['id_karyawan'];
	$nama = $_POST['nama'];
	$hari = $_POST['hari'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
}

$save = "INSERT INTO tb_absen SET id_karyawan='$id_karyawan', nama='$nama', hari='$hari', tanggal='$tanggal', waktu='$waktu', latitude='$latitude', longitude='$longitude'";
mysqli_query($koneksi, $save);

if ($save) {
	echo "<script>alert('Absensi Anda Berhasil Disimpan!') </script>";
	echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
}else{
	echo "<script>alert('Absensi Anda Gagal Disimpan!') </script>";
	echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
}
?>