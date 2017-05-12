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
    header('refresh: 1; url=home');
    include "connect.php";
    include "indonesian_date.php";
    $datas=mysqli_query($connect,"select * from kehadiran join peserta on kehadiran.NIM=peserta.NIM order by waktu_hadir asc");
    ?>
    <title>Sepertinya Ada yang salah</title>
    
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" type="text/css" media="all">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css" media="all">
    <!-- //Fonts -->
</head>
<!-- //Head -->
<!-- Body -->

<body>
    <h1>NIM salah atau tidak terdaftar</h1>
    
</body>
<!-- //Body -->

</html>