<div class="accueil container">

   <div class="intro">
      <h1>From Scratch !</h1>
      <h3>Développeur Web, je vous partage mes expériences, mon parcours.</h3>
   </div>
   <div class="btnThemesContainer">
      <div class="btnTheme all_themes">
         <p>Tous </p>
      </div>
      <?php foreach ($themes as $theme) : ?>
         <div class="btnTheme <?= $theme['theme'] ?> ">
            <p><?= $theme['theme']  ?></p>
         </div>
      <?php endforeach ?>

   </div>
   <div class="container allCards">
      <?php foreach ($infosArticles as $article) : ?>
         <?php require("./views/commons/articleCard.php") ?>
      <?php endforeach ?>
   </div>
</div>