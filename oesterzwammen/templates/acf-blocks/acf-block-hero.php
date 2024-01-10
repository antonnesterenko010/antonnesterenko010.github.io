<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$section_height = Helpers::get($fields, 'hero_section_height');
if($section_height === 'large') {
    $section_height =  'hero__height__large';
} elseif($section_height === 'medium') {
    $section_height =  'hero__height__medium';
} else {
    echo '';
}
?>
<section class="hero-module-block <?php echo $section_height ?> <?php echo Helpers::get($fields, 'type_block') == 'other' ? 'other-hero' : '' ?> "
         <?php if(count(Helpers::get($fields, 'images')) < 1) {
             echo 'style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(0deg, rgba(203, 187, 157, 0.50) 0%, rgba(203, 187, 157, 0.50) 100%), url(' . wp_get_attachment_image_url(Helpers::get($fields, 'image.ID'), '') . ') no-repeat 50% center/cover lightgray;"';
         } else {
             echo '';
         }
         ?>>
    <span class="hero-bg"></span>

    <div class="hero-module-background">
        <?php if (count(Helpers::get($fields, 'images')) > 1){ ?>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php } ?>

                <?php foreach (Helpers::get($fields, 'images') as $image) { ?>
                    <div class="swiper-slide hero-image"
                         style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(0deg, rgba(203, 187, 157, 0.50) 0%, rgba(203, 187, 157, 0.50) 100%), url('<?php echo $image?>') no-repeat 50% center/cover lightgray;">
                    </div>

                <?php } ?>
                <?php if (count(Helpers::get($fields, 'images')) > 1){ ?>

            </div>
        </div>
    <?php } ?>

    </div>
    <div class="block-container">
        <h1 class="home-title"><?php echo Helpers::get($fields, 'title') ?></h1>
        <p class="hero description "><?php echo Helpers::get($fields, 'description') ?></p>
        <a class="main-link" href="<?php echo Helpers::get($fields, 'link')['url'] ?>"
           target="<?php echo Helpers::get($fields, 'link')['target'] ?>"><?php echo Helpers::get($fields, 'link')['title'] ?></a>
    </div>
</section>
