<?php
$textColor = get_sub_field('text_color');
$topLabel = get_sub_field('top_label');
$bottomLabel = get_sub_field('bottom_label');
$content = get_sub_field('content');
$repeater = get_sub_field('repeater');
?>

<section class="about__module <?php echo $textColor == 1 ? 'white' : '' ?>">
    <div class="container-fluid max-width">
        <div class="about__module__wrapper">
            <span><?php echo $topLabel; ?></span>
            <div class="about__module__wrapper__content">
                <?php echo $content; ?>
            </div>
            <span><?php echo $bottomLabel; ?></span>
            <div id="cursor-about"></div>
            <div class="about__module__wrapper__media d-none">
                <?php if ($repeater): ?>
                    <?php foreach ($repeater as $item):
                        if (!empty($item['media']['url'])): ?>
                            <p><?php echo $item['media']['url'] ?></p>
                        <?php endif;
                    endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
