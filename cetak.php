    <?php 
session_start();
error_reporting(0);

include 'koneksi.php';
include 'library.php';

$awal	= $_GET['awal']; 
//$tawal=InggrisTgl($awal);

$akhir	= $_GET['akhir'];
//$takhir=InggrisTgl($akhir);

$cari = $_GET['cari'];

if($_GET['cari']!='' && $_GET['awal']!='' && $_GET['akhir']!='') {
    $carinama = $cari;
    $tglAwal 	= $awal;
	$tglAkhir 	= $akhir;
    $sql = "SELECT * FROM tb_absen WHERE nama LIKE '%$carinama%' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
}
elseif ($_GET['awal']!='' && $_GET['akhir']!='') {
    $tglAwal = $awal;
    $tglAkhir = $akhir;
    $sql = "SELECT * FROM tb_absen WHERE date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
}
elseif ($_GET['cari']!='') {
    $carinama = $cari;
    $sql = "SELECT * FROM tb_absen WHERE nama LIKE '%$carinama%'";
}
else{
    $sql = "SELECT * FROM tb_absen";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/employee.png" type="image/png">

    <!-- Title Page-->
    <title>Cetak Laporan</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all">
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- end script-->
</head>
<body onload="print()">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmedit">

<?php 
if (!empty($tglAwal)){ ?>
    <center><h2>LAPORAN ABSENSI KARYAWAN</h2> <hr> 
    <br>
    </h4>PERIODE <b><?php echo IndonesiaTgl($awal); ?> s/d <?php echo IndonesiaTgl($akhir); ?></b>
<br /> </h4></center><?php 
} 
elseif (!empty($carinama)) {?>
    <center><h2>LAPORAN ABSENSI KARYAWAN</h2> <hr> 
    <br>
    </h4>PERIODE <b><?php echo IndonesiaTgl($awal); ?> s/d <?php echo IndonesiaTgl($akhir); ?></b>
<br /> </h4></center><?php
}
else { ?>
<center><h2>LAPORAN ABSENSI KARYAWAN</h2></center>
<hr>
<?php } ?>
   <table class="table my-0">
                                <thead>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>   
                                                <th>Status Absen</th>
                                </thead>
                                <tbody>
								
								<?php							
									$query = mysqli_query($koneksi, $sql);

                                    $no = 1;
                                    while ($row = mysqli_fetch_array($query)) {                                         
                                        ?>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><?php echo $no ?></td>
                                                                                        <td><?php echo $row['id_karyawan']; ?></td>
                                                                                        <td><?php echo $row ['nama']; ?></td>
                                                                                        <td><?php echo $row['hari']; ?></td>
                                                                                        <td><?php echo $row['tanggal']; ?></td>
                                                                                        <td><?php echo $row['waktu']; ?></td>  
                                                                                        <td><?php echo $row['status_absen']; ?></td>      
                                                                                    </tr>
                                        <?php 
                                                                                   $no++;
                                                                                }
									?>
                                </tbody>
                                
                            </table>
</form>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
