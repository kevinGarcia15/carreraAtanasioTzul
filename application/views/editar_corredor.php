<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";


foreach ($arr as $key) {
	$CUI = $key['cui'];
	$nombre = $key['nombre'];
	$fecha_nacimiento = $key['nacimiento'];
	$numero = $key['numero'];
	$email = $key['email'];
	$telefono = $key['telefono'];
	$nombre_familiar = $key['familiar'];
	$telefono_familiar = $key['telefono_familiar'];
	$id_corredor = $key['id_corredor'];

}
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Corredor</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/cor.png"/> Editar Corredor</h1>
	</header>

	<div  id="body">
		<form  action="<?=$base_url?>/corredor/editar/" method="POST">
			<table border="1">
				<tr>
					<td><strong>Ingrese No. de documento DPI</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="CUI" name="CUI"  value="<?=$CUI?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombres completos <strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre y apellido" name="nombre" required maxlength="50" size="50" value="<?=$nombre?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onchange="validarFecha()" type="text" class="form-control" name="fecha_nacimiento" required value="<?=$fecha_nacimiento;?>">
					</td>
				</tr>
				<tr>
					<td><strong>Número<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" min="1" placeholder="Número del Atleta" name="numero" required value="<?=$numero?>">
					</td>
				</tr>
				<tr>
					<td><strong>Rama<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select class="custom-select" name="rama">
							<option value="Libre">Libre</option>
							<option value="Femenina">Femenina</option>
							<option value="Master Masculina">Master Masculina</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar el país de origen</strong></td>
					<td>
						<select class="custom-select" name="pais" id="pais">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Departamento</strong></td>
					<td>
						<select class="custom-select" name="departamento" id="departamento">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Municipio</strong></td>
					<td>
						<select class="custom-select" name="municipio" id="municipio">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese e-mail</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="E-mail" name="email"  value="<?=$email?>">
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese No. de Teléfono</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Teléfono" name="telefono"  value="<?=$telefono?>">
					</td>
				</tr>
				<tr>
					<td><strong>Información de contacto Familiar</strong></td>
						<td>
							<input type="text" class="form-control" placeholder="Nombre Familiar" name="nombre_familiar"  value="<?=$nombre_familiar?>">
							<input type="text" class="form-control" placeholder="Teléfono" name="telefono_familiar"  value="<?=$telefono_familiar?>">
						</td>
				</tr>
					<td colspan="2">
						<input  type="hidden"  name="id_atleta" value="<?=$id_corredor?>">
						<input class="btn btn-primary btn-md" type="submit" role="button" name="actualizar" value="actualizar">
					</td>
				</tr>
			</table>
		</form>
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>


<script type="text/javascript">
function mensaje(){
	// confirm dialog
alertify.confirm("¿Está seguro de guardar?", function (e) {
    if (e) {
        document.getElementById("subir").submit();
    } else {
    }
});
}
//funcion Ajax para buscar en base de datos
$(function(){
	$.post('<?=$base_url?>/corredor/pais').done(function(respuesta){
		$('#pais').html(respuesta);
	});

	//lista de departamentos
	$('#pais').change(function(){
		var el_pais = $(this).val();

		$.post('<?=$base_url?>/corredor/departamento',{pais: el_pais}).done(function(respuesta){
			$('#departamento').html(respuesta);
		});
	});

	//listar de Municipios
	$('#departamento').change(function(){
		var id_depto = $(this).val();

		$.post('<?=$base_url?>/corredor/municipio',{departamento: id_depto}).done(function(respuesta){
			$('#municipio').html(respuesta);
		});
	});
})

function validarFecha()
{
	var hoy = new Date();
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form >= hoy) {
  alert('Fecha no valida');
	  document.getElementById("fecha").value = "";
}
else {

}
}
</script>
</html>
