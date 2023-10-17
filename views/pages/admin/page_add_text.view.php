<div class="container pagesAdmin">

    <h1>Ajoutons du texte !</h1>

    <div class="infoArticleEnCours">
        <p><b>id_article =</b> <?= $infosArticle['id_article']  ?></p>
        <p><b>theme = </b> <?= $infosArticle['theme']  ?></p>
        <p><b>templateArticle =</b> <?= $infosArticle['templateArticle']  ?></p>
        <p><b>url =</b> <?= $infosArticle['url']  ?></p>
        <p><b>titre card =</b> <?= $infosArticle['titre']  ?></p>
        <p><b>pitch card =</b> <?= $infosArticle['pitch']  ?></p>
        <?= isset($infosArticle['word_dl']) ? $infosArticle['word_dl'] : ""  ?>
        <?= isset($infosArticle['pdf_dl']) ? $infosArticle['pdf_dl'] : ""  ?>
        <p><b>A copier = </b><br>
            &lt;br&gt;<br>
            &lt;h3&gt; &lt;/h3&gt;<br>
            &lt;h4&gt; &lt;/h4&gt;<br>
            &lt;p&gt; &lt;/p&gt;<br>
            &lt;a&gt; &lt;/a&gt;<br>
        </p>


    </div>

    <form action="<?= URL ?>kikiAdmin/validation_text" method="POST" class="container containerForm">


        <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">

        <input type="hidden" name="num_article_1" value=1>
        <div class="entryForm">
            <label for="titre1">Titre 1</label>
            <input type="text" name="titre1" id="titre1">
        </div>
        <div class="entryForm">
            <label for="texte1">Texte 1</label>
            <textarea name="texte1" id="texte1" class="texteArticle"><?= isset($_SESSION['texte1']) ? $_SESSION['texte1'] : '' ?></textarea>
        </div>

        <input type="hidden" name="num_article_2" value=2>
        <div class="entryForm">
            <label for="titre2">Titre 2</label>
            <input type="text" name="titre2" id="titre2" value="<?= isset($_SESSION['titre2']) ? $_SESSION['titre2'] : '' ?>">
        </div>
        <div class="entryForm">
            <label for="texte2">Texte 2</label>
            <textarea name="texte2" id="texte2" class="texteArticle"><?= isset($_SESSION['texte2']) ? $_SESSION['texte2'] : '' ?></textarea>
        </div>

        <div class="entryForm">
            <button type="submit">
                <p>Textes OK<br> Aux Médias !</p>
            </button>
        </div>

    </form>

</div>