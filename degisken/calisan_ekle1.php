
<html>
<head>
</head>
<body>
<div class="content-wrapper">
<div id="calisanlar">
<form method="POST" action="database/calisan_ekle_vt.php">
<table border="3"  style="margin:100px;" >
<style>
#calisanlar{ 
   font-size: 25px;
    width: 650px;
    padding: 10px;
    text-align: center;
    position: absolute;
    top: 30%;
    left: 25%;
    transform: translate(-50%,-50%);
    overflow: hidden;
    background-color:  #0000;
}
</style>
<tr>
<td colspan="2" align="center"> Çalışan Ekleme Formu</td>
 
</tr>
<tr>
<td>ID</td>
<td><input type="text" name="calisan_id"></td>
</tr>
</tr>
<tr>
<td>Adı</td>
<td><input type="text" name="calisan_ad"></td>
</tr>
<tr>
<td>Soyadı</td>
<td><input type="text" name="calisan_soyad"></td>
</tr>
<tr>
<td>Görev</td>
<td><input type="text" name="gorev"></td>
</tr>
<tr>
<td>Telefon</td>
<td><input type="text" name="calisan_tel"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Kaydet"></td>
</tr>
</table>
</form>
</div>
</body>
 
</html>