<?php
$options = get_fields('options');
$fields = get_fields();
$section = $fields['info'];
?>
<section class="info-section <?php echo $section['background_style']; ?>">
    <div class="container">
        <div class="info__container">
            <div class="<?php echo $section['section_padding'] ?> content__block <?php echo $section['content_alignment']; ?>">
                <div class="content__block-text">
                    <?php if ($section['text']) :
                        echo $section['text'];
                        ?>
                    <?php endif; ?>
                    <a href="<?php echo $section['link']['url'] ?>" class="btn btn--pink btn--lg btn--with-arrow"
                    ><?php echo $section['link']['title'] ?>
                    </a>
                </div>
                <?php if ($section['image']) : ?>
                    <div class="content__block-img <?php echo $section['hide_image_mobile'] ?>">
                        <div>
                            <img
                                    src="<?php echo $section['image']['url'] ?>"
                                    alt="<?php echo $section['image']['alt'] ?>"
                            />
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>