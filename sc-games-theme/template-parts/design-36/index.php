<?php

$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$index_data = get_index_page_data();
$reg_link = isset($options[$prefix . 'reg_link']) && !empty($options[$prefix . 'reg_link']) ? $options[$prefix . 'reg_link'] : '';
$reg_label = isset($options[$prefix . 'reg_label']) && !empty($options[$prefix . 'reg_label']) ? $options[$prefix . 'reg_label'] : 'Registration';
$contact_label = isset($options[$prefix . 'contact_label']) && !empty($options[$prefix . 'contact_label']) ? $options[$prefix . 'contact_label'] : 'Contact us';
$play_btn = isset($options['sc_games_pln_btn']) && !empty($options['sc_games_pln_btn']) ? $options['sc_games_pln_btn'] : 'Play Now';
$announcement_text = isset($options[$prefix . 'announcement_text']) && !empty($options[$prefix . 'announcement_text']) ? $options[$prefix . 'announcement_text'] : '';

?>
<div class="bg-wrapper">
    <section class="hero">
        <div class="container">
            <div class="hero-block">
                <div class="hero-title-wrapper">
                    <?php
                    echo !empty($index_data['hero_title']) ? '<div class="hero-title">' . $index_data['hero_title'] . '</div>' : '';
                    ?>
                    <div class="hero-button-wrapper">
                        <?php
                        if (!empty($reg_link) && !empty($reg_label)) {
                            echo '<div class="header-button hero-reg-button"><a href="' . $reg_link . '" class="main-button">' . $reg_label . '</a></div>';
                        }
                        ?>
                    </div>
                </div>

                <?php
                echo !empty($index_data['hero_description']) ? '<div class="hero-description">' . $index_data['hero_description'] . '</div>' : '';
                ?>
                <div class="announcement-bar"><?= $announcement_text ?></div>
            </div>
        </div>
    </section>

    <section class="games" id="games-section">
        <div class="container">
            <div class="games-block">
                <?php
                $games = get_posts(
                    array(
                        'numberposts' => 9,
                        'post_type' => 'game',
                        'orderby' => 'date',
                        'order' => 'DESC',
                    )
                );
                if (!empty($games)) {
                    echo '<div class="games-slider"><div class="games-card-list">';
                    foreach ($games as $game) {
                        $game_data = get_game_page_data($game->ID);
                        $rating = get_post_meta($game->ID, 'game_page__rating', true);
                        echo '<div class="game-card">';
                        if (has_post_thumbnail($game->ID)) {
                            echo '<a href="' . get_permalink($game->ID) . '" class="game-card-wrapper"><div  class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></div>';
                        }
                        echo '<div class="info-wrapper">';
                        echo '<div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                        draw_rating_block($rating);
                        echo '<div class="button-wrapper"><div class="card-button main-button">' . $game_data['play_btn'] . '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div></a></div>';
                    }
                    echo '</div></div>';
                }
                ?>

                <button class="main-button more-games">Load More</button>

                <div class="games-title-wrapper">
                    <div class="games-title">
                        <?php
                        echo !empty($index_data['games_title']) ? '<div class="title main-title-big">' . $index_data['games_title'] . '</div>' : '';
                        echo !empty($index_data['games_description']) ? '<div class="description main-title-medium">' . $index_data['games_description'] . '</div>' : '';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="content">
    <div class="container">
        <div class="content-block">
            <?php
            echo !empty($index_data['htp_title']) ? '<div class="content-title main-title-big">' . $index_data['htp_title'] . '</div>' : '';
            echo !empty($index_data['htp_description']) ? '<div class="content-description main-title-medium">' . $index_data['htp_description'] . '</div>' : '';
            if (!empty($index_data['htp_blocks'])) {
                echo '<div class="content-list">';
                foreach ($index_data['htp_blocks'] as $fp_htp_block) {
                    echo '<div class="content-list-item">';
                    echo '<div class="content-list-item-wrapper">';
                    echo '<div class="item-wrapper">';
                    echo '<div class="icon"></div>';
                    echo '<div class="title-wrapper"><div class="title">' . $fp_htp_block['title'] . '</div>';
                    echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div></div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>