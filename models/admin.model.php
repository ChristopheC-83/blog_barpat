<?php

require_once("./models/pdo.model.php");

function createArticleBdd($theme, $templateArticle, $url, $titre, $pitch)
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

function getIdFromArticles()
{
    $req = "SELECT id_article FROM articles ORDER BY id_article asc";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}

function validationTextBdd($id_article, $num_article, $titre, $texte)
{
    $req = 'INSERT INTO textes 
    (id_article, num_article, titre, texte) 
    values (:id_article, :num_article, :titre, :texte)
    ';
    $stmt = getBdd()->prepare($req);
    $stmt->bindValue(":id_article", $id_article, PDO::PARAM_STR);
    $stmt->bindValue(":num_article", $num_article, PDO::PARAM_STR);
    $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
    $stmt->bindValue(":texte", $texte, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
    return $texte;
}
function validationModificationTexteBdd($id_texte, $titre, $texte)
{
    $req = 'UPDATE textes set
    titre=:titre,
    texte=:texte
    WHERE id_texte=:id_texte
    ';
    $stmt = getBdd()->prepare($req);
    $stmt->bindValue(":id_texte", $id_texte, PDO::PARAM_STR);
    $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
    $stmt->bindValue(":texte", $texte, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
    return true;
}
function validationModificationCarteBdd($id_article, $theme, $templateArticle, $url, $titre, $pitch)
{
    $req = 'UPDATE articles set
    theme=:theme,
    templateArticle=:templateArticle,
    url=:url,
    titre=:titre,
    pitch=:pitch
    WHERE id_article = :id_article
    ';
    $stmt = getBdd()->prepare($req);
    $stmt->bindValue(":id_article", $id_article, PDO::PARAM_INT);
    $stmt->bindValue(":theme", $theme, PDO::PARAM_STR);
    $stmt->bindValue(":templateArticle", $templateArticle, PDO::PARAM_STR);
    $stmt->bindValue(":url", $url, PDO::PARAM_STR);
    $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
    $stmt->bindValue(":pitch", $pitch, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
    return true;
}



function deleteArticleBD($id_article)
{
    $req = 'DELETE FROM articles WHERE id_article= :id_article ';
    $stmt = getBdd()->prepare($req);
    $stmt->bindValue(":id_article", $id_article, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
    return true;
}
