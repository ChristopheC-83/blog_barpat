<div class="container pagesAdmin">

    <h1>Créer un Article</h1>

    <div class="table table_articles">
        <form action="<?= URL ?>kikiAdmin/creationArticle" enctype="multipart/form-data" method="POST" class="container containerForm">
            <div class="entryForm">
                <label for="theme">Thème : </label>
                <select name="theme" id="theme">
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
                    <option value="templateArticle1">templateArticle1 (2photos)</option>
                    <option value="templateArticle2">templateArticle2 (1 photo)</option>
                    <option value="templateArticle3">templateArticle3 (1 slider)</option>
                    <option value="templateArticle4">templateArticle4 (1 video)</option>
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
                <button type="submit"><p>On crée<br>On ajoute du texte !</p></button>
            </div>
        </form>
    </div>
    


</div>