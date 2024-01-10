<?php
$textColor = get_sub_field('text_color');
$blockTitle = get_sub_field('block_title');
$factsTitle = get_sub_field('facts_title');
$factsDesc = get_sub_field('facts_desc');
$factsSubDesc = get_sub_field('facts_sub_desc');
$facts = get_sub_field('facts');
$addCustom = get_sub_field('add_custom_section_bg');
$bgAdd = styleControl();
?>

<section class="facts-full-width__module <?php echo $addCustom ? 'custom-mobile-pudding' : '' ?>" <?php echo $bgAdd ?>>
    <div class="container-fluid max-width">
        <div class="facts-full-width__wrapper <?php echo $textColor == 1 ? 'white' : 'black' ?>">
            <h2 class="facts-full-width__block-title"><?php echo $blockTitle ? $blockTitle : '' ?></h2>
            <div class="facts-full-width__wrapper__left">
                <?php if ($factsTitle): ?>
                    <p class="facts-full-width__facts-title"><?php echo $factsTitle ?></p>
                <?php endif; ?>
                <p class="facts-full-width__facts-desc"><?php echo $factsDesc ? $factsDesc : '' ?></p>
                <p class="facts-full-width__facts-sub-desc"><?php echo $factsSubDesc ? $factsSubDesc : '' ?></p>
            </div>
            <div class="facts-full-width__wrapper-info">
                <div class="facts-full-width__item-wrapper">
                    <?php foreach ($facts as $fact) : ?>
                        <div class="facts-full-width__item">
                            <p class="facts-full-width__item-title"><?php echo $fact ? $fact['item_title'] : '' ?></p>
                            <p class="facts-full-width__item-desc"><?php echo $fact ? $fact['item_desc'] : '' ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
