
<div class="mob-menu__wrapper">
    <div class="mob-menu__wrapper__head">
        <div class="mob-menu__wrapper__logo">
            <?php if (function_exists('the_custom_logo') && has_custom_logo()) the_custom_logo(); ?>
        </div>
        <div class="mob-menu__wrapper__mobile"></div>
    </div>
    <div class="mob-menu__wrapper__body">
        <div class="mob-menu__wrapper__menu">
            <?php $args['menu']->insertMenu(); ?>
        </div>
    </div>
</div>
