<?php 
  require_once("koneksi.php");
  $username = $_POST['username'];

  if (is_string($username)) {
    $sql = "SELECT * FROM tb_user WHERE username='$username'";
    $query = $koneksi->query($sql);
    $hasil = $query->fetch_assoc();

    if ($query->num_rows == 0) {
      $password = md5($_POST['password']);
    $sql = "SELECT * FROM tb_karyawan WHERE id_karyawan='$username' AND password='$password'";
    $login=mysqli_query($koneksi,$sql);
    $ketemu=mysqli_num_rows($login);
    $b=mysqli_fetch_array($login);

    if($ketemu>0){
      session_start();
      $_SESSION['idsi']   = $b['id_karyawan'];
      $_SESSION['usersi'] = $b['username'];
      $_SESSION['namasi'] = $b['nama'];
      $_SESSION['ttlsi']  = $b['tmp_tgl_lahir'];
      $_SESSION['jenkelsi'] = $b['jenkel'];
      $_SESSION['agamasi'] = $b['agama'];
      $_SESSION['alamatsi'] = $b['alamat'];
      $_SESSION['teleponsi'] = $b['no_tel'];
      $_SESSION['jabatansi'] = $b['jabatan'];
      $_SESSION['fotosi'] = $b['foto'];
      header("location: karyawan/index.php?m=awal");
    }else{
      echo "<script>alert('Username atau Password anda Salah, atau akun anda belum Aktif!') </script>";
	    echo "<script>window.location.href = \"index.php\" </script>";
    }
    }else{
      session_start();
        $_SESSION['username'] = $hasil['username'];
        header('location:admin.php');  
    }
  }

 ?>
