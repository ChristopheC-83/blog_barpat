<div class="container pagesAdmin">
    <a href="deconnexion">
        <h1>Administration</h1>
    </a>

    <div class="btnAdminBox container">

        <div class="btnAdmin"><a href="<?= URL ?>kikiAdmin/create_article">
                <p>Nouvel Article</p>
            </a></div>

        <div class="btnAdmin" id="btnAddTxt">
            <p>Ajouter du Texte</p>
        </div>

        <div class="btnAdmin" id="btnAddMedia">
            <p>Ajouter Media</p>
        </div>

        <div class="btnAdmin" id="btnUpdateCard">
            <p>Modifier Carte</p>
        </div>

        <div class="btnAdmin" id="btnUpdateText">
            <p>Modifier textes</p>
        </div>

    </div>

    <!-- <?= afficherTableau($infosArticles) ?> -->

    <div class="container listeArticles writeList dnone">
        <h3>Ecrire du texte pour quel article ? (seuls les vierges apparaissent)</h3>

        <ul>
            <?php foreach ($articlesWithoutText as $article) : ?>

                <a href="kikiAdmin/write_text/<?= $article['id_article'] ?>">
                    <li class="articleInList">
                        <p><?= $article['id_article'] ?> => <?= $article['titre'] ?> </p>
                    </li>
                </a>

            <?php endforeach ?>

        </ul>
    </div>
    <div class="container listeArticles addPhotoList dnone">
        <h3>Ajouter un média pour quel article ? (seuls les vierges apparaissent)</h3>
        <ul>

            <?php foreach ($articleWithoutMedia as $article) : ?>
                <a href="kikiAdmin/insert_photos_slider/<?= $article['id_article'] ?>">
                    <li class="articleInList">
                        <p><?= $article['id_article'] ?> => <?= $article['titre'] ?> </p>
                    </li>
                </a>

            <?php endforeach ?>

        </ul>
    </div>
    <div class="container listeArticles updateTextList dnone">
        <h3>Modifier les textes d'un articles (seuls articles écrits)</h3>
        <ul>

            <?php foreach ($articlesWithText as $article) : ?>
                <a href="kikiAdmin/update_text/<?= $article['id_article'] ?>">
                    <li class="articleInList">
                        <p><?= $article['id_article'] ?> => <?= $article['titre'] ?> </p>
                    </li>
                </a>

            <?php endforeach ?>

        </ul>
    </div>
    <div class="container listeArticles updateCardList dnone">
        <h3>Modifier la carte d'un article</h3>
        <ul>

            <?php foreach ($infosArticles as $article) : ?>
                <a href="kikiAdmin/update_card/<?= $article['id_article'] ?>">
                    <li class="articleInList">
                        <p><?= $article['id_article'] ?> => <?= $article['titre'] ?> </p>
                    </li>
                </a>

            <?php endforeach ?>

        </ul>
    </div>




</div>