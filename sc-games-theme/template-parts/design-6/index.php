<?php $index_data = get_index_page_data(); ?>
<section class="hero">
    <div class="container">
        <div class="hero-block">
            <div class="hero-title-wrapper">
                <?php
                echo !empty($index_data['hero_title']) ? '<div class="hero-title main-title-big">' . $index_data['hero_title'] . '</div>' : '';
                echo !empty($index_data['hero_description']) ? '<div class="hero-description main-description-medium">' . $index_data['hero_description'] . '</div>' : '';
                ?>
            </div>
            <?php
            echo !empty($index_data['hero_button_link']) && !empty($index_data['hero_button_label']) ? '<a href="'.$index_data['hero_button_link'].'" class="button btn-hero"><span class="name">' . $index_data['hero_button_label'] . '</span></a>' : '';
            ?>
        </div>

        <div class="how-to-play">
            <?php
            echo !empty($index_data['htp_title']) ? '<div class="content-title main-title-medium">' . $index_data['htp_title'] . '</div>' : '';
            echo !empty($index_data['htp_description']) ? '<div class="content-description main-description-medium">' . $index_data['htp_description'] . '</div>' : '';
            ?>
        </div>
    </div>
</section>
<div class="wrapper-bg">
    <section class="content">
        <div class="container">
            <div class="content-block">
                <?php
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
                echo !empty($index_data['games_description']) ? '<div class="games-description main-description-medium">' . $index_data['games_description'] . '</div>' : '';
                $games = get_posts(
                    array(
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
                        $game_logo = get_post_meta($game->ID, 'game_page__logo', true);
                        echo '<div class="game-card"><div class="game-card-wrapper">';
                        echo has_post_thumbnail($game->ID) ? '<a href="' . get_permalink($game->ID) . '" class="image-wrapper"><div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div></a>' : '';
                        echo '<div class="info-wrapper"><div class="title-wrapper"><div class="title">' . $game->post_title . '</div>';
                        draw_rating_block($rating);
                        echo '</div>';
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
                <div class="newsletter-decor newsletter-decor-left">
                    <img src="<?php echo get_template_directory_uri() . '/assets/design-6/img/' ?>newsletter-left.png"
                         alt="newsletter-decor">
                </div>
                <div class="newsletter-decor newsletter-decor-right">
                    <img src="<?php echo get_template_directory_uri() . '/assets/design-6/img/' ?>newsletter-right.png"
                         alt="newsletter-decor">
                </div>
                <?php
                echo '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>';
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
</div>