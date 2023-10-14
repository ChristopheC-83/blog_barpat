<?php

function secureHTML($chaine)
{
    return htmlentities($chaine);
}

function estConnecte(){
   return (!empty($_SESSION['profil']['login']));
}
