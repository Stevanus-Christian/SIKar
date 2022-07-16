<?php
session_start();
include ("koneksi.php");
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

// nama file
$filename="DataAbsenPegawai ".date('dmY').".xls";

//header info for browser
header("Content-Type: application/vnd-ms-excel"); 
header('Content-Disposition: attachment; filename="' . $filename . '";');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Export Database MySQL ke Excel Menggunakan PHP</title>
</head>
<body>
<table border="1">
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Hari</th>
                                                <th>Tanggal</th>
                                                <th>Waktu Masuk</th> 
                                                <th>Waktu Pulang</th>     
                                                <th>Status Absen</th>
                                            </tr>
<?php 
                                            include 'koneksi.php';
                                            $query = mysqli_query($koneksi, $sql);
                                            if(mysqli_num_rows($query)>0){

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
                                            </tr>
<?php 
                                           $no++;
                                        }
                                        //header("location: data_absen.php");
                                        echo "<script>window.location.href='data_absen.php'</script>";
                                        }
                                        else{
                                            die("Belum ada data");
                                            //header("location: data_absen.php");
                                            echo "<script>window.location.href='data_absen.php'</script>";
                                        }                            
?>
</table>
</body>
</html>