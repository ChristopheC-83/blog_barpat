<!-- 
$themes
$infosArticle
$images
$textes
 -->

<!-- 1 video centrale -->


<article class="container templateArticle2">

    <?php if (estConnecte()) : ?>
        <form action="<?= URL ?>kikiAdmin/delete_article_template4" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
            <button class="btnDelete">4</button>
        </form>
    <?php endif ?>

    <h1 class="titre_article"><?= $textes[0]['titre'] ?></h1>

    <section class="part part1">

        <p><?= $textes[0]['texte'] ?></p>

        <div class="iframeVideo">
            <iframe width="560" height="315" src="<?= $video['lien_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <a href="https://www.youtube.com/embed/D629D-eJ-a0?si=Noaq5rBiL03hm04X">Lien de la video</a>


    </section>

    <?php if (isset($textes[1]['titre']) && $textes[1]['titre'] !== '') : ?>
        <h2 class="titre_article"><?= $textes[1]['titre'] ?></h2>
    <?php endif ?>

    <section class="part part2">
        <p><?= $textes[1]['texte'] ?></p>
    </section>


</article>

<br><br>