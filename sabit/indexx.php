
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Kahve Firması Dashboard | KDS </title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  height: 100%;
  width: 240px;
  background: #3d2541;
  transition: all 0.5s ease;
}
.sidebar .logo-details{
  height: 80px;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 28px;
  font-weight: 500;
  color: rgb(199, 187, 195);
  min-width: 60px;
  text-align: center
}
.sidebar .logo-details .logo_name{
  color: rgb(199, 187, 195);
  font-size: 24px;
  font-weight: 500;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  height: 50px;
}
.sidebar .nav-links li a{
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li a.active{
  background: #1b041d;
}
.sidebar .nav-links li a:hover{
  background: #760094;
}
.sidebar .nav-links li i{
  min-width: 60px;
  text-align: center;
  font-size: 18px;
  color: rgb(153, 146, 152);
}
.sidebar .nav-links li a .links_name{
  color: rgb(165, 156, 165);
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
}
 </style>
</head>  
 
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CC&KDS</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="anasayfa.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Anasayfa</span>
          </a>
        </li>
        <li>
          <a href="analizler.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">İstatistikler</span>
          </a>
        </li>
        <li>
          <a href="urunler.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Ürünler</span>
          </a>
        </li>
        <li>
          <a href="siparis_liste.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Sipariş Listesi</span>
          </a>
        </li>
        <li>
          <a href="musteriler.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Müşteriler</span>
          </a>
        </li>
        <li>
          <a href="calisanlar.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Çalışanlar</span>
          </a>
        </li>
        <li>
          <a href="calisan_ekle.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Çalışan Ekle</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Çıkış</span>
          </a>
        </li>
      </ul>
  </div>
</body>
</html>
