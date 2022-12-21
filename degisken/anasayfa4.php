<?php
 
$dataPoints3 = array();
try{
    $link = new \PDO(   'mysql:host=localhost;dbname=cafekds;charset=utf8mb4', 
                        'root',
                        '', 
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
        array_push($dataPoints3, array("y"=> $row->y, "label"=> $row->x));
    }
	$link = null;
	
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<div class="content-wrapper">

 
<script>
    

window.onload = function () {
 
var chart3 = new CanvasJS.Chart("tablo3", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Verilen Siparişlerin Toplam Tutarları"
	},
	data: [{
		type: "area", //change type to bar, line, area, pie, etc  
		dataPoints3: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
	
});
chart3.render();
 
}

</script>
</head>

<body>
<div id="tablo3" 
 style="height: 350px; width: 40%; margin-left:1450px;  margin-top:0px; font: 14px sans-serif;
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