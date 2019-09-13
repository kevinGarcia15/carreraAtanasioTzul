<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s años</td>
				<td><a href=\"${base_url}/corredor/detalles/%s\">ver mas</a></td>
			</tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,
		$a['Nombre'], $a['Numero'], $a['municipio'], $a['departamento'], $a['pais'], $a['rama'], $a['edad'],$a['id_corredor']);
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Busqueda Corredor</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/m2.png"/> Resultado Busqueda</h1>
	</header>

	<div id="body">
		         <div id="navbarTogglerDemo01">
            <form class="form-inline" id="navbarTogglerDemo01" action="<?=$base_url?>/corredor/buscar" method="POST">
              <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="número de atleta" aria-label="Search">
              <button class="btn btn-outline-success mr-sm-2" type="submit">Buscar</button>
            </form>
          </div>

		<table class="table-responsive">
			<thead>
				<th>Nombre</th>
				<th>Número</th>
				<th>Municipio</th>
				<th>Departamento</th>
				<th>país</th>
				<th>Rama</th>
				<th>Edad</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?=$htmltrows?>
			</tbody>
		</table>
		<div class="label label-danger" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div><br><br><br><br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
</html>
