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
//  suppreesion articles


function delete_article($id_article, $elt1, $elt2, $folderToDelete)
{

    // echo $id_article;
    // echo "<br>";
    // echo ($elt1==="" ?"":"elt1 = ".$elt1);
    // echo "<br>";
    // echo ($elt2==="" ?"":"elt2 = ".$elt2);
    // echo "<br>";
    // echo ($folderToDelete==="" ?"":"folderToDelete = ".$folderToDelete);
    // echo "<br>";

    switch (true) {
        case ($elt1 === "" && $folderToDelete === null):
            deleteArticleBD($id_article);
            ajouterMessageAlerte("suppression article !!!", "vert");
            return true;
        case ($folderToDelete !== "" && $elt1 === "" ):
            if (deleteFilesSlider($folderToDelete)) {
                deleteArticleBD($id_article);
                ajouterMessageAlerte("Dossier Slider et article effacés !!!", "vert");
                return true;
            } else {
                ajouterMessageAlerte("Dossier Slider toujours là !!!", "rouge");
                return false;
            }
        case ($elt1 !== "" && $elt2 === "" && $folderToDelete === null):
            if (unlink($elt1)) {
                deleteArticleBD($id_article);
                ajouterMessageAlerte("suppression image 1 ok!!!", "vert");
                return true;
            } else {
                ajouterMessageAlerte("Image 1 T2 toujours là !!!", "rouge");
                return false;
            }
        case ($elt1 !== "" && $elt2 !== "" && $folderToDelete === null):
            if (unlink($elt2)) {
                if (unlink($elt1)) {
                    deleteArticleBD($id_article);
                    ajouterMessageAlerte("suppression image 1 & 2 ok !!!", "vert");
                    return true;
                } else {
                    ajouterMessageAlerte("Images 1 T1 toujours là !!!", "rouge");
                }
            } else {
                ajouterMessageAlerte("Images  2  T1 toujours là !!!", "rouge");
                return false;
            }

        default:
            return false;
    }
}


function deleteFilesSlider($folder)
{

    $fichiers = glob($folder . '/*');
    foreach ($fichiers as $fichier) {
        if (is_file($fichier)) {
            unlink($fichier);
        }
    }
    rmdir($folder);
}





// #################################
// Mise à jour

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
