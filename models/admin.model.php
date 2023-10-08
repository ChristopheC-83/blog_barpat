<?php

require_once("./models/pdo.model.php");

function createArticle($theme, $templateArticle, $url, $titre, $pitch)
{
    $req = 'INSERT INTO articles 
        (theme, templateArticle, url, titre, pitch) 
        values (:theme, :templateArticle, :url, :titre, :pitch)
        ';
    $stmt = getBdd()->prepare($req);
    $stmt->bindValue(":theme", $theme, PDO::PARAM_STR);
    $stmt->bindValue(":templateArticle", $templateArticle, PDO::PARAM_STR);
    $stmt->bindValue(":url", $url, PDO::PARAM_STR);
    $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
    $stmt->bindValue(":pitch", $pitch, PDO::PARAM_STR);
    $stmt->execute();
    $lastId = getBdd()->lastInsertId();
    $stmt->closeCursor();
    return $lastId;
}

function getIdFromArticles(){
    $req = "SELECT id_article FROM articles ORDER BY id_article asc";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;


}