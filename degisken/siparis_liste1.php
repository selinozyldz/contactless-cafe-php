<!DOCTYPE html>
<html lang="tr">
 <head>
 <meta charset = "utf8_turkish_ci">
 <title>contact.php</title>
 <div class="content-wrapper">
 <style type = "text/css">
  table, th, td {border: 2px solid gray;
  padding-left:30px;
  margin-top: 50px;
  margin-left: 50px;
   };
 </style>
 </head>
 <body>
 <div id="siparis">
<form method="POST" action="database/calisan_ekle.php">
<table border="1"  style="margin:0px;">
<style>
#siparis{ 
    width: 830px;
    padding: 49px;
    text-align: center;
    position: absolute;
    top: 225%;
    left: 30%;
    transform: translate(-50%,-50%);
    overflow: hidden;

}
</style>
 <p>
 <?php
  try {
  $con= new PDO('mysql:charset=utf8mb4;mysql:host=localhost;dbname=cafekds', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "

  SELECT siparis.siparis_id as 'Sipariş ID', siparis.musteri_id AS 'Müşteri ID', urun.urun_ad AS 'Ürün Adı', boy.boy_ad AS 'Boy Adı', urun.fiyat AS 'Ürün Fiyatı'
FROM urun,siparis, boy
WHERE urun.urun_id=siparis.urun_id AND urun.boy_id=boy.boy_id
ORDER BY siparis.siparis_id DESC";
  //first pass just gets the column names
  print "<table> ";
  $result = $con->query($query);
  //return only the first row (we only need field names)
  $row = $result->fetch(PDO::FETCH_ASSOC);
  print " <tr> ";
  foreach ($row as $field => $value){
   print " <th>$field</th> ";
  } // end foreach
  print " </tr> ";
  //second query gets the data
  $data = $con->query($query);
  $data->setFetchMode(PDO::FETCH_ASSOC);
  foreach($data as $row){
   print " <tr> ";
   foreach ($row as $name=>$value){
   print " <td>$value</td> ";
   } // end field loop
   print " </tr> ";
  } // end record loop
  print "</table> ";
  } catch(PDOException $e) {
   echo 'ERROR: ' . $e->getMessage();
  } // end try
 ?>
 </p>
 </body>
</html>