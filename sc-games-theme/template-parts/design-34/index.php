<?php
$index_data = get_index_page_data();
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$footer_col1 = isset($options[$prefix . 'footer_col_1']) && !empty($options[$prefix . 'footer_col_1']) ? $options[$prefix . 'footer_col_1'] : '';
$footer_col2 = isset($options[$prefix . 'footer_col_2']) && !empty($options[$prefix . 'footer_col_2']) ? $options[$prefix . 'footer_col_2'] : '';
$footer_col3 = isset($options[$prefix . 'footer_col_3']) && !empty($options[$prefix . 'footer_col_3']) ? $options[$prefix . 'footer_col_3'] : '';
$play_btn = isset($options['sc_games_pln_btn']) && !empty($options['sc_games_pln_btn']) ? $options['sc_games_pln_btn'] : 'Play';
?>

<main>
    <section class="content content-hero">
        <div class="container">
            <div class="content-block">
                <div class="wrapper content-hero-row">
                    <div class="content-hero-image">
                        <img src="<?php echo get_template_directory_uri() . '/assets/design-34/img/hero-image.png'?>" alt="">
                    </div>
                    <div class="content-hero-title-wrapper">
                        <?php
                        if (!empty($index_data['hero_title'])) {
                            echo '<h3 class="title hero">' . $index_data['hero_title'] . '</h3>';
                        }
                        if (!empty($index_data['hero_description'])) {
                            echo '<div class="subtitle hero">' . $index_data['hero_description'] . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content section how-it-works-content">
        <div class="container">
            <div class="content-block">
                <?php
                echo !empty($index_data['htp_title']) ? '<h2 class="title">' . $index_data['htp_title'] . '</h2>' : '';
                echo !empty($index_data['htp_description']) ? '<div class="subtitle ">' . $index_data['htp_description'] . '</div>' : '';

                if (!empty($index_data['htp_blocks'])) {
                    echo '<div class="content-list">';
                    foreach ($index_data['htp_blocks'] as $key => $fp_htp_block) {
                        echo '<div class="content-list-item">';
                        echo '<div class="item-wrapper">';
                        echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt=""/></div>';
                        echo '<div class="title">' . $fp_htp_block['title'] . '</div>';
                        echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div>';
                        echo '</div>';
                        echo '<div class="content-list-decor"></div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <section class="games section">
        <div class="container">
            <div class="games-block">
                <?php if (!empty($index_data['games_title'])) { ?>
                    <h3 class="title">
                        <?php echo $index_data['games_title'] ?>
                    </h3>
                <?php } ?>
                <?php if (!empty($index_data['games_description'])) { ?>
                    <div class="subtitle">
                        <?php echo $index_data['games_description'] ?>
                    </div>
                <?php } ?>

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
                    echo '<div class="games-card-list">';
                    foreach ($games as $key => $game) {
                        $rating = get_post_meta($game->ID, 'game_page__rating', true);
                        $percent = $rating * 10;
                        echo '<div class="game-card">';
                        echo '<div class="game-card-wrapper">';
                        if (has_post_thumbnail($game->ID)) {
                            echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
                        }
                        echo '<div class="inner-wrapper">';
                        echo '<div class="title" title="' . $game->post_title . '">' . $game->post_title . '</div>';
                        draw_rating_block($rating);
                        echo '<a class="main-button" href="'. get_permalink($game->ID) .'" >' . $play_btn . '</a>';
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
    <section class="newsletter section">
        <div class="container">
            <div class="newsletter-block">
                <div class="newsletter-block-wrapper">
                    <div class="newsletter-content">
                        <div class="newsletter-title-wrapper">
                            <?php
                            echo !empty($index_data['newsletter_title']) ? '<div class="newsletter-title">' . $index_data['newsletter_title'] . '</div>' : '';
                            echo !empty($index_data['newsletter_subtitle']) ? '<div class="newsletter-subtitle">' . $index_data['newsletter_subtitle'] . '</div>' : '';
                            ?>
                        </div>
                        <form action="#" class="newsletter-form">
                            <div class="newsletter-input">
                                <input class="input" type="text"
                                       placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
                            </div>
                            <?php echo '<button type="submit" class="newsletter-button main-button">' . $index_data['newsletter_button_label'] . '</button>'; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>