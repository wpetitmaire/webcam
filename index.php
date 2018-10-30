<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Webcam lac</title>
	<link rel="stylesheet" href="./styles/reset.css">
	<link rel="stylesheet" href="./styles/positionnement.css">
</head>

<?php

	$anneeCours = date('Y');
	$moisCours = date('m');
	$jourCours = date('d');

	$picturesPath = '/webcam/pictures/interval_snapshots/';
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
				<h2>En direct</h2>
			</div>
		</div>

		<!-- Conteneur Image webcam -->
		<div class='fullpicture-container'>
			<div class='snapshot'>
				<img name="Webcam Lac" src="http://webcamlac.zapto.org:8082/"  alt="Vue sur le lac" title="Direct" />
			</div>
		</div>

	</div>

</body>
</html>
