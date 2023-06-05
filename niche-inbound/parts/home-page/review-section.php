<?php

$section_title = get_post_meta( get_the_ID(), 'review_title', true );
$entries = get_post_meta( get_the_ID(), 'review_list', true );

$promo_title = get_post_meta( get_the_ID(), 'promo_title', true );
$promo_subtitle = get_post_meta( get_the_ID(), 'promo_subtitle', true );
$promo_link = get_post_meta( get_the_ID(), 'promo_link', true );
$promo_btn_name = get_post_meta( get_the_ID(), 'promo_btn_name', true );
?>
<section class="review" id="reviews">
    <div class="container">
        <div class="review-title heading-1 heading">
            <?php echo $section_title?>
        </div>
        <div class="review-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['review_item_image'])?$entry['review_item_image']:"";
            $name = isset($entry['review_item_name'])?$entry['review_item_name']:"";
            $position = isset($entry['review_item_position'])?$entry['review_item_position']:"";
            $rating = isset($entry['review_item_rating'])?$entry['review_item_rating']:"";
            $quote = isset($entry['review_item_quote'])?$entry['review_item_quote']:"";
            ?>
            <div class="review-item">
                <div class="reviewer-wrapper">
                    <div class="reviewer-l">
                        <div class="image">
                            <img src="<?php echo $image ?>" alt="<?php echo $name ?>">
                        </div>
                    </div>
                    <div class="reviewer-r">
                        <div class="title-wrapper">
                            <div class="name"><?php echo $name ?></div>
                            <div class="position"><?php echo $position ?></div>
                        </div>
                        <div class="rating">
                            <div class="rating-inner" style="width: <?php echo $rating ?>%;">
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-full.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-full.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-full.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-full.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-full.svg" alt="star">
                                </div>
                            </div>
                            <div class="rating-outer">
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-empty.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-empty.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-empty.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-empty.svg" alt="star">
                                </div>
                                <div class="star">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/'?>img/star-empty.svg" alt="star">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="reviewer-quote">
                    <?php echo $quote ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="promo-block" id="blog">
            <div class="title-wrapper">
                <div class="promo-title heading-2 heading">
                    <?php echo $promo_title?>
                </div>
                <div class="promo-subtitle heading-4">
                    <?php echo $promo_subtitle?>
                </div>
            </div>
            <a href="<?php echo $promo_link ?>" class="promo-btn button">
                <span><?php echo $promo_btn_name ?></span>
            </a>
        </div>
    </div>
</section>