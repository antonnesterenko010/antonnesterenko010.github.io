<?php
$textColor = get_sub_field('text_color');
$bgColor = get_sub_field('background_color');
$offsetTop = get_sub_field('offset_top');
$services = get_sub_field('choose_services');
$title = get_sub_field('title_service');
?>

<section class="services-main-module__module <?php echo $offsetTop ? 'offset-top' : '' ?>">
    <div class="container-fluid max-width">
        <div class="services-main-module__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>" <?php echo $bgColor ? 'style="background-color:' . $bgColor . '"' : '' ?>>
            <div class="services-main-module__title"><?php echo $title; ?></div>
            <div class="services-main-module__items-wrapper">
                <div class="services-main-module__list">
                    <?php foreach ($services as $service) :
                        $image = get_the_post_thumbnail($service, 'main-services-img');
                        $addContent = get_field('additional_content', $service);
                        $imageWeb = $addContent['image_webp'] ? $addContent['image_webp']['sizes']['main-services-img'] : '';
                        $desc = $addContent['short_desc'] ? $addContent['short_desc'] : '';
                        $linkTitle = $addContent['link_title'] ? $addContent['link_title'] : '';
                        ?>
                        <div class="services-main-module__item">
                            <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image, 'thumbnail' => true]); ?>
                            <h3 class="services-main-module__item-title"><?php echo get_the_title($service) ?></h3>
                            <p class="services-main-module__info-desc"><?php echo $desc ?></p>
                            <a href="<?php echo get_the_permalink($service) ?>" class="services-main-module__info-link link-arrow">
                                <?php echo $linkTitle ?>
                                <?php get_template_part_var('templates/parts/arrow'); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

