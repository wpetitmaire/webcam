<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Webcam lac</title>
		<!-- <link rel="stylesheet" href="./styles/reset.css"> -->
		
		<!-- <link rel="stylesheet" href="./libs/mdl/material.min.css"> -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<!-- Material Design for Bootstrap CSS -->
		<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
		<link rel="stylesheet" href="./styles/positionnement.css">
	</head>

	<?php

		$anneeCours = date('Y');
		$moisCours = date('m');
		$jourCours = date('d');

		$picturesPath = 'http://78.196.89.58/webcam/pictures/intervalSnapshots/';
		$lastSnapshot = 'lastsnap.jpg';

	?>


	<body>

		<div id='menuPanel' class="menu flex-container-columns closed" >
			<div style="align-self: end">
				<a href="javascript:void(0)" id='menuCloseButton' class="closebtn" >&times;</a>
			</div>
			<div>
				<a href="#">Direct</a>
			</div>
			<div>
				<a href="#">Captures</a>
			</div>
		</div>

		<!-- Menu / titre -->
		<div class='title flex-container-rows' style="padding-left: 20px;">
			<div id='menuButton' class='menu-icon'></div>
			<div style="flex: 1;text-align: center;">
				<H1>Webcam du Lac</H1>
			</div>
			
		</div>

		<div>

			<!-- Barre titre -->
			<div class='flex-container-rows title-bar corps'>
				<!-- Titre -->
				<div style='align-self: center;'>
					<h2 id='titreCam'>En direct</h2>
				</div>
			</div>

			<!-- Conteneur Image webcam -->
			<div class='fullpicture-container'>
				<div class='snapshot'>
					<img id='imgLive' name="Webcam Lac" src="http://78.196.89.58:8082/"  alt="Vue sur le lac" title="Direct" />
					<img id='imgLastSnap' class='display-none' name='Dernière capture' src=<?=$picturesPath.$lastSnapshot?> />
				</div>
			</div>

		</div>

		<!-- <button id='btnGetFichiers' style="width: 100px; height: 30px">CHARGER IMAGES</button> -->

	</body>

	<script src='./libs/jquery/jquery-3.3.1.min.js'></script>
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
	<!-- <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script> -->
	
	<!-- <script src="./libs/mdl/material.min.js"></script> -->
	<script src="./scripts/live-cam.js"></script>
	<script src="./scripts/snapshot-explorer.js"></script>
	<script src='./scripts/main.js'></script>

</html>
