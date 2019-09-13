<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/recursos/css/bootstrap.min.css" />
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/popper.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/edicion-plan.js"></script>
	<script src="<?=$base_url?>/recursos/js/alertify.js-0.3.11/lib/alertify.min.js"></script>
	<script src="<?=$base_url?>/recursos/js/plotly-latest.min.js"></script>
	<link rel="stylesheet" href="<?=$base_url?>/recursos/js/alertify.js-0.3.11/themes/alertify.core.css" />
	<link rel="stylesheet" href="<?=$base_url?>/recursos/js/alertify.js-0.3.11/themes/alertify.default.css" />
	<link rel="icon" href="<?=$base_url?>/recursos/img/atanasio.png">


	<!--link rel="icon" href="<?=$base_url?>/favicon.ico"-->

	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

  #names{
    text-transform: capitalize;
}
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #040455;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	th, td { padding: 5px; }

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	#container {
		margin: -38px;
		border: 0px solid #D0D0D0;
		box-shadow: 0 0 0px #D0D0D0;
	}

	.bs-callout {
	    padding: 20px;
	    margin: 20px 0;
	    border: 1px solid #eee;
	    border-left-width: 5px;
	    border-radius: 3px;
	}
	.bs-callout h4 {
	    margin-top: 0;
	    margin-bottom: 5px;
	}
	.bs-callout p:last-child {
	    margin-bottom: 0;
	}
	.bs-callout code {
	    border-radius: 3px;
	}
	.bs-callout+.bs-callout {
	    margin-top: -5px;
	}
	.bs-callout-default {
	    border-left-color: #777;
	}
	.bs-callout-default h4 {
	    color: #777;
	}
	.bs-callout-primary {
	    border-left-color: #428bca;
	}
	.bs-callout-primary h4 {
	    color: #428bca;
	}
	.bs-callout-success {
	    border-left-color: #5cb85c;
	}
	.bs-callout-success h4 {
	    color: #5cb85c;
	}
	.bs-callout-danger {
	    border-left-color: #d9534f;
	}
	.bs-callout-danger h4 {
	    color: #d9534f;
	}
	.bs-callout-warning {
	    border-left-color: #f0ad4e;
	}
	.bs-callout-warning h4 {
	    color: #f0ad4e;
	}
	.bs-callout-info {
	    border-left-color: #5bc0de;
	}
	.bs-callout-info h4 {
	    color: #5bc0de;
	}
	
	/*Login*/
.abs-center{
  display: flex;
  align-items: center;
  justify-content: center;
}

.form-container{
  border: 0px solid #0190a2;
  padding: 50px 60px;

-webkit-box-shadow: 2px 2px 5px #999;
-moz-box-shadow: 2px 2px 5px #999;
}

/*activaciones de botones*/
.btn-info {
    background-color:#21ddfb;
    padding: 1rem 4rem;
    border:3px solid transparent;
}

.btn-info:hover {
    background-color:transparent;
    border:3px solid #21ddfb;
    color: #21ddfb;
}

.btn-info:active {
    background-color:transparent !important;
    border:3px solid #21ddfb !important;
    color: #21ddfb !important;
}


/*texto en la imagen carrusel*/
#texto1 {
	text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}

#texto2 {
	text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}

/*cuadro de menus*/
.info {    
    margin-bottom: 0; 
}

#info2 {
    background:#082B4E;
    margin: 0px -40px 0px -40px;
}

#info3 {
    background:#191919;
    margin: 0px -40px 0px -40px;
}

.container-flu {
  height: 10px;
  margin: 0px -40px -20px -40px;
 }

h4 {
		color: #fff;
		font-size: 30px;
		font-family: sans-serif;
		font-weight: bold;
	}
h5 {
		color: #FFFFFF;
		font-size: 30px;
	}

/*car*/
.efecto {
	margin: -2px;
	border: 0px solid #D0D0D0;
	box-shadow: 0 0 0 0px #D0D0D0;

	}


/*patrocinadores*/
.portafolio{
  width: 100%;
  max-width: 1400px;
  margin: auto;
}

.portafolio h2{
  text-align: center;
  font-size: 15px;
  margin: 0px 0px 0px;
}

.portafolio-container{
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.portafolio-item{
  width: 30%;
  position: relative;
  overflow: hidden;

}

.portafolio-img{
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  width: 100%;
}

.portafolio-text{
  position: absolute;
  bottom: 0;
  padding: 10px;

  background: rgba(0,0,0,0.7);
  color: #fff;
  -webkit-transform: translateY(100%);
  -ms-transform: translateY(100%);
  transform: translateY(100%);
  -webkit-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}

.portafolio-text p{
  text-align: justify;
}

.portafolio-item:hover .portafolio-text{
  -webkit-transform: translateY(0%);
  -ms-transform: translateY(0%);
  transform: translateY(0%);
}

.portafolio-item:hover .portafolio-img{
  -webkit-transform: scale(1.15);
  -ms-transform: scale(1.15);
  transform: scale(1.15);
}


#footer1 {
    background:#04114F;
    padding: 70px;
    margin: 0px -40px 0px -40px;
}

#footer {
    background:#191919;
    padding: 40px;
    margin: 0px -40px 0px -40px;
    margin-bottom: -40px;
}

#footer2 {
    background:#EF0000;
    padding: 4px;
    margin: 0px -40px 0px -40px;
    margin-bottom: 0px;
}

#footer3 {
    background:#DAEF09;
    padding: 2px;
    margin: 0px -40px 0px -40px;
    margin-bottom: 0px;
}

hr {
 	color: #FFFFFF;
}
h6 {
		color: #989797;
		font-size: 25px;
	}

/*efecto imagen fondo*/
#plx {
    background: url(<?=$base_url?>/recursos/img/corredor.jpg);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0px -40px -20px -40px;
}

#plx1 {
    background: url(<?=$base_url?>/recursos/img/patro.jpg);
    height: 250px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0px -40px 0px -40px;
}


.wtitle {
    padding: 150px 20px; 
    text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;   
}

.wtitle h2 {
    font-size: 36px;
    font-weight: bold;
}

.wtitle1 {
    padding: 100px 20px; 
    text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;   
}

.wtitle1 h3 {
    font-size: 45px;
    font-weight: bold;
    font-family: Ananda Black;
}


.loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader > img {
    width: 400px;
}

.loader.hidden {
    animation: fadeOut 0.10s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }
}

.thumb {
    height: 150px;
    border: 1px solid black;
    margin: 5px;
}


.contenedor-imagenes{
    display:flex;
    width: 85%;
    margin: auto;
    justify-content: space-around;
    flex-wrap: wrap;
    border-radius:3px;
}

.contenedor-imagenes .imagen{
    width: 32%;
    position: relative;
    height:250px;
    margin-bottom:10px;
    box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, .75)
}
.imagen img{
    width: 100%;
    height:100%;
    object-fit: cover;
}


@media screen and (max-width:1000px){
    .contenedor-imagenes{
        width: 100%;
    }
}

@media screen and (max-width:700px){
    .contenedor-imagenes{
        width: 90%;
    }
    .contenedor-imagenes .imagen{
        width: 48%;
    }
}

@media screen and (max-width:450px){
    h1{
        font-size:35px;
    }
    .contenedor-imagenes{
        width: 98%;
    }
    .contenedor-imagenes .imagen{
        width: 90%;
    }
}
iframe {
    width: 100%;
    height: 720px;
}


</style>

<script type="text/javascript">
	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " hidden";
});
</script>

