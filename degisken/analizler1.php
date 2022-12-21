
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h4> Toplam Sipariş Oranı En Fazla Olan 3 Şubeler</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; margin-top: 100px;margin: left 50%; border:2px;">
<thead>
<tr>
<th>Şube Adı</th>
<th>Sipariş Sayısı</th>
</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","cafekds");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query('SELECT (kahve_dukkani.dukkan_ad) as ad, COUNT(siparis.siparis_id) as siparis_sayisi
FROM kahve_dukkani,siparis 
WHERE siparis.dukkan_no=kahve_dukkani.dukkan_no 
GROUP BY kahve_dukkani.dukkan_ad 
ORDER BY siparis_sayisi desc
limit 3'); 

while($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$siparis_sayisi = $sonuc['siparis_sayisi']; 

?>
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $siparis_sayisi; ?></td>
    
        </tr>

<?php 
} 
?>
</div>
</tbody>
</table>
<h4>Toplam Sipariş Oranı En Az Olan Şubeler</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Şube Adı </th>
<th>Sipariş Sayısı</th>
</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","cafekds");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT (kahve_dukkani.dukkan_ad) as ad, COUNT(siparis.siparis_id) as siparis_sayisi
FROM kahve_dukkani,siparis 
WHERE siparis.dukkan_no=kahve_dukkani.dukkan_no 
GROUP BY kahve_dukkani.dukkan_ad 
ORDER BY siparis_sayisi
limit 3"); 
while ($sonuc = $sorgu->fetch_assoc()) { 
$ad= $sonuc['ad'];
$siparis_sayisi = $sonuc['siparis_sayisi']; 
?> 
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $siparis_sayisi; ?></td>
    
        </tr>

<?php 
} 
?>
</div>
</tbody>
</table>
<br>
<h4> Toplamda En Fazla Verilen 3 Sipariş</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Sipariş Adı</th>
<th>Sipariş Sayısı</th>
</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","cafekds");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT urun.urun_ad as ad, COUNT(siparis.siparis_id) as siparis_sayisi 
FROM urun,siparis 
WHERE siparis.urun_id=urun.urun_id
GROUP BY urun.urun_ad 
ORDER BY siparis_sayisi desc
LIMIT 3"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$siparis_sayisi = $sonuc['siparis_sayisi']; 
?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $siparis_sayisi; ?></td>
    
        </tr>

<?php 
} 
?>
</div>
</tbody>
</table>
<h4> Toplamda En Az Verilen Sipariş</h4>
<table class="table table-condensed table-bordered table-hover" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Sipariş Adı</th>
<th>Sipariş Sayısı</th>
</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","cafekds");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT urun.urun_ad as ad, COUNT(siparis.siparis_id) as siparis_sayisi 
FROM urun,siparis 
WHERE siparis.urun_id=urun.urun_id
GROUP BY urun.urun_ad 
ORDER BY siparis_sayisi 
LIMIT 1"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$siparis_sayisi = $sonuc['siparis_sayisi']; 
?>   
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $siparis_sayisi; ?></td>
    
        </tr>

<?php 
} 
?>
</div>
</tbody>
</table>
<br>
<br>
<h4> Faturası En Yüksek ve En Düşük Olan Siparişler </h4>
<p style="color: red;">Buna göre karşılaştırma yapılıp hangi siparişin stoğunu azaltacağımıza karar vereceğizdir.</p>
<table class="table table-condensed table-bordered table-hover" id="table_2" style="width: 600px; height: 90px; border:2px;">
<thead>
<tr>
<th>Fatura Adı</th>
<th>Fatura Tutarı </th>
<th>Fatura Tarihi </th>
</tr>
</thead>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","cafekds");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT fatura.siparis_id as ad, fatura.toplam_tutar as fatura_tutari, fatura.tarih AS tarih
FROM fatura
GROUP BY fatura.siparis_id
ORDER BY fatura_tutari DESC
LIMIT 1"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$fatura_tutari = $sonuc['fatura_tutari']; 
$tarih = $sonuc['tarih']; 
?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $fatura_tutari; ?></td>
        <td><?php echo $tarih; ?></td>
        </tr>

<?php 
} 
?>
</div>
</tbody>
<tbody>
<?php 
$baglanti=mysqli_connect("localhost","root","","cafekds");
  $baglanti->set_charset("utf8");
  $baglanti->query('SET NAMES utf8');

$sorgu = $baglanti->query("SELECT fatura.siparis_id as ad, fatura.toplam_tutar as fatura_tutari, fatura.tarih AS tarih
FROM fatura
GROUP BY fatura.siparis_id
ORDER BY fatura_tutari
LIMIT 1"); 

while ($sonuc = $sorgu->fetch_assoc()) { 
$ad=  $sonuc['ad'];
$fatura_tutari = $sonuc['fatura_tutari']; 
$tarih = $sonuc['tarih']; 
?>
    
    <tr>
      <td><?php echo $ad; ?></td>
        <td><?php echo $fatura_tutari; ?></td>
        <td><?php echo $tarih; ?></td>
        </tr>

<?php 
} 
?>
</div>
</tbody>
</table>
</div>
</script> 
</body> 
</html>
</body>
</html>
