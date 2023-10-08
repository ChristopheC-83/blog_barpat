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
        <form action="<?= URL ?>kikiAdmin/ajoutMedia" enctype="multipart/form-data" method="POST" class="container containerForm">

        <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">

            <!-- Template 1 -->

            <?php if ($infosArticle['templateArticle'] === "templateArticle1") : ?>
                <div class="entryForm">
                    <label for="photo1">Photo 1</label>
                    <input type="file" name="photo1" id="photo1">
                </div>

                <div class="entryForm">
                    <label for="photo2">Photo 2 (ssi templateArticle 1)</label>
                    <input type="file" name="photo2" id="photo2">
                </div>

            <?php endif ?>

            <!-- Template 2 -->

            <?php if ($infosArticle['templateArticle'] === "templateArticle2") : ?>
                <div class="entryForm">
                    <label for="photo1">Photo 1</label>
                    <input type="file" name="photo1" id="photo1">
                </div>

            <?php endif ?>

            <!-- Template 3 -->

            <?php if ($infosArticle['templateArticle'] === "templateArticle3") : ?>
                <div class="entryForm">
                    <label for="slider">Dossier Slider</label>
                    <input type="text" name="slider" id="slider">
                </div>

            <?php endif ?>

            <!-- Template 4 -->

            <?php if ($infosArticle['templateArticle'] === "templateArticle4") : ?>
                <div class="entryForm">
                    <label for="slider">Dossier Slider (ssi templateArticle 3)</label>
                    <input type="text" name="slider" id="slider">
                </div>

            <?php endif ?>


            <div class="entryForm">
                <button type="submit">On publie !!!</button>
            </div>


            <form action=""></form>


    </div>