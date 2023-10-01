


<article class="container">

    <h1 class="titre_article"><?= $infosArticle['titre'] ?></h1>

    <section class="part part1">
        <p><?= $infosArticle['texte1'] ?></p>
            <?php if (isset($infosArticle['image1']) && $infosArticle['image1'] !== '') : ?>
                <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $infosArticle['image1'] ?>" alt="<?= $infosArticle['altImg1'] ?>">
            <?php endif ?>
        
    </section>


    <h2 class="titre_article"><?= $infosArticle['titre2'] ?></h2>


    <section class="part part2">
        <?php if (isset($infosArticle['image2']) && $infosArticle['image2'] !== '') : ?>
            <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $infosArticle['image2'] ?>" alt="<?= $infosArticle['altImg2'] ?>">
        <?php endif ?>
        <p><?= $infosArticle['texte2'] ?></p>
    </section>


</article>