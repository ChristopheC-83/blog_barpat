<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/articles.model.php");
require_once("./models/admin.model.php");

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


// #################################
// Créations d'articles
function pageCreateArticle()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_create_article.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

function validationCreationArticle($POST)
{
    $theme = secureHTML($POST['theme']);
    $templateArticle = secureHTML($POST['templateArticle']);
    $url = secureHTML($POST['url']);
    $titre = secureHTML($POST['titre']);
    $pitch = secureHTML($POST['pitch']);

    if (
        !isset($theme) || $theme === "" ||
        !isset($templateArticle) || $templateArticle === "" ||
        !isset($url) || $url === "" ||
        !isset($titre) || $titre === "" ||
        !isset($pitch) || $pitch === ""
    ) {
        ajouterMessageAlerte("Il faut renseigner tous les champs", "rouge");
        header('location:' . URL . "kikiAdmin/create_article");
    } else {
        createArticle($theme, $templateArticle, $url, $titre, $pitch);
        $allId = getIdFromArticles();
        $lastId = end($allId)['id_article'];
        ajouterMessageAlerte("Creation de l'article " . $lastId . " effectuée !", "vert");
        header('location:' . URL . "kikiAdmin/create_article/".$lastId);
    }
}

















// #################################
// Ajout textes
function pageTextes($id)
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_add_text.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}




















// #################################
// Ajout photos

function pagesPhotos($id)
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_add_photos.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

function pageUpdate($id)
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
function
pageAffichagePost($infos_Post)
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/affichagePost.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
        "infos_Post" => $infos_Post,
    ];
    genererPage($data_page);
}
