<!-- 
$themes
$infosArticle
$images
$textes
 -->


<article class="container templateArticle2">
    <h1 class="titre_article"><?= $textes[0]['titre'] ?></h1>


    <section class="part part1">
        <p><?= $textes[0]['texte'] ?></p>


        <div class="sliderArticle">

            <?php for ($i = 1; $i <= $numFiles; $i++) :  ?>
                <img src="<?= imgFolder . $slider['dossier'] . "/" . $i . ".png" ?>" alt="slider" class="imgSlider
            <?= $i === 1 ? "imgSliderActive" : "" ?>
            ">
            <?php endfor ?>
            <div class="tiretsSlider">
                <?php for ($i = 1; $i <= $numFiles; $i++) :  ?>
                    <div class="tiretSlider <?= $i === 1 ? "tiretSliderActive" : "" ?>"></div>
                <?php endfor ?>
            </div>
            <div class="flecheSliderBox ">
                <i class="fa-solid fa-circle-arrow-left flecheSlider flecheSliderGauche"></i>
                <i class="fa-solid fa-circle-arrow-right flecheSlider flecheSliderDroite"></i>
            </div>
        </div>




    </section>


    <?php if (isset($textes[1]['titre']) && $textes[1]['titre'] !== '') : ?>
        <h2 class="titre_article"><?= $textes[1]['titre'] ?></h2>
    <?php endif ?>

    <section class="part part2">
        <p><?= $textes[1]['texte'] ?></p>
    </section>


</article>

<script src="<?= URL ?>public/javascript/slider.js"></script>