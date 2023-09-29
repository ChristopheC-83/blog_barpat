<div class="accueil container">

   <div class="intro">
      <h1><?= $themePage['theme'] ?></h1>
      <h3><?= $themePage['description_theme'] ?></h3>
   </div>

   <div class="container allCards">
      <?php if (!empty($articlesTheme)) : ?>

          <?php foreach ($articlesTheme as $article) : ?>

            <?php require("./views/commons/articleCard.php") ?>

         <?php endforeach ?> 

      <?php else : ?>

         <h3>"Pas d'article sur ce theme"</h3>


      <?php endif ?>




   </div>
</div>