<?php
$fields = get_fields();

use ThemeOptions\Helpers;

?>
<section class="recipes-section block-container ">
    <div class="recipe-main-block">
        <div class="recipe-left-block" style="background: url(<?php echo get_template_directory_uri() . '/dest/images/recipe-left-image.png'; ?>), #F5F5F5">
            <h2 class="block-title"><?php echo Helpers::get($fields, 'title') ?></h2>
            <p class="recipe-description"><?php echo Helpers::get($fields, 'description') ?></p>
            <a class="main-link" href="<?php echo Helpers::get($fields, 'link')['url'] ?>"
               target="<?php echo Helpers::get($fields, 'link')['target'] ?>"><?php echo Helpers::get($fields, 'link')['title'] ?></a>
        </div>
        <div class="recipe-right-block">
            <span class="block-subtitle"><?php echo Helpers::get($fields, 'subtitle_right') ?></span>
            <h2 class="block-title"><?php echo Helpers::get($fields, 'title_right') ?></h2>
            <p class="recipe-description"><?php echo Helpers::get($fields, 'description_right') ?></p>
            <div class="recipes-block">
                <?php foreach (Helpers::get($fields, 'recipes') as $recipe) {
                    ?>
                    <div class="recipe-single-block">
                        <?php echo get_the_post_thumbnail($recipe->ID) ?>
                        <h3><?php echo get_the_title($recipe->ID) ?></h3>
                        <?php if (has_excerpt($recipe->ID)) { ?>
                            <p><?php echo get_the_excerpt($recipe->ID) ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="recipe-mobile-block">
        <div class="recipes-block">
            <?php foreach (Helpers::get($fields, 'recipes') as $recipe) {
                ?>
                <div class="recipe-single-block">
                    <?php echo get_the_post_thumbnail($recipe->ID) ?>
                    <h3><?php echo get_the_title($recipe->ID) ?></h3>
                    <?php if (has_excerpt($recipe->ID)) { ?>
                        <p><?php echo get_the_excerpt($recipe->ID) ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>


</section>
