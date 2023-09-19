<div class="accueil container">

   <div class="intro">
      <h1>From Scratch !</h1>
      <h2>Développeur Web, je vous partage<br> mes expériences, mon parcours.</h2>
   </div>
   <div class="btnThemesContainer">
      <div class="btnTheme">
         <p>Tous les Articles</p>
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