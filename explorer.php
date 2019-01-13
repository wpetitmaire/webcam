<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php include_once('./includes/head.php');?>

    

    <!-- Variables -->
    <?php include_once('./includes/common.php');?>

    <body>

        <!-- barre de titre et menu latéral -->
        <?php include_once('header.php');?>

        <ul id='snapshotBreadcrumb' class="breadcrumb">
        </ul> 

        <div id="snapContainer" class="flex-container-rows preview-list">
        </div>
        
    </body>

    <?php include_once('./includes/javascript.php');?>
    <script src='./scripts/snapshot-explorer.js'></script>

    <script>
        const snapExplorer = new files_explorer('<?=$picturesPath?>');
    </script>

</html>