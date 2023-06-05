<?php $index_data = get_index_page_data(); ?>
<section class="content">
    <div class="container">
        <div class="content-block">
            <div class="content-hero">
                <div class="content-text">
                    <?php
                    echo !empty($index_data['hero_title']) ? '<div class="content-title">' . $index_data['hero_title'] . '</div>' : '';
                    echo !empty($index_data['hero_description']) ? '<div class="content-description">' . $index_data['hero_description'] . '</div>' : '';
                    ?>
                </div>
                <img src="<?php echo get_template_directory_uri() ?>/assets/design-2/img/content-img.png" alt="777"
                     class="content-img">
            </div>
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
            <?php
            echo !empty($index_data['games_title']) ? '<div class="games-title"><div class="name">' . $index_data['games_title'] . '</div></div>' : '';
            echo !empty($index_data['games_description']) ? '<div class="games-description">' . $index_data['games_description'] . '</div>' : '';
            $games = get_posts(array(
                    'numberposts' => 8,
                    'post_type' => 'game',
                    'orderby' => 'date',
                    'order' => 'DESC',
                )
            );
            if (!empty($games)) {
                echo '<div class="games-card-list">';
                foreach ($games as $game) {
                    $rating = get_post_meta($game->ID, 'game_page__rating', true);
                    echo '<div class="game-card"><div class="game-card-wrapper">';
                    if (has_post_thumbnail($game->ID)) {
                        echo '<a href="' . get_permalink($game->ID) . '"  class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></a>';
                    }
                    echo '<div class="info-wrapper"><div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                    draw_rating_block($rating);
                    echo '</div><a class="card-button button" href="' . get_permalink($game->ID) . '">' . $index_data['play_btn'] . '</a>';
                    echo '</div></div></div>';
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
            <?php
            echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>' : '';
            echo !empty($index_data['newsletter_subtitle']) ? '<div class="newsletter-subtitle">' . $index_data['newsletter_subtitle'] . '</div>' : '';
            ?>
            <form action="#" class="newsletter-form">
                <div class="newsletter-input">
                    <input type="text"
                           placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                </div>
                <?php echo '<button type="submit" class="newsletter-button button">' . $index_data['newsletter_button_label'] . '</button>'; ?>
            </form>
        </div>
    </div>
</section>