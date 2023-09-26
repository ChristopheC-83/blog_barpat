

<div class="btnThemesContainer">
   <div class="btnTheme accueil_themes">
      <a>
         <p>Accueil</p>
      </a>
   </div>
   <div class="btnTheme all_themes">
      <a>
         <p>Tous</p>
      </a>
   </div>
   <?php foreach ($themes as $theme) : ?>
      <div class="btnTheme <?= $theme['theme'] ?>" >
         <p><?= $theme['theme']  ?></p>
      </div>
   <?php endforeach ?>

</div>