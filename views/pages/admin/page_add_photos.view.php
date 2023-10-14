<div class="container pagesAdmin">

    <h1>Ajouter
        <?= $infosArticle['templateArticle'] === "templateArticle1" ?  "2 Photos" : "" ?>
        <?= $infosArticle['templateArticle'] === "templateArticle2" ?  "1 Photo " : "" ?>
        <?= $infosArticle['templateArticle'] === "templateArticle3" ?  "Dossier Slider" : "" ?>
        <?= $infosArticle['templateArticle'] === "templateArticle4" ?  "1 video" : "" ?>
    </h1>

    <div class="infoArticleEnCours">
        <p><b>id_article =</b> <?= $infosArticle['id_article']  ?></p>
        <p><b>theme = </b> <?= $infosArticle['theme']  ?></p>
        <p><b>templateArticle =</b> <?= $infosArticle['templateArticle']  ?></p>
        <p><b>url =</b> <?= $infosArticle['url']  ?></p>
        <p><b>titre card =</b> <?= $infosArticle['titre']  ?></p>
        <p><b>pitch card =</b> <?= $infosArticle['pitch']  ?></p>
        <?= isset($infosArticle['word_dl']) ? $infosArticle['word_dl'] : ""  ?>
        <?= isset($infosArticle['pdf_dl']) ? $infosArticle['pdf_dl'] : ""  ?>
        <p><b>A copier = </b> &lt;h4&gt; &lt;/h4&gt;</p>
        <p><b>Titre 1 =</b> <?= $titles[0]['titre']  ?></p>
        <p><b>Titre 2 =</b> <?= $titles[1]['titre']  ?></p>



    </div>

    <div class="table table_articles">


        <!-- Template 1 -->

        <?php if ($infosArticle['templateArticle'] === "templateArticle1") : ?>

            <form action="<?= URL ?>kikiAdmin/ajout_2_photos" enctype="multipart/form-data" method="POST" class="containerForm">

                <input type="hidden" name="url" value="<?= $infosArticle['url']  ?>">
                <input type="hidden" name="theme" value="<?= $infosArticle['theme']  ?>">
                <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
                <input type="hidden" name="num_img1" value=1>
                <input type="hidden" name="num_img1" value=2>
                <input type="hidden" name="repertoire" value="<?= "public/assets/images/" . $infosArticle['theme'] . "/"  ?>">

                <div class="entryForm">
                    <label for="photo1">Photo</label>
                    <input type="file" name="photo1" id="photo1">
                </div>
                <div class="entryForm">
                    <label for="alt_img1">Description Image</label>
                    <input type="text" name="alt_img1" id="alt_img1">
                </div>
                <div class="entryForm">
                    <label for="lien1">Lien (facultatif)</label>
                    <input type="text" name="lien1" id="lien1">
                </div>

                <div class="entryForm">
                    <label for="photo2">Photo</label>
                    <input type="file" name="photo2" id="photo2">
                </div>
                <div class="entryForm">
                    <label for="alt_img2">Description Image</label>
                    <input type="text" name="alt_img2" id="alt_img2">
                </div>
                <div class="entryForm">
                    <label for="lien2">Lien (facultatif)</label>
                    <input type="text" name="lien2" id="lien2">
                </div>
                <div class="entryForm">
                    <button type="submit"><p>On publie !</p></button>
                </div>
            </form>
        <?php endif ?>

        <!-- Template 2 -->

        <?php if ($infosArticle['templateArticle'] === "templateArticle2") : ?>

            <form action="<?= URL ?>kikiAdmin/ajout_1_photo" enctype="multipart/form-data" method="POST" class="containerForm">

                <input type="hidden" name="url" value="<?= $infosArticle['url']  ?>">
                <input type="hidden" name="theme" value="<?= $infosArticle['theme']  ?>">
                <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
                <input type="hidden" name="num_img1" value=1>
                <input type="hidden" name="repertoire" value="<?= "public/assets/images/" . $infosArticle['theme'] . "/"  ?>">

                <div class="entryForm">
                    <label for="photo1">Photo</label>
                    <input type="file" name="photo1" id="photo1">
                </div>
                <div class="entryForm">
                    <label for="alt_img1">Description Image</label>
                    <input type="text" name="alt_img1" id="alt_img1">
                </div>
                <div class="entryForm">
                    <label for="lien1">Lien (facultatif)</label>
                    <input type="text" name="lien1" id="lien1">
                </div>

                <div class="entryForm">
                    <button type="submit"><p>On publie !</p></button>
                </div>
            </form>
        <?php endif ?>

        <!-- Template 3 -->


        <?php if ($infosArticle['templateArticle'] === "templateArticle3") : ?>
            <form action="<?= URL ?>kikiAdmin/ajout_1_slider" enctype="multipart/form-data" method="POST" class="containerForm">

                <input type="hidden" name="url" value="<?= $infosArticle['url']  ?>">
                <input type="hidden" name="theme" value="<?= $infosArticle['theme']  ?>">
                <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
                <input type="hidden" name="repertoire" value="<?= "public/assets/images/" . $infosArticle['theme'] . "/"  ?>">

                <label for="slider">Dossier Slider</label>
                <input type="text" name="slider" id="slider">
                <!-- Pour moults fichiers simultanées -->
                <label for="slider_files">Dossier Slider</label>
                <input type="file" name="photo[]" id="slider_files" multiple>


                <div class="entryForm">
                    <button type="submit"><p>On publie !</p></button>
                </div>

            </form>
        <?php endif ?>

        <!-- Template 4 -->

        <?php if ($infosArticle['templateArticle'] === "templateArticle4") : ?>
            <form action="<?= URL ?>kikiAdmin/ajout_1_video" enctype="multipart/form-data" method="POST" class="containerForm">
                <div class="entryForm">
                    <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
                    <input type="hidden" name="url" value="<?= $infosArticle['url']  ?>">
                    <input type="hidden" name="theme" value="<?= $infosArticle['theme']  ?>">
                    <label for="video">Lien de la vidéo :</label>
                    <input type="text" name="video" id="video">
                </div>
                <div class="entryForm">
                    <button type="submit"><p>On publie !</p></button>
                </div>

            </form>

        <?php endif ?>





    </div>
</div>