<?php

$title = get_sub_field('title');
$text = get_sub_field('text');
$contacts = get_sub_field('contacts');
$social_links = get_sub_field('social_links');

$paddingTop = get_sub_field('padding_top');
$paddingBottom = get_sub_field('padding_bottom');
$paddingTopMobile = get_sub_field('padding_top_mobile');
$paddingBottomMobile = get_sub_field('padding_bottom_mobile');


?>

<section class="text_and_contact" style="--padding-top:<?php echo $paddingTop; ?>px;--padding-bottom:<?php echo $paddingBottom; ?>px;--padding-top-mobile:<?php echo $paddingTopMobile; ?>px;--padding-bottom-mobile:<?php echo $paddingBottomMobile; ?>px;">
    <div class="container-fluid max-width">
        <?php if ($title) : ?>
            <h3 class="msq-body title"><?php echo $title ?></h3>
        <?php endif;?>
        <div class="main-wrapper">
            <div class="text-wrapper">
                <?php echo $text; ?>
            </div>
            <div class="contact-wrapper">
                <div class="contact">
                    <?php echo $contacts; ?>
                </div>
                <?php if ($social_links) : ?>
                <ul class="socials">
                    <?php foreach ($social_links as $social) : ?>
                        <li>
                            <a href="<?php echo $social['social']['url']; ?>" target="<?php echo $social['social']['target'] ?>"><?php echo $social['social']['title']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</section>
