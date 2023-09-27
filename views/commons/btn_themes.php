<div class="btnThemesContainer">
   <div class="btnTheme all_themes" >
      <a href="<?= URL ?>accueil">
         <p style="color:#333">Accueil</p>
      </a>
   </div>

   <?php foreach ($themes as $theme) : ?>
      <div class="btnTheme <?= $theme['theme'] ?>">
         <p style="color:#333"><?= $theme['theme'] ?></p>
      </div>
   <?php endforeach ?>

</div>