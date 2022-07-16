<?php 
require_once("koneksi.php");
include 'library.php';
error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang="en">

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
    <title>Data Absen</title>

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
</head>

<body class="animsition">
      <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  
    }

 ?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                                                  </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                
                            </ul>
                        </li>
                        <li>
                            <a href="datakaryawan.php">
                                <i class="fas fa-chart-bar"></i>Data Karyawan</a>
                        </li>
                        <li>
                            <a href="datauser.php">
                                <i class="fas fa-table"></i>Data User</a>
                        </li>
                        <li>
                            <a href="datajabatan.php">
                                <i class="far fa-check-square"></i>Data Jabatan</a>
                        </li>
                        <li>
                            <a href="data_absen.php">
                                <i class="fas fa-calendar-alt"></i>Data Absen</a>
                        </li>
                       <li>
                            <a href="data_keterangan.php">
                                <i class="fas fa-table"></i>Data Keterangan
                            </a>
                        </li>
                       
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h1>Admin</h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                          
                        </li>
                        <li>
                            <a href="datakaryawan.php">
                                <i class="fas fa-chart-bar"></i>Data Karyawan</a>
                        </li>
                        <li>
                            <a href="datauser.php">
                                <i class="fas fa-table"></i>Data User</a>
                        </li>
                        <li>
                            <a href="datajabatan.php">
                                <i class="far fa-check-square"></i>Data Jabatan</a>
                        </li>
                        <li class="data_absen.php">
                            <a href="data_absen.php">
                                <i class="fas fa-calendar-alt"></i>Data Absen</a>
                        </li>
                          <li>
                            <a href="data_keterangan.php">
                                <i class="fas fa-table"></i>Data Keterangan
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <?php
        $tglAwal = "";
        $tglAkhir = "";
        $carinama = "";

        if($_POST['carinama']!='' && $_POST['txtTglAwal']!='' && $_POST['txtTglAkhir']!='') {
            $carinama = $_POST['carinama'];
            $tglAwal = $_POST['txtTglAwal'];
            $tglAkhir = $_POST['txtTglAkhir'];
            $sql = "SELECT * FROM tb_absen WHERE nama LIKE '%$carinama%' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
            $hadir = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Hadir' AND nama LIKE '%$carinama%' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
            $izin = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Izin' AND nama LIKE '%$carinama%' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
            $sakit = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Sakit' AND nama LIKE '%$carinama%' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
        }
        elseif ($_POST['txtTglAwal']!='' && $_POST['txtTglAkhir']!='') {
            $tglAwal = $_POST['txtTglAwal'];
            $tglAkhir = $_POST['txtTglAkhir'];
            $sql = "SELECT * FROM tb_absen WHERE date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
            $hadir = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Hadir' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
            $izin = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Izin' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
            $sakit = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Sakit' AND date_format(str_to_date(tanggal, '%d-%m-%Y'), '%Y-%m-%d') BETWEEN '".$tglAwal."' AND '".$tglAkhir."'");
        }
        elseif ($_POST['carinama']!='') {
            $carinama = $_POST['carinama'];
            $sql = "SELECT * FROM tb_absen WHERE nama LIKE '%$carinama%'";
            $hadir = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Hadir' AND nama LIKE '%$carinama%'");
            $izin = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Izin' AND nama LIKE '%$carinama%'");
            $sakit = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Sakit' AND nama LIKE '%$carinama%'");
        }
        else{
            $sql = "SELECT * FROM tb_absen";
            $hadir = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Hadir'");
            $izin = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Izin'");
            $sakit = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE status_absen LIKE 'Sakit'");
        }

        $jumlah_hadir = mysqli_num_rows($hadir);
        $jumlah_izin = mysqli_num_rows($izin);
        $jumlah_sakit = mysqli_num_rows($sakit);
        ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form></form>
                            <a href="export_excel.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>&&cari=<?php echo $carinama; ?>" class="btn btn-success" target="_blank">Export Data</button></a>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content"> 
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                <h2 class="title-1" style="text-align: center;">Data Absen <b><?php echo ($carinama); ?></b></h2>
                                </div>
                                <div class="overview-wrap">
                                <h2 class="title-1" style="text-align: center;">Periode Tanggal <b><?php echo IndonesiaTgl($tglAwal); ?></b> s/d <b><?php echo IndonesiaTgl($tglAkhir); ?></b></h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="table-responsive table--no-card m-b-30">
                            <form action="data_absen.php" method="post">
                                <div class="form-group">
                                <table class="table table-borderless table-striped table-earning" >
                                
                                        <tbody>
                                            <tr>
                                                <td><input autocomplete="off" class="form-control" type="text" name="carinama" placeholder="Cari Nama Karyawan" /></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>"></td>
                                                <td><input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>"></td>                                         
                                            </tr>
                                            <tr>
                                                <td><button type="submit" name="btnTampil" class="btn btn-success center-block">Tampilkan</button></td>
                                                <td></td>
                                            </tr>                               
                                      </tbody>
                                    </table>
                                        </div>
                            </form>
                                </div>    
                        </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Waktu Masuk</th>
                                                <th>Waktu Pulang</th>
                                                <th>Status Absen</th>
                                                <th>Lokasi</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                                            include 'koneksi.php';
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
                                                <td><?php echo $row['waktu_masuk']; ?></td>  
                                                <td><?php echo $row['waktu_pulang']; ?></td>
                                                <td><?php echo $row['status_absen']; ?></td>  
                                                <td>
                                                    <?php echo "<a href='http://maps.google.com/maps?q=$row[latitude],$row[longitude]' class='btn btn-primary' target='_blank'>Cek Lokasi</a>"; ?>                                                
                                                </td>
                                                <td> <a href="absen/hapus_absen.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>                                              
                                            </tr>
                                           <?php 
                                           $no++;
                                       }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
            <!-- Modal -->

            <!-- End Modal -->
            <table class="table table-borderless table-striped table-earning" >
                                        
                                        <tbody>
                                            <tr> 
                                                <td> <th  ><strong> Total Hadir </strong></th><th  ><strong><?php echo $jumlah_hadir; ?></strong></th></td>
                                                <td><th  ><strong> Total Sakit</strong></th><th  ><strong><?php echo $jumlah_sakit; ?></strong></th></td>
                                                <td><th  ><strong> Total Izin  </strong></th><th  ><strong><?php echo $jumlah_izin; ?></strong></th></td>
                                            </tr>    
                                      </tbody>
                                    </table>
                                    <br>
            <table class="table table-borderless table-striped table-earning" >
                                        
                                        <tbody>
                                            <tr> 
                                                <td> 
                                                    <a href="cetak.php?awal=<?php echo $tglAwal; ?>&&akhir=<?php echo $tglAkhir; ?>&&cari=<?php echo $carinama; ?>" target="_blank" class="btn btn-primary">Cetak Laporan</a>                                              
                                                </td>
                                            </tr>    
                                      </tbody>
                                    </table>
                </div>
            </div>
        </div>

    </div>

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
