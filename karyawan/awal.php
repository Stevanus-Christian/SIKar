<?php 
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="300" />
    <link rel="icon" href="../assets/employee.png" type="image/png">

    <!-- Title Page-->
    <title>Beranda Karyawan</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fontfaces CSS-->
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

</head>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<body class="animsition" onload="getLocation();">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            
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
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
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
<h1>Karyawan</h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="?m=awal">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                          
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" value="Absen Karyawan" readonly="" />
                                
                            </form>
                            <div class="header-button">
                               
                                 <?php
                                    $id = $_SESSION['idsi'];
                                    include '../koneksi.php';
                                    $sql = "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'";
                                    $query = mysqli_query($koneksi, $sql);
                                    $r = mysqli_fetch_array($query);

                                     ?>

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../images/<?php echo $r['foto'];?>" class="img-circle" alt="<?php echo $r['nama'];?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $r['nama']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                         <img src="../images/<?php echo $r['foto'];?>" class="img-circle" \ />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $r['nama']; ?></a>
                                                    </h5>
                                                    
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="?m=karyawan&s=profil">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1" style="text-align: center;">Selamat Datang <?php echo $_SESSION['namasi']; ?>, Silahkan Absen</h2>        
                                </div>
                                <div class="overview-wrap">
                                    <h1 class="title-1" id="jam" style="text-align: center;"></h1>
                                </div>
                            </div>
                        </div>
                        <br>
                                <script type="text/javascript">
		                            function getLocation() {
                                        if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(showPosition, showError);
                                        } else { 
                                            alert("Geolocation tidak didukung oleh browser ini!");
                                        }
                                    }

                                    function showPosition(position) {
                                        console.log(position);
                                        document.querySelector('.Form input[name = "latitude"]').value = position.coords.latitude;
                                        document.querySelector('.Form input[name = "longitude"]').value = position.coords.longitude;
                                    }

                                    function showError(error){
                                        switch(error.code){
                                            case error.PERMISSION_DENIED:
                                                alert("Izinkan akses Geolokasi pada perangkat Anda!");
                                                location.reload();
                                                break;
                                        }
                                    }

                                    setInterval(customClock, 500);

                                    function customClock() {
                                        var time = new Date();
                                        var hrs = time.getHours();
                                        var min = time.getMinutes();
                                        var sec = time.getSeconds();

                                        document.getElementById("jam").innerHTML = "Waktu Sekarang : "+ hrs + ":" + min + ":" + sec;
                                    }

                                </script>

                        <!-- FORM -->
                        <div class="row">
                           <div class="table-responsive table--no-card m-b-30">
                            <form class="Form" action="dt_absen_sv.php" method="post" autocomplete="off">
                                <div class="form-group">
                                <table class="table table-borderless table-striped table-earning" >
                                
                                        <tbody>
                                            <tr>
                                                <td>NIP</td>
                                                <td>
                                                
                                                <input type="text" readonly="" class="form-control" name="id_karyawan" autocomplete="off" size="25px" maxlength="25px" value="<?php echo $_SESSION
                                                ['idsi'];?>">    
                                                
                                            </td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Nama</td>
                                                <td><input type="text" class="form-control" name="nama" autocomplete="off" readonly="" value="<?php echo $_SESSION['namasi']; ?>"></td>
                                            </tr>

                                            <tr>
                                                <td>Hari</td>
                                                <td><input type="text" class="form-control" value="<?php echo date('l' ); ?>" name="hari" readonly="" ></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Tanggal</td>
                                                <td><input type="text" class="form-control" value="<?php echo date('d-m-Y' ); ?>" name="tanggal" readonly="" ></td>
                                            </tr>

                                            <tr>
                                                <td>Latitude</td>
                                                <td><input type="text" class="form-control" value="" name="latitude" readonly=""></td>
                                            </tr>

                                            <tr>
                                                <td>Longitude</td>
                                                <td><input type="text" class="form-control" value="" name="longitude" readonly="" ></td>
                                            </tr>

                                            <tr>
                                                <input type="hidden" class="form-control" value="<?php echo date('H:i:s' ); ?>" name="waktu" readonly="" >
                                                <td></td>
                                                <td><button type="submit" value="Masuk" name="simpan" class="btn btn-success center-block" style="size: 50px; padding: 14px 40px; border-radius: 12px; width: 200px;">Absen Masuk</button></td>
                                            </tr>
                                            
                                            <tr>
                                                <td></td>
                                                <td><button type="submit" value="Pulang" name="simpan" class="btn btn-success center-block" style="size: 50px; padding: 14px 40px; border-radius: 12px; width: 200px;">Absen Pulang</button></td>
                                            </tr>
                                      </tbody>
                                    </table>
                                        </div>
                            </form>
                                </div>    
                        </div>
                     <div class="row">
                           <div class="table-responsive table--no-card m-b-30">

                                
                                <table class="table table-borderless table-striped table-earning" >
                                        
                                        <tbody>
                                            <tr>
                                               
                                                <td>
                                                
                                               <a href="?m=karyawan&s=title"><button class="btn btn-warning center-block">Klik Tombol ini jika Anda Tidak Hadir</button></a>
                                               
                                            </td>
                                            </tr>
                                           
                                           
                                            
                                      </tbody>
                                    </table>
                                       
                            
                                    
                                </div>    
                        </div>

                        <!-- END FORM -->
                        
                        <div class="header-desktop">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Stevanus Christian | All rights reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
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
