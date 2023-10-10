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


// function getImageUser($login)
// {
//     $req = "SELECT image FROM user_management WHERE login = :login";
//     $stmt = getBDD()->prepare($req);
//     $stmt->bindValue(":login", $login, PDO::PARAM_STR);
//     $stmt->execute();
//     $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return $resultat['image'];
// }

// function modifImageBD($login, $image, $img_site)
// {
//     $req = "UPDATE user_management set image = :image, img_site = :img_site
//                 WHERE login = :login
//                 ";
//     $stmt = getBDD()->prepare($req);
//     $stmt->bindValue(":login", $login, PDO::PARAM_STR);
//     $stmt->bindValue(":image", $image, PDO::PARAM_STR);
//     $stmt->bindValue(":img_site", $img_site, PDO::PARAM_INT);
//     $stmt->execute();
//     $validationOk = ($stmt->rowCount() > 0);
//     $stmt->closeCursor();
//     return $validationOk;
// }
