<?php

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
        "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

function pageArticle($id_article)
{

    $infosArticle = getInfosArticle($id_article);
    $images = getImagesById($id_article);
    $textes = getTextesById($id_article);
    $themes = getAllThemes();
    $meta = $infosArticle['titre'];
    $templateArticle = $infosArticle['templateArticle'];
    $slider = getSlider($id_article);
    $video = getVideo($id_article);
    $numFiles = 0;
    $dossier_slider = "";
    if ($slider && isset($slider['dossier'])) {
        $dossier_slider = sliderPath . $slider['dossier'];
        $numFiles = countSlider($dossier_slider);
    }

    $data_page = [
        "meta_description" => "Partage d'expérience : $meta ",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/templateArticle.view.php",
        "template" => "views/commons/template.php",
        // "js"=>['slider.js'],
        "themes" => $themes,
        "infosArticle" => $infosArticle,
        "images" => $images,
        "textes" => $textes,
        "slider" => $slider,
        "video" => $video,
        "numFiles" => $numFiles,
        "dossier_slider" => $dossier_slider,
        "templateArticle" => $templateArticle,
    ];
    genererPage($data_page);
}

function countSlider($dossier_slider)
{
    $files = glob($dossier_slider . "/*");
    $numFiles = count($files);
    return $numFiles;
}

function pageTheme($theme)
{

    $infosArticles = getAllInfos();
    $themes = getAllThemes();
    $themePage = oneTheme($theme);
    $articlesTheme = articlesTheme($theme);

    $data_page = [
        "meta_description" => "Partage d'expérience : ... ",
        "page_title" => "repaire d'un dev !",
        "view" => "views/pages/page_theme.view.php",
        "template" => "views/commons/template.php",
        "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
        "themePage" => $themePage,
        "articlesTheme" => $articlesTheme,
    ];
    genererPage($data_page);
}



function pageErreur($msg)
{

    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Erreur !",
        "page_title" => "Erreur !",
        "view" => "views/pages/erreur.view.php",
        "template" => "views/commons/template.php",
        "msg" => $msg,
        "infosArticles" => $infosArticles,
        "themes" => $themes,

    ];
    genererPage($data_page);
}

function pageTest($data)
{

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
