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
 <div id="calisanlar"
<form method="POST" action="database/calisan_ekle.php">
<table border="1"  style="margin:0px;">
<style>
#calisanlar{ 
    width: 880px;
    padding: 60px;
    text-align: center;
    position: absolute;
    top: 43%;
    left: 30.5%;
    transform: translate(-50%,-50%);
    overflow: hidden;

}
</style>
 <p>
 <?php
  try {
  $con= new PDO('mysql:charset=utf8mb4;mysql:host=localhost;dbname=cafekds', "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $query = "SELECT calisan.calisan_id as 'Çalışan ID', calisan.calisan_ad as 'Ad', calisan.calisan_soyad as 'Soyad', calisan.gorev as 'Görevi', calisan.calisan_tel as 'Telefon Numarası'
  FROM calisan
  ORDER BY calisan.calisan_id ASC";
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