<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inclunet|<?php if ($this->session->userdata('s_level')!==NULL){echo $this->session->userdata('s_name');}?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?= site_url("/css/materialize.min.css"); ?>">
	<link rel="stylesheet" href="<?= site_url("/css/fonts.css"); ?>">
	<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
	<script src="<?= site_url("/js/jquery.js"); ?>"></script>
	<script src="<?= site_url("/js/materialize.min.js"); ?>"></script>
	<script src="<?= site_url("/code/highcharts.js"); ?>"></script>
	<script src="<?= site_url("/code/highcharts-3d.js"); ?>"></script>
	<script src="<?= site_url("/code/modules/exporting.js"); ?>"></script>
	
	<script>
		$(function() {
			$(".button-menu").sideNav();
			$('select').material_select();
			/*----------  Carrucel de Imagenes  ----------*/
			$('.carousel.carousel-slider').carousel({fullWidth: true});
			/*Otro gato*/
			$('.collapsible').collapsible();
			/*----------  conteo de caracteres  ----------*/
			$('input#input_text, textarea#textarea1').characterCounter();
			
		});
	</script>
	
	
</head>
<body>