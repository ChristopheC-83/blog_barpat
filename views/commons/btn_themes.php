<div class="btnThemesContainer">

   <div class="btnTheme all_themes">
      <a href="<?= URL ?>">
         <p>Tous</p>
      </a>
   </div>
   <?php foreach ($infosArticles as $infosArticle) : ?>

      <form action="selection_articles/<?= $infosArticle['theme']  ?>" method="POST">
         <input type="hidden" name="<?= URL ?><?= $infosArticle['url']  ?>" value="<?= $infosArticle['url']  ?>">
         <input type="hidden" name="<?= $infosArticle['theme']  ?>" value="<?= $infosArticle['theme']  ?>">
         <!-- Autres champs du formulaire -->
         <button type="submit" class="btnTheme <?= $infosArticle['theme'] ?>"><p><?= $infosArticle['theme']  ?></p></button>
      </form>

   <?php endforeach ?>

</div>