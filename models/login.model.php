<?php

function isCombinaisonValide($pseudo, $password)
{
    $passwordBD = getPassWordUser($pseudo);
    return password_verify($password, $passwordBD);
}

function getPassWordUser($pseudo)
{
    $req = "SELECT password FROM utilisateurs where pseudo = :pseudo";
    $stmt = getBDD()->prepare($req);
    $stmt->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $admin['password'];
}
