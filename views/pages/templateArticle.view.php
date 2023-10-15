<!-- 
$themes
$infosArticle
$images
$textes
 -->


<article class="container">

    <?php if (isset($textes[0]['titre'])) : ?>

        <?php if (estConnecte()) : ?>
            <form action="<?= URL ?>kikiAdmin/delete_article" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
                <input type="hidden" name="fileToDelete1" value=<?php if ($infosArticle['templateArticle'] === "templateArticle2" || $infosArticle['templateArticle'] === "templateArticle1") {
                                                                    echo ("public/assets/images/" . $infosArticle['theme'] . "/" . $images[0]['url_img']);
                                                                }
                                                                ?>>
                <input type="hidden" name="fileToDelete2" value="<?= $infosArticle['templateArticle'] === "templateArticle1" ? "public/assets/images/" . $infosArticle['theme'] . "/" . $images[1]['url_img'] : "" ?>">
                <input type="hidden" name="folderToDelete" value="<?= $infosArticle['templateArticle'] === "templateArticle3" ? "public/assets/sliders/" . $slider['dossier'] : "" ?>">

                <button class="btnDelete">X</button>
            </form>
        <?php endif ?>


        <?php require_once("./views/pages/templates/" . $infosArticle['templateArticle'] . ".view.php") ?>

    <?php else : ?> <?php if (estConnecte()) : ?>

            <p>on efface pas ce qui n'existe pas !</p>

        <?php endif ?>

        <h2>L'article est en cours de rédaction !</h2>
        <h3>Repassez plus tard 😉</h3>

    <?php endif ?>
</article>