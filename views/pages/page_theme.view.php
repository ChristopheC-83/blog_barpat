<div class="accueil container">

   <div class="intro">
      <h1><?= isset($themePage['theme']) ? $themePage['theme'] : "" ?></h1>
      <h3><?= isset($themePage['description_theme']) ? $themePage['description_theme'] : "" ?></h3>
   </div>


   <div class="container allCards">
      <?php if (!empty($articlesTheme)) : ?>

         <?php foreach ($articlesTheme as $article) : ?>

            <?php require("./views/components/articleCard.php") ?>

         <?php endforeach ?>

      <?php else : ?>

         <h3>"Je crois que ce thème n'est pas répertorié ! 😅"</h3>

      <?php endif ?>

   </div>
</div>