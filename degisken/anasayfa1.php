<?php

$db = new mysqli("localhost","root","","cafekds");

$musterisorgu = $db->prepare("select MAX(siparis_sayisi) s_sayisi from guncel_siparis_sayisi");
$musterisorgu->execute();
$musterisonuc = $musterisorgu->get_result();
$musteri_sayisi = $musterisonuc->fetch_assoc();
$musterisorgu->close();

$satissorgu = $db->prepare("SELECT sum(siparis.adet) s_id from siparis");
$satissorgu->execute();
$satissonuc = $satissorgu->get_result();
$satis_sayisi = $satissonuc->fetch_assoc();
$satissorgu->close();

$subesorgu = $db->prepare("select COUNT(dukkan_no) d_no from kahve_dukkani");
$subesorgu->execute();
$subesonuc = $subesorgu->get_result();
$sube_sayisi = $subesonuc->fetch_assoc();
$subesorgu->close();

$bankasorgu = $db->prepare("select COUNT(urun_id) u_id from urun");
$bankasorgu->execute();
$bankasonuc = $bankasorgu->get_result();
$banka_sayisi = $bankasonuc->fetch_assoc();
$bankasorgu->close();

$db->close();


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div id="aaa">
    <form method="POST" action="anasayfa.php">
    <table border="1"  style="margin:0px;">
    <style>
    .body{ font: 25px sans-serif; }
    .wrapper{ 
    width: 600px;
    padding: 30px;
    text-align: center;
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden;
    background-color:rgb(199, 187, 195);}
    #aaa{ 
    font: 14px sans-serif;
    width: 850px;
    padding: 20px;
    text-align: center;
    position: absolute;
    top: 30%;
    left: 35%;
    transform: translate(-50%,-50%);
    overflow: hidden;
    background-color:  #0000;
}
}
</style>
</head>
<body>
<div class="content-wrapper">
<section class="content">
      <div class="container-fluid">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $sube_sayisi["d_no"]; ?></h3>

                <p>Toplam Şube Sayısı</p>
              </div>
              <div class="icon">
                
              </div>
          </div>

            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $satis_sayisi["s_id"]; ?></h3>
                <p>Toplam Sipariş Adeti</p>
              </div>
              <div class="icon">
              
            </div>

            <div class="container-fluid">

            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $musteri_sayisi["s_sayisi"];?></h3>

                <p>Güncel Sipariş Sayısı</p>
              </div>
              <div class="icon">

            </div>
          </div>
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $banka_sayisi["u_id"]; ?></h3>

                <p>Toplam Ürün Adeti</p>
              </div>
              <div class="icon">
            </div>
</body>
</html>