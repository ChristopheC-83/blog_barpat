<?php 


require_once("./models/login.model.php");



function loginAdmin()
{
    $infosArticles = getAllInfos();
    $themes = getAllThemes();

    $data_page = [
        "meta_description" => "Page de connexion",
        "page_title" => "Page de connexion",
        "view" => "views/pages/admin/pageLogin.view.php",
        "template" => "views/commons/template.php",
        // "js" => ['animation_grille.js'],
        "infosArticles" => $infosArticles,
        "themes" => $themes,
    ];
    genererPage($data_page);
}

function validationLogin($pseudo,$password ){
    if(isCombinaisonValide($pseudo,$password)){
        ajouterMessageAlerte("Connexion OK !", "vert");
        header('location:' . URL . "kikiAdmin");
        $_SESSION['profil']['login']= $pseudo;

    }else{
        ajouterMessageAlerte("Combinaison pseudo / mpd invalide !", "rouge");
        header('location:' . URL . "login");
    }
}




