<?php $index_data = get_index_page_data(); ?>
<section class="hero">
    <div class="container">
        <div class="hero-block">
            <div class="hero-title-wrapper">
                <?php
                echo !empty($index_data['hero_title']) ? '<div class="hero-title">' . $index_data['hero_title'] . '</div>' : '';
                echo !empty($index_data['hero_description']) ? '<div class="hero-description">' . $index_data['hero_description'] . '</div>' : '';
                ?>
            </div>
            <div class="hero-image-wrapper">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-4/img/hero-image.png' ?>"
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
                    echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt="sword"></div>';
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
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-4/img/next-btn.svg' ?>"
                             alt="prev-slide">
                    </div>
                    <div class="slider-button-next">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-4/img/next-btn.svg' ?>"
                             alt="next-slide">
                    </div>
                </div>
            </div>
            <?php
            $games = get_posts(
                array(
                    'numberposts' => 8,
                    'post_type' => 'game',
                    'orderby' => 'date',
                    'order' => 'DESC',
                )
            );
            if (!empty($games)) {
                echo '<div class="games-slider gameSwiper"><div class="games-card-list swiper-wrapper">';
                foreach ($games as $game) {
                    $rating = get_post_meta($game->ID, 'game_page__rating', true);
                    echo '<div class="game-card swiper-slide"><div class="game-card-wrapper">';
                    if (has_post_thumbnail($game->ID)) {
                        echo '<a href="' . get_permalink($game->ID) . '" class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></a>';
                    }
                    echo '<div class="info-wrapper"><div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                    draw_rating_block($rating);
                    echo '</div><a class="card-button button" href="' . get_permalink($game->ID) . '"><span class="name">' . $index_data['play_btn'] . '</span></a>';
                    echo '</div></div></div>';
                }
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>