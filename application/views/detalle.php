<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s años</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			 	</tr>";
$htmltrows = "";

foreach ($arr as $a) {
	$id_corredor = $a['id_corredor'];
	$htmltrows .= sprintf($htmltrow,
		$a['nombre'],$a['numero'], htmlspecialchars($a['edad']),htmlspecialchars($a['municipio']),
		htmlspecialchars($a['departamento']),htmlspecialchars($a['pais']),htmlspecialchars($a['email']),htmlspecialchars($a['rama'])
		,htmlspecialchars($a['telefono']),htmlspecialchars($a['familiar']),htmlspecialchars($a['telefono_familiar']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Nomina de corredores</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/m2.png"/> Nomina de corredores</h1>
	</header>

	<div id="body" class="table-responsive">

 		<table class="table table-bordered">
			<thead>
				<th>Nombre del atleta</th>
				<th>Número</th>
				<th>Edad</th>
				<th>Municipio</th>
				<th>Departamento</th>
				<th>País</th>
        <th>Email</th>
				<th>Rama</th>
				<th>Numero de telefono</th>
				<th>Contacto familiar</th>
				<th>Numero de telefono</th>
			</thead>
			<tbody>
				<?=$htmltrows?>
			</tbody>
		</table>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio">Listo</a>
		<td><a class='btn btn-secondary' href="<?=$base_url?>/corredor/editar/<?=$id_corredor?>">editar</a></td>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div><br><br><br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
</html>
