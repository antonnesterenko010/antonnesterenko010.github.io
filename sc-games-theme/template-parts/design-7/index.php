<?php $index_data = get_index_page_data(); ?>
<section class="hero">
    <div class="container">
        <div class="hero-block">
            <div class="hero-title-wrapper">
                <?php
                echo !empty($index_data['hero_title']) ? '<div class="hero-title">' . $index_data['hero_title'] . '</div>' : '';
                echo !empty($index_data['hero_description']) ? '<div class="hero-description">' . $index_data['hero_description'] . '</div>' : '';
                echo !empty($index_data['hero_button_link']) && !empty($index_data['hero_button_label']) ? '<a href="'.$index_data['hero_button_link'].'" class="button"><span>' . $index_data['hero_button_label'] . '</span></a>' : '';
                ?>
            </div>
            <div class="hero-image-wrapper">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-7/img/hero-image.png' ?>"
                     alt="hero-image">
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="content-block">
            <?php
            echo !empty($index_data['htp_title']) ? '<div class="content-title"><h2>' . $index_data['htp_title'] . '</h2></div>' : '';
            echo !empty($index_data['htp_description']) ? '<div class="content-description">' . $index_data['htp_description'] . '</div>' : '';
            if (!empty($index_data['htp_blocks'])) {
                echo '<div class="content-list">';
                foreach ($index_data['htp_blocks'] as $fp_htp_block) {
                    echo '<div class="content-list-item">';
                    echo '<div class="item-wrapper">';
                    echo '<img class="icon" src="' . $fp_htp_block['image'] . '" alt="image">';
                    echo '<div class="title">' . $fp_htp_block['title'] . '</div>';
                    echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
<section class="games">
    <div class="container">
        <div class="games-block">
            <div class="games-title-wrapper">
                <div class="games-title">
                    <?php
                    echo !empty($index_data['games_title']) ? '<div class="title">' . $index_data['games_title'] . '</div>' : '';
                    echo !empty($index_data['games_description']) ? '<div class="description">' . $index_data['games_description'] . '</div>' : '';
                    ?>
                </div>
                <div class="slider-navigation">
                    <div class="slider-button-prev">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-7/img/next-btn.svg' ?>"
                             alt="prev-slide">
                    </div>
                    <span class="slice"></span>
                    <div class="slider-button-next">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-7/img/next-btn.svg' ?>"
                             alt="next-slide">
                    </div>
                </div>
            </div>
            <?php $games = get_posts(array(
                'numberposts' => 8,
                'post_type' => 'game',
                'orderby' => 'date',
                'order' => 'DESC',
            ));
            if (!empty($games)) {
                echo '<div class="games-slider gameSwiper" id="gameSwiper"><div class="games-card-list swiper-wrapper">';
                foreach ($games as $game) {
                    $rating = get_post_meta($game->ID, 'game_page__rating', true);
                    $game_logo = get_post_meta($game->ID, 'game_page__logo', true);
                    echo '<a href="'.get_permalink($game->ID).'"  class="game-card swiper-slide"><div class="game-card-wrapper">';
                    echo has_post_thumbnail($game->ID) ? '<img class="game-card-image" src="'.get_the_post_thumbnail_url($game->ID).'" alt="image">' : '';
                    echo '<div class="game-card-bottom">';
                    echo !empty($game_logo) ? '<div class="game-card-icon"><img src="'.$game_logo.'" alt="image"></div>' : '';
                    echo '<div class="game-card-info">';
                    draw_rating_block($rating);
                    echo '<span class="game-card-title">'.$game->post_title.'</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div><div class="swiper-pagination"></div></a>';
                }
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>
<section class="newsletter">
    <div class="container">
        <div class="newsletter-block">
            <div class="newsletter-decor">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-7/img/' ?>newsletter-decor.png"
                     alt="newsletter-decor">
            </div>
            <form action="#" class="newsletter-form">
                <?php
                echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>' : '';
                ?>
                <div class="newsletter-input">
                    <input type="text"
                           placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                </div>
                <?php echo '<button type="submit" class="newsletter-button button"><span>' . $index_data['newsletter_button_label'] . '</span></button>'; ?>
            </form>
        </div>
    </div>
</section>