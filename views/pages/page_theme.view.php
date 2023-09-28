<div class="accueil container">

   <div class="intro">
      <h1><?= $theme['theme'] ?></h1>
      <h3><?= $theme['description_theme'] ?></h3>
   </div>
   
   <div class="container allCards">
      <?php foreach ($infosArticles as $article) : ?>
         <?php require("./views/commons/articleCard.php") ?>
      <?php endforeach ?>
   </div>
</div>


<?php
if (!empty($articlesTheme)) {
    afficherTableau($articlesTheme);
} else {
    echo ("Pas d'article sur ce theme");
}

?>
