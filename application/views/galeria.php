<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<?php $this->load->view('header'); ?>
	<title>Galería</title>
</head>
<body>
  <!--<div class="loader">
      <img src="<?=$base_url?>/recursos/img/40.gif" alt="Loading..." />
  </div> !-->
	<div id="container">
		<?php $this->load->view('menu'); ?>
		
    <section id="info5">
          <div class="container">
              <div class="info text-center">
                <br>
                  <h2 id="wa" class="text-center display-4 my-4">Galería de Imágenes</h2>
                </div>
                <br>
          </div>
      </section>
  <section>
    <div class="card-columns" id="fotos"></div>
  <script>
    var imagenes = ['j4','j5','j6','j7','j8','j9','j10','j11','j12', 'j13', 'j14', 'j15', 'j16', 'j17', 'j18', 'j19', 'j20', 'j21', 'j22','j23','j24','j25','j26','j27', 'j28','j29','j30','j31','j32','j33'];
    var fotos = document.getElementById('fotos');

    for(foto of imagenes){
      fotos.innerHTML += ` 
      <div class="card">
        <a data-toggle="modal" data-target="#id${foto}">
          <img class="card-img-top" src="<?=$base_url?>/recursos/img/${foto}.jpg">
        </a>
      </div>
      <div class="modal fade" id="#id${foto}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <button type="button" class="close mr-4" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <img class="img-fluid rounded" src="<?=$base_url?>/recursos/img/${foto}.jpg" >
        </div>
      </div>`
    }
  </script>
</section>

<footer><?php $this->load->view('footer') ?></footer>
</body>
</html>