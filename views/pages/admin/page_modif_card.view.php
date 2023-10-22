<div class="container pagesAdmin">

    <h1>Modifions la Carte</h1>

    <div class="infoArticleEnCours">
        <p><b>id_article =</b> <?= $infosArticle['id_article']  ?></p>
        <p><b>theme = </b> <?= $infosArticle['theme']  ?></p>
        <p><b>templateArticle =</b> <?= $infosArticle['templateArticle']  ?></p>
        <p><b>url =</b> <?= $infosArticle['url']  ?></p>
        <p><b>titre card =</b> <?= $infosArticle['titre']  ?></p>
        <p><b>pitch card =</b> <?= $infosArticle['pitch']  ?></p>
        <p><b>A copier = </b><br>
            &lt;br&gt;&nbsp;&nbsp;
            &lt;h3&gt; &lt;/h3&gt;&nbsp;&nbsp;
            &lt;h4&gt; &lt;/h4&gt;&nbsp;&nbsp;
            &lt;p&gt; &lt;/p&gt;&nbsp;&nbsp;
            &lt;a&gt; &lt;/a&gt;&nbsp;&nbsp;
        </p>


    </div>

    <form action="<?= URL ?>kikiAdmin/validation_modification_carte" method="POST" class="container containerForm">


        <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
        
        <?php if (isset($images[0])) : ?>
            <input type="hidden" name="image1" value="<?= $images[0]['url_img'] ?>">
        <?php endif ?>
        <?php if (isset($images[1])) : ?>
            <input type="hidden" name="image2" value="<?= $images[1]['url_img'] ?>">
        <?php endif ?>
        
        <div class="entryForm">
            <label for="theme">Thème : </label>
            <select name="theme" id="theme">
                <option value="formations" <?= $infosArticle['theme'] === "formations" ? "selected" : "" ?>>1 - Formations</option>
                <option value="rocket" <?= $infosArticle['theme'] === "rocket" ? "selected" : "" ?>>2 - Rocket</option>
                <option value="portfolio" <?= $infosArticle['theme'] === "portfolio" ? "selected" : "" ?>>3 - Portfolio</option>
                <option value="projets" <?= $infosArticle['theme'] === "projets" ? "selected" : "" ?>>4 - Projets</option>
                <option value="tricks" <?= $infosArticle['theme'] === "tricks" ? "selected" : "" ?>>5 - Tricks</option>
                <option value="autres" <?= $infosArticle['theme'] === "autres" ? "selected" : "" ?>>6 - Autres</option>
            </select>
        </div>
        <div class="entryForm">
            <label for="templateArticle">Template :</label>
            <select name="templateArticle" id="templateArticle">
                <option value="templateArticle1" <?= $infosArticle['templateArticle'] === "templateArticle1" ? "selected" : "" ?>>templateArticle1 (2photos)</option>
                <option value="templateArticle2" <?= $infosArticle['templateArticle'] === "templateArticle2" ? "selected" : "" ?>>templateArticle2 (1 photo)</option>
                <option value="templateArticle3" <?= $infosArticle['templateArticle'] === "templateArticle3" ? "selected" : "" ?>>templateArticle3 (1 slider)</option>
                <option value="templateArticle4" <?= $infosArticle['templateArticle'] === "templateArticle4" ? "selected" : "" ?>>templateArticle4 (1 video)</option>
            </select>
        </div>

        <div class="entryForm">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" value="<?= $infosArticle['url'] ?>">
        </div>

        <div class="entryForm">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" value="<?= $infosArticle['titre'] ?>">
        </div>

        <div class="entryForm">
            <label for="pitch">Pitch</label>
            <input type="text" name="pitch" id="pitch" value="<?= $infosArticle['pitch'] ?>">
        </div>


        <div class="entryForm">
            <button type="submit">
                <p>Valider<br>Modifications Carte</p>
            </button>
        </div>

    </form>

</div>