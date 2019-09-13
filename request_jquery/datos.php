<?php
mysql_connect('localhost','root','');
mysql_select_db('bd_carrera_atanacio_tzul');
$Accion = $_REQUEST['Accion'];

if (is_callable($Accion)) {
	$Accion();
}

function GetPais(){
	header('Content-Type: application/json')
	$pais = array();
	$Consulta = mysql_query("SELECT id_pais, nombre_pais
			FROM 	pais
			order by nombre_pais ASC
			LIMIT 	1000");

	while ($Fila = mysql_fetch_assoc($Consulta)) {
		$Pais[] = $Fila;
	}
	echo json_encode($Pais);
}
 ?>
