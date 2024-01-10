<?php
$fields = get_fields();

use ThemeOptions\Helpers;


?>

<section class="select-product-block block-container">
    <img class="opacity-bg-image"
         src="<?php echo get_template_directory_uri() . '/dest/images/bg-image-opacity.png' ?>">
    <?php
        foreach (Helpers::get($fields, 'products') as $product){
            ?>
            <div class="product-block">
                <div class="product-block-img"><?php echo get_the_post_thumbnail($product, ['430', '471'])?></div>
                <div class="product-block-content">
                    <span><?php echo get_field('subtitle', $product) ?></span>
                    <h4><?php echo get_the_title($product)?></h4>
                    <p><?php echo get_field('description', $product)?></p>
                    <a class="main-link" href="<?php echo get_permalink($product)?>"><?php _e('naar product', 'oesterz');?></a>
                </div>
            </div>
        <?php } ?>
</section>
