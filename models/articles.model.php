<?php

require_once("./models/pdo.model.php");

function getAllInfos()
{
    $req = "SELECT * FROM articles ORDER BY id_article desc";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function getAllTextes()
{
    $req = "SELECT * FROM textes ORDER BY id_article desc";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}

function articlesTheme($theme)
{
    $req = "SELECT * FROM articles
     WHERE theme = :theme ORDER BY id_article desc
     ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function getAllThemes()
{
    $req = "SELECT * FROM themes ORDER BY id_theme asc";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function oneTheme($theme)
{
    $req = "SELECT * FROM themes WHERE theme = :theme";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
    $stmt->execute();
    $infos = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}

function getInfosArticle($id_article)
{
    $req = "SELECT * FROM articles 
        WHERE id_article = :id_article
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $stmt->execute();
    $infos = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function getImagesById($id_article)
{
    $req = "SELECT * FROM images 
        WHERE id_article = :id_article
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function getTextesById($id_article)
{
    $req = "SELECT * FROM textes 
        WHERE id_article = :id_article
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function articlesWithText()
{
    $req = "SELECT articles.id_article, articles.titre
    FROM articles
    JOIN textes ON articles.id_article = textes.id_article
    WHERE textes.num_article = 1 
    ORDER BY articles.id_article desc;
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function articleWithoutText()
{
    $req = "SELECT articles.id_article, articles.titre
    FROM articles
    LEFT JOIN textes ON articles.id_article = textes.id_article
    WHERE textes.id_article IS NULL;
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function articleWithoutMedia()
{
    $req = "SELECT articles.*
    FROM articles
    LEFT JOIN images ON articles.id_article = images.id_article
    LEFT JOIN slider ON articles.id_article = slider.id_article
    LEFT JOIN videos ON articles.id_article = videos.id_article
    WHERE images.id_img IS NULL AND slider.id_slider IS NULL AND videos.id_video IS NULL;
    
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}

function getSlider($id_article)
{
    $req = "SELECT * FROM slider 
        WHERE id_article = :id_article
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $stmt->execute();
    $infos = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}

function getVideo($id_article)
{
    $req = "SELECT * FROM videos 
        WHERE id_article = :id_article
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
    $stmt->execute();
    $infos = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
