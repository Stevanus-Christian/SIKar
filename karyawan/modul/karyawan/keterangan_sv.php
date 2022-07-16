<?php 
error_reporting(0);
include 'koneksi.php';
if (isset($_POST['simpan'])) {
	
	$id = $_POST['id'];
	$id_karyawan = $_POST['id_karyawan'];
	$nama = $_POST['nama'];
	$keterangan = $_POST['keterangan'];
	$alasan = $_POST['alasan'];
	$hari = $_POST['hari'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];

	//untuk gambar
	$bukti = $_FILES['bukti']['name'];
	$tmp = $_FILES['bukti']['tmp_name'];
	$buktibaru = date('dmYHis').$bukti;
	$path = "images/".$buktibaru;

}

if (move_uploaded_file($tmp, $path)) {
	$sql = "SELECT * FROM tb_keterangan WHERE id = '".$id."'";
	mysqli_query($koneksi, $sql);

}


$query = "INSERT INTO tb_keterangan SET id_karyawan = '$id_karyawan', nama='$nama', keterangan='$keterangan', alasan='$alasan', hari='$hari', tanggal='$tanggal', waktu='$waktu', bukti='$buktibaru'";
mysqli_query($koneksi, $query);

if ($query) {
	$save = "INSERT INTO tb_absen SET id_karyawan='$id_karyawan', nama='$nama', hari='$hari', tanggal='$tanggal', waktu_masuk='', waktu_pulang='', status_absen='$keterangan', latitude='', longitude=''";
	mysqli_query($koneksi, $save);
	echo "<script>alert('Keterangan Anda berhasil disimpan!') </script>";
	echo '<script>window.history.back()</script>';
}else{
	echo "<script>alert('Keterangan anda gagal disimpan!') </script>";
	echo '<script>window.history.back()</script>';
}

 ?>