<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/articles.model.php");


function pageAccueil()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Repaire d'un developpeur, ses tips, ses conseils.",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/accueil.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['anim_intro.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

function pageArticlesSelectionnes($theme)
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();
    $articlesParTheme = getArticlesParTheme($theme);

    $data_page = [
        "meta_description" => "Repaire d'un developpeur, ses tips, ses conseils.",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/accueil.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['anim_intro.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
        "articlesParTheme" => $articlesParTheme,

    ];
    genererPage($data_page);
}

function pageArticle($id_article)
{

    $infosArticles = getInfos($id_article);
    $themes = getAllThemes();
    $meta = $infosArticles['titre'];

    $data_page = [
        "meta_description" => "Partage d'expérience : $meta ",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/article.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['anim_intro.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}



function pageErreur($msg)
{
    $data_page = [
        "meta_description" => "Erreur !",
        "page_title" => "Erreur !",
        "view" => "views/pages/erreur.view.php",
        "template" => "views/commons/template.php",
        "msg" => $msg,

    ];
    genererPage($data_page);
}
