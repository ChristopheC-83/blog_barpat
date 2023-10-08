<!-- 
$themes
$infosArticle
$images
$textes
 -->

<!-- 1 video centrale -->


<article class="container templateArticle2">

    <h1 class="titre_article"><?= $textes[0]['titre'] ?></h1>

    <section class="part part1">

        <p><?= $textes[0]['texte'] ?></p>

        <div class="iframeVideo">
            <iframe width="560" height="315" src="<?= $images[0]['url_img'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>



    </section>

    <?php if (isset($textes[1]['titre']) && $textes[1]['titre'] !== '') : ?>
        <h2 class="titre_article"><?= $textes[1]['titre'] ?></h2>
    <?php endif ?>

    <section class="part part2">
        <p><?= $textes[1]['texte'] ?></p>
    </section>


</article>

<br><br>