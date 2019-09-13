<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>

	<title>Autenticación</title>
</head>
<body>

<div id="container">
		<?php $this->load->view('menu'); ?>
	<header>
		<center><h1><img width="80" src="<?=$base_url?>/recursos/img/OP.png"/> Ingrese sus credenciales</h1></center>
	</header>
<br><br>
	<div class="abs-center">
		<div id="container-fluid bg">
			<div class="row">
				<form action="<?=$base_url?>/usuario/login/" method="POST" class="form-container" >

					<div class="form-group">
						<label>Usuario</label>
						<input type="text" class="form-control" placeholder="Username" name="usuario">
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" class="form-control" placeholder="Password" name="clave" required>
					</div>
					<td colspan="2">
						<center><input type="submit" class="btn btn-info btn-md" role="button" name="login" value="Login">
						</center>
					</td>
				</form>
			<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
		</div>
	</div>
</div>

</body>
</html>
