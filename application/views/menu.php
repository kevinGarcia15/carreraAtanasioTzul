<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">

}
<?php
if (isset($this->session->USUARIO)) { // Sesión iniciada
  $log = "<a class=\"nav-item nav-link active \" style=\"color: white;\" href=\"${base_url}/usuario/logout\">SALIR</a>";
} else {
  $log = "<a class=\"nav-item nav-link active \"style=\"color: white;\" href=\"${base_url}/usuario/login\">ENTRAR</a>";
}
 ?>
</style>

<nav class="navbar navbar-dark bg-dark navbar-expand-sm" >
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?=$base_url?>/inicio">
    <img src="<?=$base_url?>/recursos/img/m2.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
    Atanasio Tzul
  </a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <div class="navbar-nav">
       <a class="nav-item nav-link active" href="<?=$base_url?>/inicio">Inicio</a>
        <a class="nav-item nav-link" href="<?=$base_url?>/Galeria">Galeria</a>
        <a class="nav-item nav-link" href="<?=$base_url?>/Patrocinador">Patrocinadores</a>
        <a class="nav-item nav-link" href="https://www.facebook.com/mediomaraton.atanasiotzul.54" target="_blank">Informacion</a>
         <div id="navbarTogglerDemo01">
            <form class="form-inline" id="navbarTogglerDemo01" action="<?=$base_url?>/corredor/buscar" method="POST">
              <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="número de atleta" aria-label="Search">
              <button class="btn btn-outline-success mr-sm-2" type="submit">Buscar</button>
            </form>
          </div>

        <?php if ($this->session->ROL == 'Administrador') { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Corredor
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a class="dropdown-item" href="<?=$base_url?>/corredor/crear">Ingresar Corredor</a>
           </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/usuario/crear">Ingresar usuario</a>
           </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Informes
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/informes/graficas">Gráficas</a>
            <a class="dropdown-item" href="<?=$base_url?>/informes/Nomina">Listar Corredor</a>
           </div>
          </li>
          <!--<div id="navbarTogglerDemo01">
            <form class="form-inline" id="navbarTogglerDemo01" action="<?=$base_url?>/corredor/buscar" method="POST">
              <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="número de atleta" aria-label="Search">
              <button class="btn btn-outline-success mr-sm-2" type="submit">Buscar</button>
            </form>
          </div> -->
          <?php } ?>
        <?php if ($this->session->ROL == 'Digitador') { ?>
         <a class="nav-item nav-link" href="<?=$base_url?>/corredor/crear">Ingresar Corredor</a>
        <?php } ?>

      </div>
    </div>
    <?=$log?>
</nav>
