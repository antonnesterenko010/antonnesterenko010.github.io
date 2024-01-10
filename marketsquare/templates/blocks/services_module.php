<?php
$services = get_sub_field('service_item');
$textColor = get_sub_field('text_color');
?>

<section class="services__module">
    <div class="container-fluid max-width">
        <div class="services__wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
            <?php foreach ($services as $service) : ?>
                <?php
                $servicesTitle = $service['title'];
                $servicesSubTitle = $service['sub_title'];
                $servicesDesc = $service['description'];
                $servicesLinkTitle = $service['link']['link_title'];
                $servicesLinkUrl = $service['link']['link_url'];
                $image = $service['image']['service_img'] ? $service['image']['service_img']['sizes']['services-img'] : '';
                $imageWeb = $service['image']['service_image_webp'] ? $service['image']['service_image_webp']['sizes']['services-img'] : '';
                ?>
                <div class="services__item">
                    <div class="services__main-content">
                        <a href="<?php echo $servicesLinkUrl ? $servicesLinkUrl : '' ?>">
                            <h2 class="services__title"><?php echo $servicesTitle ? $servicesTitle : '' ?>
                                <?php echo $service['add_title_red'] ? '<br><span>' . $service['title_red'] . '</span>' : '' ?>
                            </h2>
                        </a>
                        <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                    </div>
                    <h3 class="services__subtitle"><?php echo $servicesSubTitle ? $servicesSubTitle : '' ?>
                        <?php echo $service['add_sub_title_red'] ? '<span>' . $service['sub_title_red'] . '</span>' : '' ?>
                    </h3>
                    <p class="services__desc"><?php echo $servicesDesc ?></p>
                    <a class="services__link link-arrow" href="<?php echo $servicesLinkUrl ? $servicesLinkUrl : '' ?>">
                        <?php echo $servicesLinkTitle ?>
                        <?php get_template_part_var('templates/parts/arrow'); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
