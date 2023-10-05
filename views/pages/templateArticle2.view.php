<!-- 
$themes
$infosArticle
$images
$textes
 -->


<article class="container templateArticle2">

    <h1 class="titre_article"><?= $textes[0]['titre'] ?></h1>

    <section class="part part1">
        <p><?= $textes[0]['texte'] ?></p>
        <?php if (isset($images[0]['url_img']) && $images[0]['url_img'] !== '') : ?>
            <a href="<?= isset($images[0]['lien']) ? $images[0]['lien'] : '' ?>">
                <img src="<?= imgFolder ?><?= $infosArticle['theme'] ?>/<?= $images[0]['url_img'] ?>" alt="<?= $images[0]['alt_img'] ?>">
            </a>
        <?php endif ?>

    </section>

    <?php if (isset($textes[1]['titre']) && $textes[1]['titre'] !== '') : ?>
        <h2 class="titre_article"><?= $textes[1]['titre'] ?></h2>
    <?php endif ?>

    <section class="part part2">
        <p><?= $textes[1]['texte'] ?></p>
    </section>


</article>