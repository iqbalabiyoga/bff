<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<head>
    <?php
    header('refresh: 3; url=tabel');
    include "connect.php";
    include "indonesian_date.php";
    $datas=mysqli_query($connect,"select * from kehadiran join peserta on kehadiran.NIM=peserta.NIM order by waktu_hadir asc");
    ?>
        <title>Daftar Hadir Peserta BFF 2017 KSE IPB</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" type="text/css" media="all">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css" media="all">
        <!-- //Fonts -->
</head>
<!-- //Head -->
<!-- Body -->

<body>
    <style>
    .flat-table {
            display: block;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 115%;
            overflow: auto;
            width: auto;
        }
        
        th {
            background-color: rgb(112, 196, 105);
            color: white;
            font-weight: normal;
            padding: 20px 30px;
            text-align: center;
        }
        
        td {
            background-color: rgb(238, 238, 238);
            color: rgb(111, 111, 111);
            padding: 20px 30px;
        }
    }
    </style>
    <h1>Peserta Hadir</h1>
    <a href="excel.php">Ekspor ke Excel</a>
    <table class="flat-table">
        <tbody>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Nomor Ponsel</th>
                <th>Kelompok</th>
                <th>Jenis Kelamin</th>
                <th>Jam Kehadiran</th>
                <th>Kode Unik</th>
            </tr>
            <?php $no=0; while($data=mysqli_fetch_array($datas)){$no++;
            ?>                                                    
            
            <tr>
                <td width=1%><?php echo $no;?></td>
                <td width=60%><?php echo $data['nama'];?></td>
                <td><?php echo $data['NIM'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['ponsel'];?></td>
                <td><?php echo $data['kelompok'];?></td>
                <td><?php echo $data['jenis_kelamin'];?></td>
                <td><?php echo tanggal($data['waktu_hadir']);?></td>
                <td><?php echo $data['kode_unik'];?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
<!-- //Body -->

</html>