<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/articles.model.php");

function pageAdmin()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/admin.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}
function pageCreate()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/create.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}
function pageUpdate()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/update.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

