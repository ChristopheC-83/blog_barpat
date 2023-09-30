<?php
if (empty($_GET['page'])) {
   $url[0] = "accueil";
} else {
   $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
   $page = $url[0];
}

?>
<div class="btnThemesContainer">



   <a href="<?= URL ?>accueil" class="btnTheme all_themes 
      <?=
      (empty($url[0]) || $url[0] === 'accueil') ? 'selected_theme' : '';
      ?>
   " style="color:#333">
      <p>Accueil</p>
   </a>

   <?php foreach ($themes as $theme) : ?>
      <a href="<?= URL ?>theme/<?= $theme['theme'] ?>" class="btnTheme
       <?= $theme['theme'] ?> 
       <?= $url[1] === $theme['theme'] ? 'selected_theme' : '' ?>" style="color:#333">
         <p><?= $theme['theme'] ?></p>
      </a>
   <?php endforeach ?>

</div>