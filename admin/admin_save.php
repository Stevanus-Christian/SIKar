<?php 

include '../koneksi.php';

if (isset($_POST['simpan'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
}

$save = "INSERT INTO tb_user SET username='$username', password='$password'";
mysqli_query($koneksi, $save);

if ($save) {
	header("location: ../datauser.php");
}else{
	echo "Gagal Menyimpan Data";
	header("location: ../datauser.php");
}

 ?>