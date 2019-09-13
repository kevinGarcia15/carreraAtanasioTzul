<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
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
		<h1><img width="50" src="<?=$base_url?>/recursos/img/cor.png"/> Ingreso de corredores</h1>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/corredor/crear/" method="POST"><center>
			<table class="form-container" border="0">
				<tr>
					<td><strong>Ingrese No. de documento DPI</strong></td>
					<td>
						<input type="number" min="1000000000000" max="9999999999999" class="form-control" placeholder="CUI de 13 digitos" name="CUI"  required value="<?=$CUI?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombres completos <strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="mínimo 10 caracteres" name="nombre" required maxlength="50" minlength="10" size="50" value="<?=$nombre?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onblur="validarFecha()" type="date" class="form-control" name="fecha_nacimiento" required value="<?=$fecha_nacimiento?>">
					</td>
				</tr>
				<tr>
					<td><strong>Número<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" min="1"  class="form-control" min="1" placeholder="Número del Atleta" name="numero" required value="<?=$numero?>">
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
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Departamento</strong></td>
					<td>
						<select class="custom-select" name="departamento" id="departamento">
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Municipio</strong></td>
					<td>
						<select class="custom-select" name="municipio" id="municipio">
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese e-mail</strong></td>
					<td>
						<input type="email" class="form-control" placeholder="E-mail" name="email"  value="<?=$email?>">
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese No. de Teléfono</strong></td>
					<td>
						<input type="number" min="10000000" max="99999999" class="form-control" placeholder="Teléfono" name="telefono"  value="<?=$telefono?>">
					</td>
				</tr>
				<tr>
					<td><strong>Información de contacto Familiar</strong></td>
						<td>
							<input id="names"  type="text" class="form-control" placeholder="Nombre Familiar" name="nombre_familiar"  value="<?=$nombre_familiar?>">
							<input type="number" min="10000000" max="99999999" class="form-control" placeholder="Teléfono" name="telefono_familiar"  value="<?=$telefono_familiar?>">
						</td>
				</tr>
					<td colspan="2">
						<center>
							<?=$boton?>
						</center>
					</td>
				</tr>
			</table>
			</center>
		</form>
	</div>
<br>
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
	var resta = hoy.setFullYear(hoy.getFullYear()-10);
	var suma = hoy.setFullYear(hoy.getFullYear()-90);
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form <= suma) {
  alert('Fecha no valida, debe ingresar una fecha mayor a 1920');
	  document.getElementById("fecha").value = "";
	return 0;
}
if (fecha_form >= resta) {
  alert('Fecha no valida, debe ingresar una fecha de por lo menos 10 años atras');
	  document.getElementById("fecha").value = "";
}

else {

}
}
</script>
</html>
