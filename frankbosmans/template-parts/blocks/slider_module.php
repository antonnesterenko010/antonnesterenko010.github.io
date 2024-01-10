<?php

use ThemeOptions\Helpers;
use inc\CustomFunctions;

$acfFieldKeys = [
    'content'
];

$subFields = CustomFunctions::getSubFields($acfFieldKeys);

?>

<section class="slider" id="slider-section">
    <?php if (Helpers::get($subFields, 'content.image')) : ?>
        <div class="slider-image">
            <img src="<?php echo Helpers::get($subFields, 'content.image') ?>" alt="slider">
        </div>
    <?php endif; ?>
    <?php if (Helpers::get($subFields, 'content.slider')) : ?>
        <div class="slider__list">
            <div class="slider__list__wrapper">
                <div class="slider__list__inner">
                    <?php foreach (Helpers::get($subFields, 'content.slider') as $item) : ?>
                        <div class="slider__item">
                            <h3 class="slider-list__item display-3">
                                <?php echo $item['title'] ?>
                            </h3>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach (Helpers::get($subFields, 'content.slider') as $item) : ?>
                        <div class="slider__item" aria-hidden="true">
                            <h3 class="slider-list__item display-3">
                                <?php echo $item['title'] ?>
                            </h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>