<!-- 
$themes
$infosArticle
$images
$textes
 -->



<article class="container templateArticle1">

    <h1 class="titre_article">
        <?= $textes[0]['titre'] ?>

    </h1>

    <section class="part part1">
        <p><?= $textes[0]['texte'] ?></p>
        <?php if (isset($images[0]['url_img']) && $images[0]['url_img'] !== '') : ?>
            <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $images[0]['url_img'] ?>" alt="<?= $images[0]['alt_img'] ?>">
        <?php endif ?>

    </section>


    <h2 class="titre_article"><?= $textes[1]['titre'] ?></h2>


    <section class="part part2">
        <?php if (isset($images[1]['url_img']) && $images[1]['url_img'] !== '') : ?>
            <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $images[1]['url_img'] ?>" alt="<?= $images[1]['alt_img'] ?>">
        <?php endif ?>
        <p><?= $textes[1]['texte'] ?></p>
    </section>


</article>