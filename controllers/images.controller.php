<?php



require_once("./models/images.model.php");

function validation_image($file, $info)
{
    $repertoire = $info['repertoire'];

    try {
        ajoutImage($file, $repertoire);
        if (ajoutImageBdd(
            secureHTML($info['id_article']),
            secureHTML($info['num_img1']),
            secureHTML($file['name']),
            secureHTML($info['alt_img1']),
            secureHTML($info['lien1']),
        )) {
            ajouterMessageAlerte("Edition article OK !", "vert");
            header('location:' . URL . "article/" . $_POST['theme'] . "/" . $_POST['id_article'] . "/" . $_POST['url']);
        } else {
            ajouterMessageAlerte("Modfication de l'image non effectuée.", "rouge");
            header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
        }
    } catch (Exception $e) {
        ajouterMessageAlerte($e->getMessage(), "rouge");
        header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
    }
}
function validation_image2($file, $info)
{
    $repertoire = $info['repertoire'];

    try {
        ajoutImage($file, $repertoire);
        if (ajoutImageBdd(
            secureHTML($info['id_article']),
            secureHTML($info['num_img2']),
            secureHTML($file['name']),
            secureHTML($info['alt_img2']),
            secureHTML($info['lien2']),
        )) {
            ajouterMessageAlerte("Edition article OK !", "vert");
            header('location:' . URL . "article/" . $_POST['theme'] . "/" . $_POST['id_article'] . "/" . $_POST['url']);
        } else {
            ajouterMessageAlerte("Modfication de l'image non effectuée.", "rouge");
            header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
        }
    } catch (Exception $e) {
        ajouterMessageAlerte($e->getMessage(), "rouge");
        header('location:' . URL . "kikiAdmin/insert_photos_slider/" . $_POST['id_article']);
    }
}

function ajoutImage($file, $repertoire)
{

    if (!isset($file['name']) || empty($file['name'])) {
        throw new Exception("Vous devez sélectionner une image.");
    }

    if (!file_exists($repertoire)) mkdir($repertoire, 0777);

    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $target_file =  $repertoire . $file['name'];

    if (!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");
    if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
        throw new Exception("L'extension du fichier n'est pas reconnu");
    if (file_exists($file['name']))
        throw new Exception("Le fichier existe déjà.");
    if ($file['size'] > 750000)
        throw new Exception("Le fichier est trop volumineux (500ko maximum).");
    if (!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
    else return ($file['name']);
}

function validation_slider($file, $post)
{
    $lengthArray = count($file['name']);
    $repertoire = sliderPath . $post['theme'] . "/" . $post['slider'] . "/";

    for ($i = 0; $i < $lengthArray; $i++) {
        $target_file = $repertoire . basename($file['name'][$i]);
        // echo $files['tmp_name'][$i];
        // echo "<br>";
        // echo $targetFile ;
        // echo "<br>";echo "<br>";
        if (!isset($file['name'][$i]) || empty($file['name'][$i])) {
            throw new Exception("Vous devez sélectionner une image.");
        }

        if (!file_exists($repertoire)) mkdir($repertoire, 0777);

        $extension = strtolower(pathinfo($file['name'][$i], PATHINFO_EXTENSION));
        $target_file =  $repertoire . $file['name'][$i];

        if (!getimagesize($file["tmp_name"][$i]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        // if (file_exists($file['name'][$i]))
        //     throw new Exception("Le fichier existe déjà.");
        if ($file['size'][$i] > 750000)
            throw new Exception("Le fichier est trop volumineux (500ko maximum).");
        if (!move_uploaded_file($file['tmp_name'][$i], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
    }

    ajoutSliderFileBdd(($post['theme'] . "/" . $post['slider']), $post['id_article']);
}
