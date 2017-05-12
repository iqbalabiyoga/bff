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
    function random($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    include 'connect.php';
    include 'indonesian_date.php';
    $nim=$_POST['nim'];
    $periksa=mysqli_fetch_array(mysqli_query($connect,"select count(nama) as jum from peserta where NIM='$nim'"));
    if($periksa['jum']==0){ header('Location: ups');}
    header('refresh: 5; url=home');
    
    
    $cek=mysqli_fetch_array(mysqli_query($connect,"select count(id) as jum from kehadiran where NIM='$nim'"));
   
    if($cek['jum']==0){
        
    $unik=random();
    $kodeunik=md5($unik);
    
    mysqli_query($connect,"insert into kehadiran set NIM='$nim', kode_unik='$kodeunik'");}
    
    $hadir=mysqli_fetch_array(mysqli_query($connect,"select * from kehadiran where nim='$nim'"));
    $data=mysqli_fetch_array(mysqli_query($connect,"select * from peserta where nim='$nim'"));
    $periksafoto=mysqli_fetch_array(mysqli_query($connect,"select count(NIM) as jum from foto where NIM='$nim'"));
    if($periksafoto['jum']>0){
    $foto=mysqli_fetch_array(mysqli_query($connect,"select * from foto where nim='$nim'"));
    $hasil=(string)$foto['file'];
    }
    else $hasil='default.png';
    $nama=$data['nama'];?>
        <title>Selamat datang,
            <?php echo $nama;?>
        </title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" type="text/css" media="all">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css" media="all">
        <!-- //Fonts -->
</head>

<body>
    <h1>Silakan Masuk, <?php echo $nama;?>!</h1>
    <h4>kamu hadir pada <?php echo tanggal($hadir['waktu_hadir']);?></h4>
    <h3>catat kode unikmu : <strong><?php echo $hadir['kode_unik'];?></strong> | kelompokmu : <strong><?php echo $data['kelompok'];?></strong></h3>
    <img width=200px src="fotopeserta/<?php echo $hasil;?>">
    <h5 style="font color: white">Halaman ini akan ditutup otomatis dalam <span id="counter">5</span> detik.</h5>
    <script type="text/javascript">
        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML) <= 0) {
                location.href = 'login.php';
            }
            i.innerHTML = parseInt(i.innerHTML) - 1;
        }
        setInterval(function () {
            countdown();
        }, 1000);
    </script>
    <div class="w3lsfooteragileits">
        <p> &copy; 2017 Paguyuban Karya Salemba Empat IPB. All Rights Reserved | Developed by <a href="https://github.com/iqbalabiyoga" target="=_blank">Iqbal Abiyoga</a></p>
    </div>
</body>
<!-- //Body -->

</html>