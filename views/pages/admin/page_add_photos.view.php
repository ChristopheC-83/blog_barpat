<div class="container pagesAdmin">

    <h1>Créer un Article</h1>

    <div class="table table_articles">
        <h3>Table "articles"</h3>
        <form action="<?= URL ?>kikiAdmin/creationArticle" enctype="multipart/form-data" method="POST" class="container containerForm">
            <div class="entryForm">
                <label for="articleTheme">Thème : </label>
                <select name="articleTheme" id="articleTheme">
                    <option value="formations">1 - Formations</option>
                    <option value="rocket">2 - Rocket</option>
                    <option value="portfolio">3 - Portfolio</option>
                    <option value="fiches">4 - Fiches</option>
                    <option value="tricks">5 - Tricks</option>
                    <option value="autres">6 - Autres</option>
                </select>
            </div>
            <div class="entryForm">
                <label for="templateArticle">Template :</label>
                <select name="templateArticle" id="templateArticle">
                    <option value="templateArticle1">templateArticle1</option>
                    <option value="templateArticle2">templateArticle2</option>
                    <option value="templateArticle3">templateArticle3</option>
                </select>
            </div>
            <div class="entryForm">
                <label for="url">URL article</label>
                <input type="text" name="url" id="url">
            </div>
            <div class="entryForm">
                <label for="titre">Titre Carte</label>
                <input type="text" name="titre" id="titre">
            </div>
            <div class="entryForm">
                <label for="pitch">Pitch Carte</label>
                <input type="text" name="pitch" id="pitch">
            </div>
            <div class="entryForm">
                <button type="submit">On envoie table_articles !</button>
            </div>
        </form>
    </div>
    <div class="entryForm">
        <label for="titre1">Titre texte 1</label>
        <input type="text" name="titre1" id="titre1">
    </div>
    <div class="entryForm">
        <label for="texte1">Texte 1</label>
        <textarea name="texte1" id="texte1" class="texteArticle"></textarea>
    </div>
    <div class="entryForm">
        <label for="titre2">Titre texte 2</label>
        <input type="text" name="titre2" id="titre2">
    </div>
    <div class="entryForm">
        <label for="texte2">Texte 2</label>
        <textarea name="texte2" id="texte2" class="texteArticle"></textarea>
    </div>

    <div class="entryForm">
        <label for="photo1">Photo 1</label>
        <input type="file" name="photo1" id="photo1">
    </div>

    <div class="entryForm">
        <label for="photo2">Photo 2 (ssi templateArticle 1)</label>
        <input type="file" name="photo2" id="photo2">
    </div>

    <div class="entryForm">
        <label for="slider">Dossier Slider (ssi templateArticle 3)</label>
        <input type="text" name="slider" id="slider">
    </div>

    <div class="entryForm">
        <button type="submit">On publie !!!</button>
    </div>


    <form action=""></form>


</div>