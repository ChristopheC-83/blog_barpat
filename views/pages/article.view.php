<article class="container">
    <h1><?= $infosArticle['titre'] ?></h1>

    <section class="part part1">
        <p><?= $infosArticle['texte1'] ?></p>
        <img src="<?= imgFolder ?>autres/<?= $infosArticle['image1'] ?>" alt="<?= $infosArticle['altImg1'] ?>">
    </section>

    <section class="part part2">
        <p><?= $infosArticle['texte2'] ?></p>
        <img src="<?= imgFolder ?>autres/<?= $infosArticle['image2'] ?>" alt="<?= $infosArticle['altImg2'] ?>">
    </section>

</article>