<?php


require_once("./models/pdo.model.php");

function ajoutImageBdd($id_article, $num_img, $url_img, $alt_img, $lien)
{
    $req = "INSERT INTO images
            (id_article, num_img, url_img, alt_img, lien)
            values(:id_article, :num_img, :url_img, :alt_img, :lien)

                ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":id_article", $id_article, PDO::PARAM_INT);
    $stmt->bindValue(":num_img", $num_img, PDO::PARAM_INT);
    $stmt->bindValue(":url_img", $url_img, PDO::PARAM_STR);
    $stmt->bindValue(":alt_img", $alt_img, PDO::PARAM_STR);
    $stmt->bindValue(":lien", $lien, PDO::PARAM_STR);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}

function ajoutSliderFileBdd($path, $id_article)
{
    $req = "INSERT INTO slider
    (dossier, id_article)
    values(:dossier, :id_article)
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":dossier", $path, PDO::PARAM_STR);
    $stmt->bindValue(":id_article", $id_article, PDO::PARAM_STR);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}

function ajouterVideoBd($lien_video, $id_article)
{
    $req = "INSERT INTO videos
    (lien_video, id_article)
    values(:lien_video, :id_article)
        ";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":lien_video", $lien_video, PDO::PARAM_STR);
    $stmt->bindValue(":id_article", $id_article, PDO::PARAM_STR);
    $stmt->execute();
    $validationOk = ($stmt->rowCount() > 0);
    $stmt->closeCursor();
    return $validationOk;
}
