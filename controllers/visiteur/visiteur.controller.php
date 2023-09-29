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

function pageArticle($id_article)
{

    $infosArticle = getInfosArticle($id_article);
    $themes = getAllThemes();
    $meta = $infosArticle['titre'];
    $templateArticle = $infosArticle['templateArticle'];

    $data_page = [
        "meta_description" => "Partage d'expérience : $meta ",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/$templateArticle.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['anim_intro.js'],
        "infosArticle" => $infosArticle,
        "themes" => $themes,
    ];
    genererPage($data_page);


}

function pageTheme($theme){

    $infosArticles = getAllInfos();
    $themes = getAllThemes();
    $themePage = oneTheme($theme);
    $articlesTheme = articlesTheme($theme);

    $data_page = [
        "meta_description" => "Partage d'expérience : ... ",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/page_theme.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['anim_intro.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
        "themePage" => $themePage,
        "articlesTheme" => $articlesTheme,
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

function pageTest($data){

    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page Test!",
        "page_title" => "Page Test!",
        "view" => "views/pages/pageTest.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['anim_intro.js'],
        "data" => $data,
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}
