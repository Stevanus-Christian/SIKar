<?php 
require_once("koneksi.php");
error_reporting(0);
session_start();
 ?>
 
<?php 
	include 'koneksi.php';
	$id = $_GET['id_karyawan'];
	$data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'");
    while ($d = mysqli_fetch_array($data)) {
      
    
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/employee.png" type="image/png">

    <!-- Title Page-->
    <title>Data Karyawan</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all">
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- end script-->

    <title>Ubah Data</title>
</head>
<body>
<form action="proedit_karyawan.php" method="POST" enctype="multipart/form-data">
  <table class="table table-borderless table-striped table-earning" >
                                        
                                        <tbody>
                                              
                                            <tr>
                                                <td>NIP</td>
                                                <td>
                                                <input type="text" class="form-control" readonly="" name="id_karyawan" autocomplete="off" value="<?php echo $d['id_karyawan'];?>">
                                                
                                                
                                                
                                            </td>
                                            </tr>
                                         
                                            <tr>
                                                <td>Username</td>
                                                <td>
                                                <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $d['username'];?>">
                                                	</td>
                                            </tr>

                                            <tr>
                                                <td>Password</td>
                                                <td>
                                                <input type="text" class="form-control"  name="password" autocomplete="off">
                                                	</td>
                                            </tr>

                                            <tr>
                                                <td>Nama</td>
                                                <td>
                                                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $d['nama'];?>">
                                                	</td>
                                            </tr>
                                            

                                            <tr>
                                            	<td>Tempat & tanggal lahir</td>
                                            	<td>
                                              <input type="text" class="form-control" name="tmp_tgl_lahir" autocomplete="off" value="<?php echo $d['tmp_tgl_lahir'];?>">
                                            		</td>
                                            </tr>

                                            <TR>
                                            	<td>Jenis Kelamin</td>
                                            	<td>
                                            		 <select select class="form-control" name="jenkel">
                                                    <option value="<?php echo $r['jenkel']; ?>"><?php echo $r['jenkel']; ?></option>
                                                    <option>Laki-laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            		</td>
                                            </TR>

                                             <tr>
                                                <td>Agama</td>
                                                <td>
                                                	  <select  select class="form-control" name="agama">
    											<option value="<?php echo $r['agama']; ?>"><?php echo $r['agama']; ?></option>
                                                        <option>Islam</option>
                                                        <option>Kristen</option>
                                                        <option>Katholik</option>
                                                        <option>Hindu</option>
                                                        <option>Buddha</option>
                                                        <option>KongHuCu</option>
                                                    </select>
                                                	</td>
                                            </tr>

                                           <tr>
                                              <td>Alamat</td>
                                              <td><textarea autocomplete="off" class="form-control" name="alamat" value="<?php echo $d['alamat'];?>"></textarea><td>
                                           </tr>

                                           <tr>
                                           	<td>Nomor Telepon</td>
                                           	<td>
                                             <input type="text" class="form-control"  name="no_tel" value="<?php echo $d['no_tel'];?>">
                                           		</td>
                                           </tr>

                                           <tr>
                                           	<td>Jabatan</td>
                                           	<td>
                                           		<select class="form-control" name="jabatan">
                                               <?php 

                                                include 'koneksi.php';

                                                $sql = "SELECT * FROM tb_jabatan";

                                                $hasil = mysqli_query($koneksi, $sql);

                                                $no = 0;

                                                while ($data = mysqli_fetch_array($hasil)) {
    
                                                $no++;


                                              ?>
                                               <option value="<?php echo $data['jabatan'];?>"><?php echo $data['jabatan']; ?></option>
                                                <?php } ?>    
                                                </select>
                                           		 </td>
                                           </tr>

                                           <tr>
                                           	<td>Foto</td>
                                           	<td><?php 
            if ($d['foto']!=''){
                          echo "<img src=\"images/$d[foto]\" height=150 />";  
                        }
                        else{
                          echo "tidak ada gambar";
                        }
   ?></td>
                                           </tr>

                                           <tr>
                                           	<td> <label> Foto </label></td>
                                           	<td> <input type="checkbox" name="ubahfoto" value="true"> Ceklis jika ingin mengubah foto !
                    <br>
                    <input type="file" name="inpfoto"></td>
                                           </tr>
                                          
                   

                                            <tr>
                                                <td><input type="submit" name="ubahdata" class="btn btn-primary" value="Ubah Data"></td>
                                               
                                            </tr>
                                            
                                      </tbody>
                                    </table>

</form>
</body>
</html>

<?php } ?>