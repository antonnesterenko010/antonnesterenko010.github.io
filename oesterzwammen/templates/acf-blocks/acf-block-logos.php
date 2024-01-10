<?php
$fields = get_fields();

use ThemeOptions\Helpers;

?>
<section class="logos-image-block block-container">
    <div class="logos-block">

        <?php foreach (Helpers::get($fields, 'logos') as $logo) { ?>
            <div class="single-logo">
                <?php if (isset($logo['link']) && $logo['link']){ ?>
                    <a href="<?php echo $logo['link'] ?>" target="_blank">
                <?php } ?>
                    <?php echo wp_get_attachment_image($logo['logo'], ['164', '70']) ?>
                <?php if (isset($logo['link']) && $logo['link']){ ?>
                    </a>
                <?php } ?>

            </div>

        <?php } ?>
    </div>
</section>
