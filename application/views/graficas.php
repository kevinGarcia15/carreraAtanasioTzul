<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

$corredores_Femeninas = 0;
$corredores_Masculino = 0;
$corredores_Libre = 0;

foreach ($arr as $a) {
	if ($a['Rama'] == 'Femenina') {
		$corredores_Femeninas = $corredores_Femeninas + 1;
	}
	if ($a['Rama'] == 'Master Masculina') {
		$corredores_Masculino = $corredores_Masculino + 1;# code...
	}
	if ($a['Rama'] == 'Libre') {
		$corredores_Libre = $corredores_Libre + 1;# code...
	}
	$NombreRama[] = $a['Rama'];
}
//datos departamentos
$valoresY = array();
$valoresX = array();
foreach ($depto as $key) {
	$valoresY[] = $key['total'];
	$valoresX[]= $key['departamento'];
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);
//datos municipio

$valoresMunY = array();
$valoresMunX = array();
foreach ($muni as $key) {
	$valoresMunY[] = $key['total'];
	$valoresMunX[]= $key['municipio'];
}

$datosMunX = json_encode($valoresMunX);
$datosMunY = json_encode($valoresMunY);

?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Gráficas</title>
</head>
		<body>

		<div id="container">
			<!--<?php $this->load->view('menu'); ?>-->
			<header>
				<h1><img width="70" src="<?=$base_url?>/recursos/img/cor.png"/>Gráficas</h1>
			</header>
			<div  id="body">
		<div class="container">
	<div id="demo" class="carousel slide" data-ride="carousel">

	 <div class="efecto">
	  <!-- Indicators -->
	  <ul class="carousel-indicators ">
	    <li data-target="#demo" data-slide-to="0" class="active"></li>
	    <li data-target="#demo" data-slide-to="1"></li>
	    <li data-target="#demo" data-slide-to="2"></li>
	    <li data-target="#demo" data-slide-to="3"></li>
	    <li data-target="#demo" data-slide-to="4"></li>
	  </ul>

	  <!-- The slideshow -->
	  <div class="carousel-inner ">
	    <div class="carousel-item active">
	      
	      <div id="grafica"class="">
			</div>
	    </div>
	    <div class="carousel-item">
	<div id="depto"class="">

						</div>
	    </div>
	    <div class="carousel-item">
<div id="municipio"class="">

					</div>
	    </div>
	    
	  </div>
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
	    <span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
	    <span class="carousel-control-next-icon"></span>
	  </a>
	</div>
	</div>
			</div>
			</div>
			<!--<footer><?php $this->load->view('footer') ?></footer>-->
		</div>
	</body>
	
	<style>
		.carousel-indicators{
 			-webkit-transition: all 15s;
   			transition: all 15s;
		}

	</style>
	<script type="text/javascript">
		function CrearCadenaLineal(json){
			var parsed = JSON.parse(json);
			var arr = [];
			for (var x in parsed) {
				arr.push(parsed[x]);
			}
			return arr;
		}

		//genera graficas de los departamentos
datosX = CrearCadenaLineal('<?php echo $datosX; ?>');
datosY = CrearCadenaLineal('<?php echo $datosY; ?>');
var trace1 = {
	x: datosX,
	y: datosY,
	type: 'bar',
	type: 'bar',
	  text: datosY.map(String),
	  textposition: 'auto',
	  hoverinfo: 'none'
};

var data2 = [trace1];

var layout2 = {
title: "Corredores por departamento"
};

Plotly.newPlot('depto', data2, layout2, {responsive: true});

//genera graficas de los departamentos Totonicapán
function CrearCadenaLinealMun(json){
	var parsed = JSON.parse(json);
	var arr = [];
	for (var x in parsed) {
		arr.push(parsed[x]);
	}
	return arr;
}
datosMunX = CrearCadenaLinealMun('<?php echo $datosMunX; ?>');
datosMunY = CrearCadenaLinealMun('<?php echo $datosMunY; ?>');
var traceMun1 = {
x: datosMunX,
y: datosMunY,
type: 'bar',
  text: datosMunY.map(String),
  textposition: 'auto',
  hoverinfo: 'none'
};

var dataMun2 = [traceMun1];

var layoutMun2 = {
title: "Corredores por el departamento de Totonicapán"

};

Plotly.newPlot('municipio', dataMun2, layoutMun2, {responsive: true});

//-----genera graficas del numero de rama

			var data = [{
				values: [<?php echo $corredores_Femeninas; ?>, <?php echo $corredores_Libre; ?>, <?php echo $corredores_Masculino; ?>],
				labels: ['Femenina', 'Libre', 'Master Masculina'],
				type: 'pie'
				}];

				var layout = {
				title: "Corredores por categoría"
				};

			Plotly.newPlot('grafica', data, layout, {responsive: true});
	</script>
</html>
