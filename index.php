<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Webcam lac</title>
		<!-- <link rel="stylesheet" href="./styles/reset.css"> -->
		<link rel="stylesheet" href="./styles/positionnement.css">
		<link rel="stylesheet" href="./libs/mdl/material.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>

	<?php

		$anneeCours = date('Y');
		$moisCours = date('m');
		$jourCours = date('d');

		$picturesPath = 'http://78.196.89.58/webcam/pictures/intervalSnapshots/';
		$lastSnapshot = 'lastsnap.jpg';

	?>


	<body>

		<!-- Menu / titre -->
		<div class='title flex-container-rows-center'>
			<H1>Webcam du Lac</H1>
		</div>

		<div>

			<!-- Barre titre -->
			<div class='flex-container-rows title-bar corps'>

				<!-- Bouton switch -->
				<div class='switchButton'>
				</div>

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

	</body>

	<script src='./libs/jquery/jquery-3.3.1.min.js'></script>
	<script src='./scripts/main.js'></script>
	<script src="./libs/mdl/material.min.js"></script>

</html>
