<?php
$textColor = get_sub_field('text_color');
$clientBlockTitle = get_sub_field('client_block_title');
$clientBlockName = get_sub_field('client_block_name');
$companyBlockTitle = get_sub_field('company_block_title');
$companyBlockName = get_sub_field('company_block_name');
$factsBlockTitle = get_sub_field('facts_block_title');
$factsBlockDesc = get_sub_field('facts_block_description');
$factsList = get_sub_field('facts_list');
$offsetTop = get_sub_field('offset_top');
$addCustomBg = get_sub_field('add_custom_bg');
$mainColorCheck = get_field('choose_main_color') ? get_field('choose_main_color') : get_sub_field('background_color');
$backGroundColor = $addCustomBg ? get_sub_field('background_color') : $mainColorCheck;
$marginBottom = get_sub_field('margin_bottom') ? 'margin-bottom:' . get_sub_field('margin_bottom') . 'px' : '';


?>

<section class="facts__module <?php echo $offsetTop ? 'offset-top-case' : '' ?>" <?php echo $marginBottom ? 'style="' . $marginBottom . '"' : '' ?>>
    <div class="container-fluid max-width">
        <div class="facts__wrapper <?php echo $textColor == 1 ? 'white' : 'black' ?>" <?php echo $backGroundColor ? 'style="background-color:' . $backGroundColor . '"'
            : '' ?>>
            <div class="facts__info-wrapper">
                <p class="facts__info-title"><?php echo $clientBlockTitle ? $clientBlockTitle : '' ?></p>
                <p class="facts__info-name"><?php echo $clientBlockName ? $clientBlockName : '' ?></p>
                <p class="facts__info-title"><?php echo $companyBlockTitle ? $companyBlockTitle : '' ?></p>
                <p class="facts__info-name"><?php echo $companyBlockName ? $companyBlockName : '' ?></p>
            </div>
            <div class="facts__content-wrapper">
                <h1 class="facts__content-title"><?php echo $factsBlockTitle ? $factsBlockTitle : '' ?></h1>
                <div class="facts__content">
                    <p class="facts__content-desc"><?php echo $factsBlockDesc ? $factsBlockDesc : '' ?></p>
                    <div class="facts__facts-wrapper <?php echo count($factsList) == 1 ? 'single' : '' ?>">
                        <?php if ($factsList) : ?>
                            <?php foreach ($factsList as $fact) : ?>
                                <div class="facts__facts-item">
                                    <p class="facts__facts-title"><?php echo $fact ? $fact['facts_item_title'] : '';
                                        ?></p>
                                    <p class="facts__facts-desc"><?php echo $fact ? $fact['facts_item_description'] : '';
                                        ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
