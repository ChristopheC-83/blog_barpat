<?php

session_start();

// variable "URL" valide sur tout  le site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

define("imgFolder", URL . "public/assets/images/");
define("sliderPath", "C:/xampp/htdocs/kiki/barpat_blog/public/assets/images/");
// A changer lors du déploiment


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
        case "theme":
            $themeChoisi = secureHTML($url[1]);
            $themes = getAllThemes();
            // echo $themeChoisi;
            // afficherTableau($themes);
            // verification($themeChoisi);
            pageTheme($themeChoisi);

            break;
        case "article":
            $id_article = secureHTML($url[2]);
            $url = secureHTML($url[3]);

            if (!isset(getInfosArticle($id_article)['id_article'])) {
                pageErreur("Cet article n'existe pas encore ? <br> Tu es un visiteur du futur ?");

            } else {

                if ($url !== getInfosArticle($id_article)['url']) {
                    pageErreur("Il y a un soucis dans ton url <br> On recommence de l'accueil ?");
                } else {
                    pageArticle($id_article);
                }
            }
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    pageErreur($e->getMessage());
}
