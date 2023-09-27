<div class="btnThemesContainer">
   <div class="btnTheme all_themes" >
      <a href="<?= URL ?>accueil" style="color:#333">
         <p>Accueil</p>
      </a>
   </div>

   <?php foreach ($themes as $theme) : ?>
      <a class="btnTheme <?= $theme['theme'] ?>" style="color:#333">
         <p><?= $theme['theme'] ?></p>
      </a>
   <?php endforeach ?>

</div>