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
	$status_absen = $_POST['simpan'];
}

$perintah = "SELECT * FROM tb_absen WHERE id_karyawan='$id_karyawan' and tanggal='$tanggal' and status_absen='$status_absen'";
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if($cek>0){
	echo "<script>alert('Absen sudah dilakukan!')</script>";
	echo "<script>window.location.href = \"index.php?m=awal\" </script>";
}
else{

	if($status_absen=="Masuk" && $waktu > strtotime("10:00:00")){
		echo "<script>alert('Batas absen masuk untuk hari ini sudah selesai!')</script>";
		echo "<script>window.location.href = \"index.php?m=awal\" </script>";
	}
	elseif ($status_absen=="Pulang" && $waktu < strtotime("17:00:00")) {
		echo "<script>alert('Absen pulang belum bisa dilakukan!')</script>";
		echo "<script>window.location.href = \"index.php?m=awal\" </script>";
	}
	else{
		$save = "INSERT INTO tb_absen SET id_karyawan='$id_karyawan', nama='$nama', hari='$hari', tanggal='$tanggal', waktu='$waktu', status_absen='$status_absen', latitude='$latitude', longitude='$longitude'";
		mysqli_query($koneksi, $save);

		if ($save) {
			echo "<script>alert('Absensi Anda Berhasil Disimpan!') </script>";
			echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
		}else{
			echo "<script>alert('Absensi Anda Gagal Disimpan!') </script>";
			echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
		}
	}
}

?>