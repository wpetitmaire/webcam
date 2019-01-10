<?php

    /**
     * Retourne l'arborescense des sous-répertoires en partant d'un point d'entrée envoyé en paramètre.
     *
     * @param string $pathDir
     * @return array arboresence sous forme d'un tableau.
     */
    function dirListeningElements($pathDir) {

        try {

            // Récupérer la liste des sous-éléments directes au point d'entrée
            $files = scandir($pathDir);
            if($files === false) {
                return array("erreur" => "pathDir n'est pas un répertoire.");
            }

        } catch (\Throwable $th) {
            return array("erreur" => $th);
        }

        $outputArray = array();

        // Parcourt des sous-éléments
        foreach($files as $element => $name) {

            if (in_array($name, array(".", "..", '.DS_Store', '.git', '.gitignore'))) 
                continue;

            $subDir['name'] = $name;

            if(!is_dir($pathDir . DIRECTORY_SEPARATOR . $name)) {
                // array_push($ouputArrray, $name);
            }
            else {
                $subDir['content'] = dirListeningElements($pathDir . DIRECTORY_SEPARATOR . $name);
            }

            array_push($outputArray, $subDir);
        }

        return $outputArray;
    }


    $racine = '../';
    $snapshots_path = '../pictures/intervalSnapshots';
    /* $snapshots_path = 'http://78.196.89.58/webcam/pictures/intervalSnapshots'; */
    $pointDepart = $_GET['_folder'];
    $listeEntrees = array();

    // si pas de départ spécifié, on part de la racine du projet.
    if($pointDepart === '')
        $pointDepart = $racine;

    switch ($pointDepart) {

        case 'snapshots' :
            $pointDepart = $snapshots_path;
            break;
        
        default:
            $pointDepart = $racine;
            break;
    }

    $sortie["result"] = dirListeningElements($pointDepart);

    print_r(json_encode($sortie));
?>