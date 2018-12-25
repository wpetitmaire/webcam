<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php include_once('./includes/head.php');?>

    

    <!-- Variables -->
    <?php include_once('./includes/common.php');?>

    <body>

        <!-- barre de titre et menu latéral -->
        <?php include_once('header.php');?>

        <div class="flex-container-rows button-group">
            <button>Année</button>
            <button>Mois</button>
            <button>Jour</button>
        </div>


        <div class="flex-container-rows preview-list">

<!-- 368 x 272 -->

            <article class="flex-container-columns">
                <!-- <h2>Mardi 2 décembre - 12h00</h2> -->
                <div style="width: 368px; height: 272px">
                    <img src="./pictures/Tests/1.jpg" class="preview-image" >
                </div> 
            </article>

            <article class="flex-container-columns">
                <!-- <img src="./pictures/Tests/2.jpg" >  -->
            </article>

            <article class="flex-container-columns">
                <!-- <img src="./pictures/Tests/3.jpg" >  -->
            </article>

        </div>
        
        
        
    </body>

    <?php include_once('./includes/javascript.php');?>
    <script src='./scripts/snapshot-explorer.js'></script>

</html>