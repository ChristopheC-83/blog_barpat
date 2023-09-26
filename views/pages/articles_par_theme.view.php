<div class="accueil container">

   <div class="intro">
      <h1>From Scratch !</h1>
      <h3>Développeur Web, je vous partage mes expériences, mon parcours.</h3>
   </div>
   
   <div class="container allCards">
      <?php foreach ($articlesParTheme as $articleParTheme) : ?>
         <?php require("./views/commons/articleCardParTheme.php") ?>
      <?php endforeach ?>
   </div>
</div>