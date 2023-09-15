<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/accueil.model.php");


function pageAccueil()
{
    $infosThemes = getInfosThemes();

    $data_page = [
        "meta_description" => "les coulisses d'un dev d'autodidacte à développeur",
        "page_title" => "l'apprentissage du développement web",
        "view" => "views/pages/accueil.view.php",
        "template" => "views/commons/template.php",
        "infosThemes" => $infosThemes,
    ];
    genererPage($data_page);
}

function pageErreur($msg)
{
    $data_page = [
        "meta_description" => "Erreur !",
        "page_title" => "Erreur !",
        "view" => "views/pages/visiteur/erreur.view.php",
        "template" => "views/commons/template.php",
        "msg" => $msg,

    ];
    genererPage($data_page);
}
