<?php
session_start();
include ("koneksi.php");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Absen Pegawai.xls");
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