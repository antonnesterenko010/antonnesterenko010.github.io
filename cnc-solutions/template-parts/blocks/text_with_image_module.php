<?php

use ThemeOptions\Helpers;
use inc\CustomFunctions;

$acfFieldKeys = [
    'content'
];

$subFields = CustomFunctions::getSubFields($acfFieldKeys);

?>
<section class="twi" id="twi-section">
    <div class="container">
        <div class="twi-block">
            <?php if(Helpers::get($subFields, 'content.title')) : ?>
            <h2 class="twi-title display-4">
                <?php echo Helpers::get($subFields, 'content.title')?>
            </h2>
            <?php endif;?>
            <?php if(Helpers::get($subFields, 'content.subtitle')) : ?>
            <div class="twi-subtitle">
                <?php echo Helpers::get($subFields, 'content.subtitle')?>
            </div>
            <?php endif;?>
        </div>
        <?php if(Helpers::get($subFields, 'content.image')) : ?>
        <div class="twi-image">
            <img src="<?php echo Helpers::get($subFields, 'content.image') ?>" alt="content-image">
        </div>
        <?php endif;?>
    </div>
</section>