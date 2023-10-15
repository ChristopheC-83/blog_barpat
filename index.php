<?php

session_start();

// variable "URL" valide sur tout  le site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

define("imgFolder", URL . "public/assets/images/");
define("slidersFolder", URL . "public/assets/sliders/");
define("sliderPath", "C:/xampp/htdocs/kiki/barpat_blog/public/assets/sliders/");
// A changer lors du déploiment


require_once("./controllers/visiteur/visiteur.controller.php");
require_once("./controllers/admin/admin.controller.php");
require_once("./controllers/functionController.controller.php");
require_once("./controllers/security.controller.php");
require_once("./controllers/images.controller.php");
require_once("./controllers/admin/login.controller.php");


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

        case "loginAdmin":
            loginAdmin();
            break;
        case "validation_login":
            $pseudo = secureHTML($_POST['pseudo']);
            $password = secureHTML($_POST['password']);
            if (!empty($pseudo) && !empty($password)) {
                validationLogin($pseudo, $password);
            } else {
                ajouterMessageAlerte("Il faut remplir les 2 champs", "orange");
                header('location:' . URL . "login");
            }
            break;
        case "deconnexion":
            unset($_SESSION['profil']['login']);
            if (!isset($_SESSION['profil']['login'])) {
                header('location:' . URL . "loginAdmin");
                ajouterMessageAlerte("Déconnexion OK !", "vert");
            } else {
                header('location:' . URL . "loginAdmin");
                ajouterMessageAlerte("Toujours Connecté !!! Pas OK !", "orange");
            }
            break;
        case "kikiAdmin":
            if (!estConnecte()) {
                ajouterMessageAlerte("Il faut se connecter !", "orange");
                header('location:' . URL . "loginAdmin");
            } else {
                if (!isset($url[1])) {
                    pageAdmin();
                } else {

                    switch ($url[1]) {
                        case "create_article":
                            pageCreateArticle();
                            break;

                        case "creationArticle":
                            validationCreationArticle($_POST);
                            break;

                        case "write_text":
                            pageTextes($url[2]);
                            break;
                        case "validation_text":
                            validationText($_POST);
                            break;

                        case "insert_photos_slider":
                            pagesPhotos($url[2]);
                            break;


                        case "ajout_1_photo":
                            if ($_FILES['photo1']['size'] > 0) {

                                validation_image($_FILES['photo1'], $_POST);
                                // afficherTableau($_FILES['photo1']);
                                // afficherTableau($_POST);
                            } else {
                                ajouterMessageAlerte("Image non importée", "rouge");
                                header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
                            }
                            break;

                        case "ajout_2_photos":
                            if ($_FILES['photo1']['size'] > 0) {

                                validation_image($_FILES['photo1'], $_POST);
                                validation_image2($_FILES['photo2'], $_POST);
                                // afficherTableau($_FILES);
                                // afficherTableau($_FILES['photo1']);
                                // afficherTableau($_FILES['photo2']);
                                // afficherTableau($_POST);
                            } else {
                                ajouterMessageAlerte("Image non importée", "rouge");
                                header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
                            }
                            break;

                        case "ajout_1_slider":
                            if ($_FILES['photo']['size'][0] > 0) {

                                if (validation_slider($_FILES['photo'], $_POST)) {
                                    // echo "files";
                                    // afficherTableau($_FILES['photo']);
                                    // echo "post";
                                    // afficherTableau($_POST);
                                    // echo ($_POST['repertoire'].$_POST["slider"]);
                                    // echo ("longueur : ".count(($_FILES['photo']['name'])));
                                } else {
                                    header('location:' . URL . "article/" . $_POST['theme'] . "/" . $_POST['id_article'] . "/" . $_POST['url']);
                                }
                            } else {
                                ajouterMessageAlerte("Image non importée", "rouge");
                                header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
                            }
                            break;

                        case "ajout_1_video":
                            $id_article = $_POST['id_article'];
                            $theme = $_POST['theme'];
                            $url = $_POST['url'];
                            $lien_video = $_POST['video'];
                            // echo $id_article;
                            // echo "<br>";
                            // echo $theme;
                            // echo "<br>";
                            // echo $url;
                            // echo "<br>";
                            // echo $lien_video;
                            // echo "<br>";
                            ajouterVideo($lien_video, $id_article, $theme, $url);

                            // if (ajouterVideo($lien_video, $id_article)) {
                            // header('location:' . URL . "article/" . $_POST['theme'] . "/" . $_POST['id_article'] . "/" . $_POST['url']);
                            // } else {

                            //     ajouterMessageAlerte("Video non importée dès le départ", "rouge");
                            //     header('location:' . URL . "kikiAdmin/ajout_1_video/" . $_POST['id_article']);
                            // }


                            break;

                        case "delete_article":
                            // afficherTableau($_POST);
                            $id_article = $_POST['id_article'];
                            $fileToDelete1 = $_POST['fileToDelete1'];
                            $fileToDelete2 = $_POST['fileToDelete2'];
                            $folderToDelete = $_POST['folderToDelete'];
                            // if (!isset($_POST['fileToDelete2'])) {
                            //     $fileToDelete2 = $_POST['fileToDelete2'];
                            // } else {
                            //     $fileToDelete2 = null;
                            // }
                            // if (!isset($_POST['folderToDelete'])) {
                            //     $folderToDelete = $_POST['folderToDelete'];
                            // } else {
                            //     $folderToDelete = null;
                            // }

                            // delete_article($id_article, $fileToDelete1, $fileToDelete2,$folderToDelete);

                            if (delete_article($id_article, $fileToDelete1, $fileToDelete2,$folder)) {
                                ajouterMessageAlerte("Suppression article " . $id_article . " effectué.", "vert");
                                header('location:' . URL);
                            } else {
                                ajouterMessageAlerte("Echec article " . $id_article, "rouge");
                                header('location:' . URL);
                            }

                            break;


// Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit, repudiandae laudantium! Hic exercitationem, aperiam autem neque ratione ab est asperiores, repellendus labore, vitae repudiandae qui sit quo atque repellat eius?






                        case "update":
                            pageUpdate($id);
                            break;

                        case "pageTest":
                            afficherTableau($_FILES);
                            // if ($_FILES['photo1']['size'] > 0) {
                            //     afficherTableau($_POST);
                            // } else {
                            //     ajouterMessageAlerte("Image non modifiée", "rouge");
                            //     header('location:' . URL . "profil");
                            // }
                            break;

                        default:
                            throw new Exception("La page demandée n'existe pas.");
                    }
                }
            }
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    pageErreur($e->getMessage());
}
