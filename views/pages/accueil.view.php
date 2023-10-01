<div class="accueil container">

   <div class="intro">
      <h1>From Scratch !</h1>
      <h3>Développeur Web, je vous partage mes expériences, mon parcours.</h3>
   </div>
   
   <div class="container allCards">
      <?php foreach ($infosArticles as $article) : ?>
         <?php require("./views/components/articleCard.php") ?>
      <?php endforeach ?>
   </div>
</div>