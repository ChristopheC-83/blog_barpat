<article class="container">

    <div class="btnThemesContainer">
        <div class="btnTheme">
            <p>Tous les Articles</p>
        </div>
        <?php foreach ($themes as $theme) : ?>
            <div class="btnTheme <?= $theme['theme'] ?> ">
                <p><?= $theme['theme']  ?></p>
            </div>
        <?php endforeach ?>

    </div>

    <h1 class="titre_article"><?= $infosArticle['titre'] ?></h1>

    <section class="part part1">
        <p><?= $infosArticle['texte1'] ?></p>
            <?php if (isset($infosArticle['image1']) && $infosArticle['image1'] !== '') : ?>
                <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $infosArticle['image1'] ?>" alt="<?= $infosArticle['altImg1'] ?>">
            <?php endif ?>
        
    </section>

    <section class="part part2">
        <?php if (isset($infosArticle['image2']) && $infosArticle['image2'] !== '') : ?>
            <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $infosArticle['image2'] ?>" alt="<?= $infosArticle['altImg2'] ?>">
        <?php endif ?>
        <p><?= $infosArticle['texte2'] ?></p>
    </section>

</article>