<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");


function pageAccueil()
{
    

    $data_page = [
        "meta_description" => "Description accueil",
        "page_title" => "titre accueil",
        "view" => "views/pages/visiteur/accueil.view.php",
        "template" => "views/commons/template.php",

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

function pageLogin()
{
    $data_page = [
        "meta_description" => "Page de connexion au site",
        "page_title" => "Connexion",
        "view" => "views/pages/visiteur/login.view.php",
        "template" => "views/commons/template.php",

    ];
    genererPage($data_page);
}

function creerCompte()
{

    $data_page = [
        "meta_description" => "Page de création compte",
        "page_title" => "Enregistrement",
        "view" => "views/pages/visiteur/creerCompte.view.php",
        "template" => "views/commons/template.php",

    ];
    genererPage($data_page);
}

function mdpOublie()
{

    $data_page = [
        "meta_description" => "Page de récupération d'un mot de passe",
        "page_title" => "un oubli ?",
        "view" => "views/pages/visiteur/mdpOublie.view.php",
        "template" => "views/commons/template.php",

    ];
    genererPage($data_page);
}
