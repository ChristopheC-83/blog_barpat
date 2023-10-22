<?php

require_once("./controllers/functionController.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./models/articles.model.php");
require_once("./models/admin.model.php");

function pageAdmin()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();
    $articlesWithoutText = articleWithoutText();
    $articleWithoutMedia = articleWithoutMedia();
    $articlesWithText = articlesWithText();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/admin.view.php",
        "template" => "views/commons/template.php",
        "js" => ['administration.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
        "articlesWithoutText" => $articlesWithoutText,
        "articleWithoutMedia" => $articleWithoutMedia,
        "articlesWithText" => $articlesWithText,
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
        createArticleBdd($theme, $templateArticle, $url, $titre, $pitch);
        $allId = getIdFromArticles();
        $lastId = end($allId)['id_article'];
        ajouterMessageAlerte("Creation de l'article " . $lastId . " effectuée !", "vert");
        header('location:' . URL . "kikiAdmin/write_text/" . $lastId);
    }
}

// #################################
// Ajout textes
function pageTextes($id)
{
    $infosArticle = getInfosArticle($id);
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_add_text.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticle" => $infosArticle,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

function validationText($POST)
{
    $id_article = secureHTML($POST['id_article']);
    $num_article_1 = secureHTML($POST['num_article_1']);
    $num_article_2 = secureHTML($POST['num_article_2']);
    $titre1 = secureHTML($POST['titre1']);
    $texte1 = secureHTML($POST['texte1']);
    $titre2 = secureHTML($POST['titre2']);
    $texte2 = secureHTML($POST['texte2']);

    if (
        !isset($id_article) || $id_article === "" ||
        !isset($num_article_1) || $num_article_1 === "" ||
        !isset($num_article_2) || $num_article_2 === "" ||
        !isset($titre1) || $titre1 == ""
    ) {
        if (isset($texte1)) {
            $_SESSION['texte1'] = $texte1;
        }
        if (isset($titre2)) {
            $_SESSION['titre2'] = $titre2;
        }
        if (isset($texte2)) {
            $_SESSION['texte2'] = $texte2;
        }
        ajouterMessageAlerte("Il faut renseigner au moins le champs Titre 1", "rouge");
        header('location:' . URL . "kikiAdmin/write_text/" . $id_article);
    } else {
        validationTextBdd($id_article, $num_article_1, $titre1, $texte1);
        validationTextBdd($id_article, $num_article_2, $titre2, $texte2);
        $allId = getIdFromArticles();
        $lastId = end($allId)['id_article'];
        ajouterMessageAlerte("Les textes de l'article " . $lastId . " ont été sauvegardés !", "vert");
        if (isset($texte1)) {
            unset($_SESSION['texte1']);
        }
        if (isset($titre1)) {
            unset($_SESSION['titre1']);
        }
        if (isset($titre2)) {
            unset($_SESSION['titre2']);
        }
        if (isset($texte2)) {
            unset($_SESSION['texte2']);
        }

        header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $lastId);
    }
}
function validation_modification_text($POST)
{
    $id_article = secureHTML($POST['id_article']);
    $id_texte_1 = secureHTML($POST['id_texte_1']);
    $titre1 = secureHTML($POST['titre1']);
    $texte1 = secureHTML($POST['texte1']);
    $id_texte_2 = secureHTML($POST['id_texte_2']);
    $titre2 = secureHTML($POST['titre2']);
    $texte2 = secureHTML($POST['texte2']);
    $article = getInfosArticle($id_article);
    // $num_article_1 = secureHTML($POST['num_article_1']);
    // $num_article_2 = secureHTML($POST['num_article_2']);
    validationModificationTexteBdd($id_texte_1, $titre1, $texte1);
    validationModificationTexteBdd($id_texte_2, $titre2, $texte2);
    ajouterMessageAlerte("Les textes de l'article " . $article['id_article'] . " ont été modifiés !", "vert");
    header('location:' . URL . "article/" . $article['theme'] . "/" . $article['id_article'] . "/" . $article['url']);
}










// #################################
// Ajout photos

function pagesPhotos($id)
{
    $infosArticle = getInfosArticle($id);
    $themes = getAllThemes();
    $titles = getTextesById($id);

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_add_photos.view.php",
        "template" => "views/commons/template.php",
        "infosArticle" => $infosArticle,
        "themes" => $themes,
        "titles" => $titles,
    ];
    genererPage($data_page);
}


#############################
//  suppression articles

function delete_article_template1($id_article, $fileToDelete1, $fileToDelete2)
{
    if (unlink($fileToDelete2)) {
        if (unlink($fileToDelete1)) {
            deleteArticleBD($id_article);
            ajouterMessageAlerte("Article template 1 effacé !!!", "vert");
            return true;
        } else {
            ajouterMessageAlerte("Images 1 T1 toujours là !!!", "rouge");
        }
    } else {
        ajouterMessageAlerte("Images  2  T1 toujours là !!!", "rouge");
        return false;
    }
}
function delete_article_template2($id_article, $fileToDelete1)
{
    if (unlink($fileToDelete1)) {
        deleteArticleBD($id_article);
        ajouterMessageAlerte("Article template 2 effacé !!!", "vert");
        return true;
    } else {
        ajouterMessageAlerte("Images  2  T1 toujours là !!!", "rouge");
        return false;
    }
}
function delete_article_template3($id_article, $folderToDelete)
{
    if (deleteArticleBD($id_article)) {
        deleteFilesSlider($folderToDelete);
        ajouterMessageAlerte("Article template 3 effacé !!!", "vert");
        return true;
    } else {
        ajouterMessageAlerte("Dossier Slider toujours là !!!", "rouge");
        return false;
    }
}
function delete_article_template4($id_article,)
{
    if (deleteArticleBD($id_article)) {
        ajouterMessageAlerte("Article template 4 effacé !!!", "vert");
        return true;
    } else {
        ajouterMessageAlerte("Dossier Slider toujours là !!!", "rouge");
        return false;
    }
}

function deleteFilesSlider($folder)
{

    $fichiers = glob($folder . '/*');
    foreach ($fichiers as $fichier) {
        unlink($fichier);
    }
    rmdir($folder);
}









// #################################
// Mise à jour

function pageUpdateText($id_article)
{
    $infosArticles = getAllInfos();
    $infosArticle = getInfosArticle($id_article);
    $themes = getAllThemes();
    $text = getTextesById($id_article);

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_modif_text.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "infosArticle" => $infosArticle,
        "themes" => $themes,
        "text" => $text,
    ];
    genererPage($data_page);
}
function pageUpdateCard($id_article)
{
    $infosArticles = getAllInfos();
    $infosArticle = getInfosArticle($id_article);
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page d'aministration",
        "page_title" => "Page d'aministration !",
        "view" => "views/pages/admin/page_modif_card.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "infosArticle" => $infosArticle,
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
