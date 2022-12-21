<?php
error_reporting(0);
 $calisan_id = $_POST['calisan_id'];
 $calisan_ad = $_POST['calisan_ad'];
 $calisan_soyad = $_POST['calisan_soyad'];
 $gorev = $_POST['gorev'];
 $calisan_tel = $_POST['calisan_tel'];
 
$baglan=mysqli_connect("localhost","root","","cafekds"); 
mysqli_set_charset($baglan, "utf8");
 
$sqlekle="INSERT INTO calisan( calisan_id, calisan_ad, calisan_soyad, gorev, calisan_tel) 
VALUES ('$calisan_id','$calisan_ad','$calisan_soyad','$gorev','$calisan_tel')";
 
$sonuc=mysqli_query($baglan,$sqlekle);
 
if ($sonuc==0)
echo "Eklenemedi, kontrol ediniz";
else
header("Location: http://localhost/kkds/calisan_ekle.php");

 
?>

