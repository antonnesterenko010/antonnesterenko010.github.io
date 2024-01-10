<?php

$fields = get_fields();
$section = $fields['subscribe'];
?>
<?php
if ($section['form_shortcode']) :
?>
<section class="section__container subscribe-block">
    <div class="container">
        <div class="subscribe-block__wrapper">
            <?php if ($section['title']) : ?>
            <div class="subscribe-block__title">
                <?php echo $section['title']?>
            </div>
            <?php endif;?>
            <div class="subscribe-block__form">
                <div class="subscribe-block__formWrapper">
                    <?php echo do_shortcode($section['form_shortcode']); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>