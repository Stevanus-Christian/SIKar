<?php
session_start();
include ("koneksi.php");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Absen Pegawai.xls; location: data_absen.php");
?>
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
?>
</table>