<?php

$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$index_data = get_index_page_data();
$play_btn = isset($options['sc_games_pln_btn']) && !empty($options['sc_games_pln_btn']) ? $options['sc_games_pln_btn'] : 'Play Now';
$reg_link = isset($options[$prefix . 'reg_link']) && !empty($options[$prefix . 'reg_link']) ? $options[$prefix . 'reg_link'] : '';
$reg_label = isset($options[$prefix . 'reg_label']) && !empty($options[$prefix . 'reg_label']) ? $options[$prefix . 'reg_label'] : 'Registration';

?>
<section class="games">
    <div class="container">
        <div class="games-block">
            <div class="games-title-wrapper">
                <div class="games-title">
                    <?php
                    echo !empty($index_data['games_title']) ? '<div class="title main-title-big">' . $index_data['games_title'] . '</div>' : '';
                    echo !empty($index_data['games_description']) ? '<div class="description main-title-medium">' . $index_data['games_description'] . '</div>' : '';
                    ?>
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
                echo '<div class="games-slider swiper gameSwiper2"><div class="games-card-list swiper-wrapper">';
                foreach ($games as $game) {

                    $rating = get_post_meta($game->ID, 'game_page__rating', true);
                    echo '<div class="game-card swiper-slide"><div class="game-card-wrapper">';
                    if (has_post_thumbnail($game->ID)) {
                        echo '<a href="' . get_permalink($game->ID) . '" class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></a>';
                    }
                    echo '<div class="info-wrapper"><div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                    echo '<a class="card-button desktop main-button" href="' . get_permalink($game->ID) . '">' . $play_btn . '</a>';
                    echo '</div>';
                    echo '<a class="card-button mobile main-button" href="' . get_permalink($game->ID) . '">' . $play_btn . '</a>';
                    echo '<div class="rating-wrapper">';
                    draw_rating_block($rating);
                    echo '</div></div></div>';
                    echo '<div class="game-buttons-wrapper"><div class="game-button-prev"><img src="'. get_template_directory_uri() .'/assets/design-29/img/arrow-left.svg" alt="prev-arrow"></div><div class="game-button-next"><img src="'. get_template_directory_uri() .'/assets/design-29/img/arrow-right.svg" alt="next-arrow"></div></div>';
                    echo '</div>';
                }
                echo '</div></div>';
                echo '<div class="games-slider swiper gameSwiper"><div class="games-card-list swiper-wrapper">';
                foreach ($games as $game) {
                    echo '<div class="game-card swiper-slide"><div class="game-card-wrapper">';
                    if (has_post_thumbnail($game->ID)) {
                        echo '<div class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></div>';
                    }
                    echo '<div class="info-wrapper">';
                    echo '</div></div></div>';
                }
                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>

<section class="hero">
    <div class="container">
        <div class="hero-block">
            <div class="hero-title-wrapper">
                <?php
                echo !empty($index_data['hero_title']) ? '<div class="hero-title main-title-big">' . $index_data['hero_title'] . '</div>' : '';
                echo !empty($index_data['hero_description']) ? '<div class="hero-description">' . $index_data['hero_description'] . '</div>' : '';

                if (!empty($reg_link) && !empty($reg_label)) {
                    echo '<div class="hero-button"><a href="' . $reg_link . '" class="main-button">';
                    echo '' . $reg_label . '</a></div>';
                }
                ?>
            </div>
            <div class="hero-image-wrapper">
                <img src="<?php echo get_template_directory_uri() . '/assets/design-29/img/hero-image.png' ?>"
                     alt="hero-image">
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="content-block">
            <?php
            echo !empty($index_data['htp_title']) ? '<div class="content-title"><h2 class="main-title-big">' . $index_data['htp_title'] . '</h2></div>' : '';
            echo !empty($index_data['htp_description']) ? '<div class="content-description main-title-medium">' . $index_data['htp_description'] . '</div>' : '';
            if (!empty($index_data['htp_blocks'])) {
                echo '<div class="content-list">';
                foreach ($index_data['htp_blocks'] as $fp_htp_block) {
                    echo '<div class="content-list-item">';
                    echo '<div class="item-wrapper">';
                    echo '<div class="icon"></div>';
                    echo '<div class="title-wrapper"><div class="title">' . $fp_htp_block['title'] . '</div>';
                    echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div></div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<section class="newsletter">
    <div class="container">
        <div class="newsletter-block">
            <div class="newsletter-block-wrapper">
                <div class="newsletter-content">
                    <?php
                    echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title main-title-big">' . $index_data['newsletter_title'] . '</div>' : '';
                    echo !empty($index_data['newsletter_subtitle']) ? '<div class="newsletter-subtitle main-title-medium">' . $index_data['newsletter_subtitle'] . '</div>' : '';
                    ?>
                    <form action="#" class="newsletter-form">
                        <div class="newsletter-input">
                            <input type="text"
                                   placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                        </div>
                        <?php echo '<button type="submit" class="newsletter-button main-button">' . $index_data['newsletter_button_label'] . '</button>'; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>