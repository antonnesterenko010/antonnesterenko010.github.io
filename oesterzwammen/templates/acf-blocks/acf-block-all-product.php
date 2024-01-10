<?php
$fields = get_fields();

use ThemeOptions\Helpers;

$arg = [
    'post_type' => 'products',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
];
$query = new WP_Query($arg);

?>

<section class="all-product-block block-container">
    <img class="opacity-bg-image"
         src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
    <?php
    if ($query && Helpers::get($fields, 'type_selected_product') == 'all') {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="product-cart">
                <a href="<?php echo get_permalink($query->post->ID) ?>">

                    <div class="cart-img"><?php echo get_the_post_thumbnail($query->post->ID, ['259', '224']) ?></div>
                    <h4><?php echo get_the_title($query->post->ID) ?></h4>
                </a>

            </div>

            <?php

        }
    } elseif (Helpers::get($fields, 'type_selected_product') == 'select') {
        foreach (Helpers::get($fields, 'select_products') as $product) {
            ?>
            <div class="product-cart">
                <a href="<?php echo get_permalink($product) ?>">
                    <div class="cart-img"><?php echo get_the_post_thumbnail($product, ['259', '224']) ?></div>
                    <h4><?php echo get_the_title($product) ?></h4>
                </a>
            </div>
        <?php }
    }
    ?>
</section>
