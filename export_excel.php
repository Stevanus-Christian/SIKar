<?php
session_start();
include ("koneksi.php");

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
                                                <th>Waktu</th>   
                                                <th>Latitude</th>
                                                <th>Longitude</th> 
                                            </tr>
<?php 
                                            include 'koneksi.php';
                                            $sql = "SELECT * FROM tb_absen";
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
                                                <td><?php echo $row['waktu']; ?></td>  
                                                <td><?php echo $row['latitude']; ?></td>  
                                                <td><?php echo $row['longitude']; ?></td>    
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