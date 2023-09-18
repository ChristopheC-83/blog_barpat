<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/accueil.model.php");


function pageAccueil()
{
    $infosThemes = getInfosThemes();

    $data_page = [
        "meta_description" => "Repaire d'un developpeur, ses tips, soes conseils.",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/accueil.view.php",
        "template" => "views/commons/template.php",
        "js"=>['anim_intro.js'],
        "infosThemes" => $infosThemes,
    ];
    genererPage($data_page);
}
function pageParcours()
{

    $data_page = [
        "meta_description" => "Quel parcours pour devenir développeur web ?",
        "page_title" => "Parcours dev web",
        "view" => "views/pages/parcours.view.php",
        "template" => "views/commons/template.php",
    ];
    genererPage($data_page);
}
function pageTricks()
{

    $data_page = [
        "meta_description" => "Quelques tricks pour se faciliter la vie de dev ?",
        "page_title" => "Trucs de dev",
        "view" => "views/pages/tricks.view.php",
        "template" => "views/commons/template.php",
    ];
    genererPage($data_page);
}
function pagePenseBete()
{
    $infosThemes = getInfosThemes();

    $data_page = [
        "meta_description" => "Cheat sheets ? aide-mémoires ? je condense tout ça ici !",
        "page_title" => "fiches mémo",
        "view" => "views/pages/pense-betes.view.php",
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
