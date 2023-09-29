<?php

require_once("./models/pdo.model.php");

function getAllInfos()
{
    $req = "SELECT * FROM articles";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}

function articlesTheme($theme)
{
    $req = "SELECT * FROM articles
     WHERE theme = :theme
     ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function getInfos($id_article)
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


