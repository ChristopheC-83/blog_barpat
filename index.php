<?php

session_start();

// variable "URL" valide sur tout le site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

define("imgFolder", "./public/assets/images/");


require_once("./controllers/visiteur/visiteur.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./controllers/security.controller.php");


try {
    if (empty($_GET['page'])) {
        $url[0] = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($url[0]) {
        case "accueil":
            pageAccueil();
            break;
        case "parcours":
            pageParcours();
            break;
        case "tricks":
            pageTricks();
            break;
        case "pense-betes":
            pagePenseBete();
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    pageErreur($e->getMessage());
}
