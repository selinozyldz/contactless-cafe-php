<?php
 
$dataPoints2 = array();
try{
    $link = new \PDO(   'mysql:host=localhost;dbname=cafekds;charset=utf8mb4', 
                        'root',
                        '', 
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('SELECT urun.urun_ad as x, COUNT(siparis.siparis_id) as y 
    FROM urun,siparis 
    WHERE siparis.urun_id=urun.urun_id
    GROUP BY urun.urun_id '); 
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
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<div class="content-wrapper">

 
<script>
    

window.onload = function () {
 
var chart2 = new CanvasJS.Chart("tablo2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Ürünlerin Sipariş Verilme Oranları"
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc  
		dataPoints2: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
	
});
chart2.render();
 
}

</script>
</head>

<body>
<div id="tablo2" 
 style="height: 330px; width: 40%; margin-left:1450px;  margin-top:0px; font: 14px sans-serif;
    padding: 20px;
    text-align: center;
    position: absolute;
    top: 28%;
    transform: translate(-50%,-50%);
    overflow: hidden;">
 </div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>



