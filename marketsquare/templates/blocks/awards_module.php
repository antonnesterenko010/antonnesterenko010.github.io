<?php
$textColor = get_sub_field('text_color');
$title = get_sub_field('title');
$desc = get_sub_field('desc');
$awardsItems = get_sub_field('awards_items');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();

?>

<section class="awards__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="awards__wrapper">
            <div class="awards__info-wrapper <?php echo $textColor == 1 ? 'white' : '' ?>">
                <p class="awards__info-title"><?php echo $title ? $title : '' ?></p>
                <div class="awards__info-desc editor-cont">
                    <?php echo $desc ? $desc : '' ?>
                </div>
            </div>
            <?php foreach ($awardsItems as $awardsItem) :
                $image = $awardsItem['image'] ? $awardsItem['image']['sizes']['awards-image'] : '';
                $imageWeb = $awardsItem['imagewebp'] ? $awardsItem['imagewebp']['sizes']['awards-image'] : '';
                ?>
                <div class="awards__item">
                    <?php get_template_part_var('templates/parts/picture', ['imageWeb' => $imageWeb, 'image' => $image]); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
