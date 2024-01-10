<?php

use ThemeOptions\Helpers;
use inc\CustomFunctions;

$acfFieldKeys = [
    'content'
];

$subFields = CustomFunctions::getSubFields($acfFieldKeys);

?>

<section class="about" id="about-section">
    <div class="container">
        <?php if(Helpers::get($subFields, 'content.text')) : ?>
            <div class="about-text">
                <?php echo Helpers::get($subFields, 'content.text')?>
            </div>
        <?php endif;?>
    </div>
    <div class="container container-block" id="about-list">
        <div class="about-block">
            <?php if(Helpers::get($subFields, 'content.image')) :?>
                <div class="about__image">
                    <img src="<?php echo Helpers::get($subFields, 'content.image') ?>" alt="about">
                </div>
            <?php endif;?>
            <?php if(Helpers::get($subFields, 'content.list')) : ?>
                <ul class="about__list">
                    <?php foreach(Helpers::get($subFields, 'content.list') as $item) : ?>
                        <li class="about__list__item">
                            <div class="about__list__item__title">
                                <span><?php echo $item['counter']?></span>
                                <h3><?php echo $item['title']?></h3>
                            </div>
                            <div class="about__list__item__subtitle"><?php echo $item['subtitle']?></div>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>
    </div>
</section>