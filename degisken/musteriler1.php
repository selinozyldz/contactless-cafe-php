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
 <div id="musteriler"
<form method="POST" action="database/calisan_ekle.php">
<table border="1"  style="margin:0px;">
<style>
#musteriler{ 
    width: 870px;
    padding: 49px;
    text-align: center;
    position: absolute;
    top: 35%;
    left:31%;
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

  SELECT musteri.musteri_id as 'Müşteri ID', musteri.musteri_ad as 'Müşteri Ad', musteri.musteri_soyad as 'Müşteri Soyad', musteri.musteri_tel_no as 'Telefon', sehir.sehir_ad as 'İlçe' 
FROM sehir, musteri
WHERE musteri.sehir_id=sehir.sehir_id
ORDER BY musteri.musteri_id ASC
  ";
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
</div>
 </body>
</html>