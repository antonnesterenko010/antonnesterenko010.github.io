<?php
$index_data = get_index_page_data();
?>
<main>
    <section class="content-section">
        <div class="container">
            <div class="content-block">
                <?php
                echo '<div class="content-header">';
                    if (!empty($index_data['hero_title'])) {
                        echo '<h2 class="title">' . $index_data['hero_title'] . '</h2>';
                    }
                    if (!empty($index_data['hero_description'])) {
                        echo '<div class="subtitle">' . $index_data['hero_description'] . '</div>';
                    }
                echo '</div>';
                if (!empty($index_data['htp_blocks'])) {
                    echo '<div class="content-list">';
                    foreach ($index_data['htp_blocks'] as $key => $fp_htp_block) {
                        echo '<div class="content-list-item">';
                        echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt="sword"></div>';
                        echo '<div class="item-wrapper-txt"><div class="title">' . $fp_htp_block['title'] . '</div>';
                        echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div></div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                echo '<div class="content-description">';
                echo !empty($index_data['htp_title']) ? '<h3 class="title">' . $index_data['htp_title'] . '</h3>' : '';
                echo !empty($index_data['htp_description']) ? '<div class="subtitle">' . $index_data['htp_description'] . '</div>' : '';
                echo '</div>';
                ?>
            </div>
        </div>
    </section>
    <section class="games">
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
                        'numberposts' => 8,
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
                        echo '<div class="game-card game' . $key . '">';
                        echo '<div class="game-card-wrapper">';
                        if (has_post_thumbnail($game->ID)) {
                            echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
                        }
                        echo '<div class="wrapper">';
                        echo '<div class="card-title">' . $game->post_title . '</div>';
                        draw_rating_block($rating);
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
</main>