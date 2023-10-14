<!-- 
$themes
$infosArticle
$images
$textes
 -->


<article class="container">
    <?php if (estConnecte()) : ?>
        <a class="delete_article" href="<?= URL ?>kikiAdmin/delete_article/<?= $infosArticle['id_article'] ?>">
            <p>X</p>
        </a>
    <?php endif ?>

    <?php if (isset($textes[0]['titre'])) : ?>

        <?php require_once("./views/pages/templates/" . $infosArticle['templateArticle'] . ".view.php") ?>

    <?php else : ?>

        <h2>L'article est en cours de rédaction !</h2>
        <h3>Repassez plus tard 😉</h3>

    <?php endif ?>
</article>