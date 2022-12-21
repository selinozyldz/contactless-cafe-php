<?php

 
$dataPoints = array();
try{
    $link= new \PDO(   'mysql:host=localhost;dbname=cafekds;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('SELECT (kahve_dukkani.dukkan_ad) as x, COUNT(siparis.siparis_id) as y 
    FROM kahve_dukkani,siparis 
    WHERE siparis.dukkan_no=kahve_dukkani.dukkan_no 
    GROUP BY kahve_dukkani.dukkan_ad '); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach($result as $row){
        array_push($dataPoints, array("y"=> $row->y, "label"=> $row->x));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
$dataPoints2 = array();
try{
    $link= new \PDO(   'mysql:host=localhost;dbname=cafekds;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    $handle = $link->prepare('SELECT fatura.siparis_id as x, fatura.toplam_tutar as y 
    FROM fatura
    GROUP BY fatura.siparis_id'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach($result as $row){
        array_push($dataPoints2, array("y"=> $row->y, "label"=> $row->x));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
$dataPoints3 = array();
try{
    $link3= new \PDO(   'mysql:host=localhost;dbname=cafekds;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );

    $handle3 = $link3->prepare('SELECT urun.urun_ad as x, COUNT(siparis.siparis_id) as y 
    FROM urun,siparis 
    WHERE siparis.urun_id=urun.urun_id
    GROUP BY urun.urun_ad '); 
    $handle3->execute(); 
    $result3 = $handle3->fetchAll(\PDO::FETCH_OBJ);
    foreach($result3 as $row3){
        array_push($dataPoints3, array("y"=> $row3->y, "label"=> $row3->x));
    }
    $link3 = null;
	
}
catch(\PDOException $ex3){
    print($ex3->getMessage());
}



	
?>
<!DOCTYPE HTML>
<html>
<head>  
<div class="content-wrapper">

 
<script>
    

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Şubelere Göre Sipariş Sayısının Dağılımı"
	},
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
	
});
chart.render();

var chart2 = new CanvasJS.Chart("tablo2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Verilen Siparişlerin Toplam Tutarları"
	},
	data: [{
		type: "area", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
	
});
chart2.render();

var chart3 = new CanvasJS.Chart("tablo3", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Ürünlerin Sipariş Verilme Oranları"
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
	
});
chart3.render();
 
}

</script>
</head>

<body>
<div id="chartContainer" 
 style="height: 350px; width: 40%; margin-left:650px;  margin-top:0px; font: 14px sans-serif;
    padding: 10px;
    text-align: center;
    position: absolute;
    top: 75%;
    transform: translate(-50%,-50%);
    overflow: hidden;">
 </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
