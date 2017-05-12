<?php 
include "indonesian_date.php";
include "connect.php";

$datas = mysqli_query($connect,"SELECT * FROM kehadiran join peserta on peserta.NIM=kehadiran.NIM order by peserta.kelompok asc");

date_default_timezone_set('Asia/Jakarta');
$catch = date("Y-m-d H:i:s");
$date = tanggal(strtotime($catch)); 
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/x-msexcel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename= Daftar Hadir Peserta BFF 2017 KSE IPB - update ".$date.".xls");
header("Pragma : no-cache");
header("Expires :0"); $i=0;
?>
    <p>Daftar Hadir Peserta Building For Future 7 Mei 2017 | Paguyuban KSE IPB</p>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Nomor Ponsel</th>
                <th>Kelompok</th>
                <th>Jam Kehadiran</th>
                <th>Digital Signature</th>
            </tr>
        </thead>
        <?php $i=1; while ($container = mysqli_fetch_assoc($datas)) { 
                    
                    $nohp=sprintf($container['ponsel']);?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $i; $i++; ?>
                    </td>
                    <td>
                        <?php echo $container['nama'];?>
                    </td>
                    <td>
                        <?php echo $container['NIM'];?>
                    </td>
                    <td>
                        <?php echo $container['jenis_kelamin'];?>
                    </td>
                    <td>
                        <?php echo $container['email'];?>
                    </td>
                    <td>
                        <?php echo $nohp;?>
                    </td>
                    <td>
                        <?php echo $container['kelompok'];?>
                    </td>
                    <td>
                        <?php echo $container['waktu_hadir'];?>
                    </td>
                    <td>
                        <?php echo $container['kode_unik'];?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
    </table>