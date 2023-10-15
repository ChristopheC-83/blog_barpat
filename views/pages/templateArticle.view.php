<!-- 
$themes
$infosArticle
$images
$textes
 -->


<article class="container">

    <?php if (isset($textes[0]['titre'])) : ?>

       
        <?php require_once("./views/pages/templates/" . $infosArticle['templateArticle'] . ".view.php") ?>

    <?php else : ?> <?php if (estConnecte()) : ?>

            <p>on efface pas ce qui n'existe pas !</p>

        <?php endif ?>

        <h2>L'article est en cours de rédaction !</h2>
        <h3>Repassez plus tard 😉</h3>

    <?php endif ?>
</article>