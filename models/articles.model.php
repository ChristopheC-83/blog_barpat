<?php 

require_once("./models/pdo.model.php");

function getInfosThemes()
{
    $req = "SELECT * FROM themes";
    $stmt = getBDD()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}