<!doctype html>
<html lang="fr">
	
	<!-- Head -->
	<?php include_once('./includes/head.php');?>
	<!-- Variables -->
	<?php include_once('./includes/common.php');?>

	<body>

		<!-- barre de titre et menu latéral -->
		<?php include_once('header.php');?>


		<div class="main-container">

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

	<?php include_once('./includes/javascript.php');?>

</html>
