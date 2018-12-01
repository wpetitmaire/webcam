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
                return array("erreur" => "pathDir n\'est pas un répertoire.");
            }

        } catch (\Throwable $th) {
            return array("erreur" => $th);
        }

        $ouputArrray = array();

        // Parcourt des sous-éléments
        foreach($files as $element => $name) {

            if (in_array($name, array(".", "..", '.DS_Store', '.git', '.gitignore'))) 
                continue;

            if(!is_dir($pathDir . DIRECTORY_SEPARATOR . $name)) {
                array_push($ouputArrray, $name);
            }
            else {
                $ouputArrray["$name"] = dirListeningElements($pathDir . DIRECTORY_SEPARATOR . $name);
            }
        }

        return $ouputArrray;
    }


    $racine = '../';
    $snapshots_path = '../pictures/intervalSnapshots';
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

    $listeEntrees = dirListeningElements($pointDepart);
    print_r(json_encode($listeEntrees));
?>