<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Carrera Atanasio Tzul</title>
</head>

<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<div class="loader">
    	<img src="<?=$base_url?>/recursos/img/40.gif" alt="Loading..." />
	</div>
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
	      <img src="<?=$base_url?>/recursos/img/p1.jpg"  style="width: 100%; ">
	    </div>
	    <div class="carousel-item">
	      <img src="<?=$base_url?>/recursos/img/edicion.jpg" style="width: 100%;">
	    </div>
	    <div class="carousel-item">
	      <img src="<?=$base_url?>/recursos/img/j2.jpg" style="width: 100%;">
	    </div>
	    <div class="carousel-item">
	      <img src="<?=$base_url?>/recursos/img/j3.jpg" style="width: 100%;">
	    </div>
	   	<div class="carousel-item">
	      <img src="<?=$base_url?>/recursos/img/p1.jpg" style="width: 100%;">
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
	</div><br><br>
	<section id="footer2"></section>
	<div class="container-flu bg-primary"></div><br>
	 	<section id="info2">
	        <div class="container">
	            <div class="info text-center"><br>
	                <h4>BIENVENIDOS</h4><br>
	             </div>
	        </div>
	    </section>

 	<section id="plx">
        <div class="containe">
            <div class="wtitle text-center text-light">
                <h2>Bienvenido a la experiencia inolvidable de su vida deportiva</h2>
                <h2>¡Disfruta al Máximo esta carrera dedicado a usted!</h2>
            </div>
        </div> 
   </section>
  <br> <br>
	<section>
    <div class="card-group text-center">
      <div class="col-md-12 col-lg-6">
        <div class="card m-6">
          <img class="card-img-top mb-1" src="<?=$base_url?>/recursos/img/playe.jpg" alt="Card image cap">
        </div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="card m-6">
          <img class="card-img-top mb-1" src="<?=$base_url?>/recursos/img/media.jpg" alt="Card image cap">
        </div>
      </div>
    </div>
   </section>
	<section>
     <div class="galeria">
        <div class="contenedor-imagenes">
            <div class="imagen">
                <img src="<?=$base_url?>/recursos/img/m3.png" alt="">
            </div>
            <div class="imagen">
                <img src="<?=$base_url?>/recursos/img/patrocinador.jpg" alt="">
            </div>
            <div class="imagen">
                <img src="<?=$base_url?>/recursos/img/M3.jpg" alt="">
            </div>
          </div><br>
          <div class="contenedor-imagenes">   
            <div class="imagen">
                <img src="<?=$base_url?>/recursos/img/M2017.jpg" alt="">
            </div>
            <div class="imagen">
                <img src="<?=$base_url?>/recursos/img/f22.jpg" alt="">
            </div>
            <div class="imagen">
                <img src="<?=$base_url?>/recursos/img/f21.jpg" alt="">
            </div>
          </div>
        </div>
       </section>
	<br><br>
	<section id="info2">
	    <div class="container">
	        <div class="info text-center"><br>
	           	<h4>RECORRIDO</h4><br>
	         </div>
	    </div>
      	<section><center>
    <div class="contenedor">
        <iframe src="https://www.google.com/maps/d/embed?mid=1FcQYxObPNdVJNIKfkCh70iL4RppzqP-L&hl=es-419" width="1080" height="720" frameborder="0" style="border:0" allowfullscreen class=""></iframe>
    </center></div>          
  </section>
	</section>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
</body>

</html>
