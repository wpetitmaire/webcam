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

	<section >
		<div class='snapshot'>
			<!-- <img src="<?=$picturesPath.$lastSnapshot?>" alt='Last snapshot' /> -->
			<img name="Webcam Lac" src="http://webcamlac.zapto.org:8082/"  alt="Vue sur le lac" title="Le lac" />
		</div>
	</section>
	<!-- <div class='legend'>
		<p>Date : <span id='snapDate'></span></p>
	</div> -->

	
	<!-- <div>
		<p>LOG : </p>
		<p></p>
	</div> -->

</body>

<!-- Contenu -->
	<!-- <div class="corps flex-container-rows-center">

		<section class="streaming flex-container-columns">
			<img name="Webcam Lac" src="http://79.90.247.95:8081/"  alt="Vue sur le lac" title="Le lac" />
		</section>
	</div> -->


</html>
