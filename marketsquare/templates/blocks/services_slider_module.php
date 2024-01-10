<?php
$moduleTitle = get_sub_field('module_title');
$services = get_sub_field('services');
$textColor = get_sub_field('text_color');
?>

<section class="services-slider__module <?php echo $textColor == 1 ? 'white' : '' ?>">
    <div class="max-width container-fluid">
        <div class="services-slider__container">
            <h2 class="services-slider__main-title"><?php echo $moduleTitle ? $moduleTitle : '' ?></h2>
            <div class="services-slider__items owl-carousel">
                <?php if ($services): ?>
                    <?php foreach ($services as $service): ?>
                        <?php
                        $image = $service['item_image'] ? $service['item_image']['sizes']['services-img'] : '';
                        $imageWeb = $service['item_image_webp'] ? $service['item_image_webp']['sizes']['services-img'] : '';
                        ?>
                        <div class="services-slider__item">
                            <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                            <?php if ($service['item_title']): ?>
                                <h6 class="services-slider__item-title"><?php echo $service ? $service['item_title'] : '' ?></h6>
                            <?php endif; ?>
                            <p class="services-slider__item-desc"><?php echo $service ? $service['item_description'] : '' ?></p>
                            <a class="link-arrow services-slider__item-link" href="<?php echo $service ? $service['item_link'] : '' ?>">
                                <?php echo $service ? $service['item_link_title'] : '' ?>
                                <?php get_template_part_var('templates/parts/arrow'); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
