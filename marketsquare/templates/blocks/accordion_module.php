<?php
$textColor = get_sub_field('text_color');
$titleBlock = get_sub_field('title_block');
$accordionItems = get_sub_field('accordion_items');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="accordion__module" <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd?>>
    <div class="container-fluid max-width">
        <div class="accordion__wrapper <?php echo $textColor == 1 ? 'white' : 'black' ?>">
            <h2 class="accordion__block-title"><?php echo $titleBlock ? $titleBlock : ''; ?></h2>
            <div class="accordion__items-wrapper">
                <ul class="accordion__list">
                    <?php foreach ($accordionItems as $accordionItem) : ?>
                        <li class="accordion__item"><?php echo $accordionItem['accordion_menu_title'] ? $accordionItem['accordion_menu_title'] : '' ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="accordion__info">
                    <?php $i = 0;
                    foreach ($accordionItems as $accordionItem) : ?>
                        <div class="accordion__info-item">
                            <h2 class="accordion__info-title"><?php echo $accordionItem['accordion_item_title'] ?></h2>
                            <p class="accordion__info-desc"><?php echo $accordionItem['accordion_desc'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
