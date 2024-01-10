<?php
get_header();

global $post;

$fields = get_fields();
$optionFields = get_fields('options');

use ThemeOptions\Helpers;

$args = [
    'post_type' => 'recepten',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array($post->ID)

];
$query = new WP_Query($args);

$terms = get_the_terms($post, 'recipes-type');

?>

    <main class="recipe-single-page">

        <section class="hero-module-block"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(0deg, rgba(203, 187, 157, 0.50) 0%, rgba(203, 187, 157, 0.50) 100%), url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>') no-repeat 50% center/cover lightgray;">
            <span class="hero-bg"></span>
            <div class="block-container">
                <h1 class="home-title"><?php the_title() ?></h1>
                <?php if (has_excerpt()) { ?>
                    <p class="hero description "><?php echo get_the_excerpt(); ?></p>
                <?php } ?>
            </div>
        </section>
        <section class="recipe-single-main-block block-container">
            <img class="opacity-bg-image"
                 src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
            <div class="recipe-single-left-block">
                <h2 class="recipe-subtitle"><?php _e('Ingredienten', 'oesterz'); ?></h2>
                <div class="recipe-types">
                    <?php
                    if ($terms) {

                        foreach ($terms as $term) { ?>
                            <span><?php echo $term->name ?></span>
                        <?php }
                    }
                    ?>

                </div>
                <span class="recipe-porties"><?php echo Helpers::get($fields, 'porties'); ?></span>
                <div class="recipe-ingredients">
                    <?php
                    if (Helpers::get($fields, 'ingredientens')) {
                        foreach (Helpers::get($fields, 'ingredientens') as $ingredient) { ?>
                            <h3 class="recipe-ingredients__title"><?php echo $ingredient['ingredients_title'] ?></h3>
                            <?php if ($ingredient['ingredients_list']) {
                                ?>
                                <ul class="recipe-ingredients__list">
                                    <?php
                                    foreach($ingredient['ingredients_list'] as $ingredient_item) {
                                        ?>
                                        <li><?php echo $ingredient_item['ingredienten']?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                            } }
                    } ?>
                </div>
                <h2 class="recipe-subtitle inner-subtitle"><?php _e('Bereidingswijze', 'oesterz'); ?></h2>
                <div class="recipe-text-content">
                    <?php
                    while (have_posts()) :
                        the_post();

                        the_content();

                    endwhile;
                    ?>
                </div>
            </div>
            <div class="recipe-single-right-block">
                <h2 class="recipe-subtitle"><?php _e('Populaire recepten', 'oesterz'); ?></h2>
                <div class="popular-recipes">
                    <?php foreach (Helpers::get($optionFields, 'popular_recipes') as $popularRecipe) { ?>
                        <div class="popular-single-block">
                            <a href="<?php echo get_permalink($popularRecipe)?>">

                                <div class="pop-recipe"><?php echo get_the_post_thumbnail($popularRecipe, ['308', '144']) ?></div>
                                <h3><?php echo get_the_title($popularRecipe); ?></h3>
                            </a>

                        </div>
                    <?php } ?>
                </div>
                <div class="side-image-block recipe-left-block"
                     style="background: url(<?php echo get_template_directory_uri() . '/dest/images/recipe-left-image.png'; ?>), #F5F5F5">
                    <h2 class="block-title"><?php echo Helpers::get($optionFields, 'title_single_recipe') ?></h2>
                    <p class="recipe-description"><?php echo Helpers::get($optionFields, 'description_single_recipe') ?></p>
                    <a class="main-link" href="<?php echo Helpers::get($optionFields, 'link_single_recipe')['url'] ?>"
                       target="<?php echo Helpers::get($optionFields, 'link_single_recipe')['target'] ?>"><?php echo Helpers::get($optionFields, 'link_single_recipe')['title'] ?></a>
                </div>

            </div>

        </section>
        <section class="news-section single-recipe-news">
            <div class="block-container">

                <img class="opacity-bg-image"
                     src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
                <span class="block-subtitle"><?php echo Helpers::get($optionFields, 'subtitle_single_recipe_relative') ?></span>
                <h2 class="block-title"><?php echo Helpers::get($optionFields, 'title_single_recipe_relative') ?></h2>
                <div class="news-sub-section">

                    <div class="swiper">

                        <div class="news-block swiper-wrapper">

                            <?php
                            if ($query) {
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    ?>
                                    <a href="<?php echo get_permalink($query->post->ID) ?>" class="swiper-slide single-news-main">
                                        <div class="news-image">
                                            <?php echo get_the_post_thumbnail($query->post->ID) ?>
                                        </div>
                                        <h3><?php echo get_the_title($query->post->ID) ?></h3>
                                        <?php if (has_excerpt($query->post->ID)) { ?>
                                            <p><?php echo mb_strimwidth(get_the_excerpt($query->post->ID), 0, 107, '...'); ?></p>
                                        <?php } ?>
                                        <span class="news-link"><?php _e('Lees meer', 'oesterz'); ?></span>
                                    </a>

                                <?php }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-block-main-news">
                <div class="swiper-button-prev-news"></div>
                <div class="swiper-button-next-news"></div>
            </div>
        </section>
    </main>

<?php
get_footer();
