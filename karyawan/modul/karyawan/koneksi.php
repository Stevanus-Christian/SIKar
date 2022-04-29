<?php 
// Inisiasi Database 
// Silakan sesuaikan dengan detail database Anda
$server = "localhost";
$username = "root";
$password = "";
$database = "karyawansi";

// Membuat koneksi
$koneksi = mysqli_connect($server, $username, $password, $database);

// Mengecek koneksi
if (mysqli_connect_errno()) {
	echo "Koneksi Ke Database Gagal!" . mysql_connect_error();
}
?>