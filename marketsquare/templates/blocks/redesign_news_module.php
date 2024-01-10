<?php
$title = get_sub_field('module_title');
$post = get_sub_field('select_post');
$postID = $post[0]->ID;
$clientName = get_field('content', $postID)[1]['client_block_title'];
$factsTitle = get_field('content', $postID)[1]['facts_block_title'];
$changeHeight = get_sub_field('change_module_height');
$marginTopDesktop = $changeHeight['margin_top_desktop'] ? ' margin-desktop-top="'. $changeHeight['margin_top_desktop'] .'px" ' : '';
$marginBottomDesktop = $changeHeight['margin_bottom_desktop'] ? ' margin-desktop-bottom="'. $changeHeight['margin_bottom_desktop'] .'px" ' : '';

$marginTopTablet = $changeHeight['margin_top_tablet'] ? ' margin-tablet-top="'. $changeHeight['margin_top_tablet'] .'px" ' : '';
$marginBottomTablet = $changeHeight['margin_bottom_tablet'] ? ' margin-tablet-bottom="'. $changeHeight['margin_bottom_tablet'] .'px" ' : '';

$marginTopMobile = $changeHeight['margin_top_mobile'] ? ' margin-mobile-top="'. $changeHeight['margin_top_mobile'] .'px" ' : '';
$marginBottomMobile = $changeHeight['margin_bottom_mobile'] ? ' margin-mobile-bottom="'. $changeHeight['margin_bottom_mobile'] .'px" ' : '';

?>

<section class="news__module resize-module"
    <?php echo $marginTopDesktop;?> <?php echo $marginBottomDesktop?><?php echo $marginTopTablet;?> <?php echo $marginBottomTablet?><?php echo $marginTopMobile;?> <?php echo $marginBottomMobile?>>
    <div class="container-fluid max-width">
        <?php
        if($postID) :
            $post = get_post($postID);
            if($post && $post->post_type === 'news') :
                setup_postdata($post);
            ?>
                <div class="news__wrapper">
                    <?php if($title) :?>
                        <h3 class="news__title msq-body"><?php echo $title ?></h3>
                    <?php endif;?>
                    <div class="post__header">
                        <a class="news__link link-arrow msq-body" href="<?php the_permalink() ?>">
                            <?php the_title() ?>
                            <?php get_template_part_var('templates/parts/redesign-arrow'); ?>
                        </a>
                        <span class="news__date msq-body"><?php
                            $postDate = get_the_date('d / m /Y');
                            echo $postDate;
                            ?>
                    </span>
                    </div>
                </div>
                <div class="news__post">
                    <div class="news__image">
                        <?php echo  get_the_post_thumbnail()?>
                    </div>
                    <div class="news__info">
                        <div class="news__info__client msq-body__large"><?php echo $clientName?></div>
                        <h2 class="news__info__fact">“<?php echo $factsTitle ?>” </h2>
                    </div>
                </div>
        <?php

                wp_reset_postdata();
            endif;
        endif;
        ?>

    </div>
</section>
