<?php
error_reporting(0);
include '../koneksi.php';

if (isset($_POST['simpan'])) {
	$id_karyawan = $_POST['id_karyawan'];
	$nama = $_POST['nama'];
	$hari = $_POST['hari'];
	$tanggal = $_POST['tanggal'];
	$waktu_masuk = $_POST['waktu_masuk'];
	$waktu_pulang = $_POST['waktu_pulang'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$status_absen = $_POST['simpan'];
}

if($status_absen == "Masuk"){
	$save = "INSERT INTO tb_absen SET id_karyawan='$id_karyawan', nama='$nama', hari='$hari', tanggal='$tanggal', waktu_masuk='$waktu_masuk', waktu_pulang='', status_absen='Hadir', latitude='$latitude', longitude='$longitude'";
		mysqli_query($koneksi, $save);

		if ($save) {
			echo "<script>alert('Absensi Anda Berhasil Disimpan!') </script>";
			echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
		}else{
			echo "<script>alert('Absensi Anda Gagal Disimpan!') </script>";
			echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
		}
}
elseif($status_absen == "Pulang"){
	$perintah = "SELECT * FROM tb_absen WHERE id_karyawan='$id_karyawan' and tanggal='$tanggal' and waktu_pulang !=''";
	$eksekusi = mysqli_query($koneksi, $perintah);
	$cek = mysqli_affected_rows($koneksi);
	
	if($cek>0){
		echo "<script>alert('Absen sudah dilakukan!')</script>";
		echo "<script>window.location.href = \"index.php?m=awal\" </script>";
	}
	else{
		$update = "UPDATE tb_absen SET waktu_pulang='$waktu_pulang' WHERE id_karyawan='$id_karyawan' AND tanggal='$tanggal'";
		mysqli_query($koneksi, $update);

		if ($update) {
			echo "<script>alert('Absensi Anda Berhasil Disimpan!') </script>";
			echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
		}else{
			echo "<script>alert('Absensi Anda Gagal Disimpan!') </script>";
			echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
		}
	}
}
else{
	echo "<script>alert('Absensi Anda Gagal Disimpan!') </script>";
	echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
}
?>