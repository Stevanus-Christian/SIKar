<?php 
  session_start();
  require_once("koneksi.php");
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM tb_daftar WHERE username='$username'";
  $query = $koneksi->query($sql);
  $hasil = $query->fetch_assoc();

  if ($query->num_rows == 0) {
    echo "<script>alert('Username Belum Terdaftar!') </script>";
	  echo "<script>window.location.href = \"login.php\" </script>";
  }else{
    if ($password <> $hasil['password']) {
      echo "<script>alert('Password Anda Salah!') </script>";
	    echo "<script>window.location.href = \"login.php\" </script>";
    }else{
      $_SESSION['username'] = $hasil['username'];
       header('location:admin.php');  
    }
  }
  

 ?>