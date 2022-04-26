<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
	$id_karyawan = $_POST['id_karyawan'];
	$nama = $_POST['nama'];
	$waktu = $_POST['waktu'];


}

$save = "INSERT INTO tb_absen SET id_karyawan='$id_karyawan', nama='$nama', waktu='$waktu'";
mysqli_query($koneksi, $save);

if ($save) {
	echo "<script>alert('Absensi Anda Berhasil Disimpan!') </script>";
	 echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
}else{
	echo "<script>alert('Absensi Anda Gagal Disimpan!') </script>";
	 echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
}

 ?>