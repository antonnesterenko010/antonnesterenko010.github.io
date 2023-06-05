<?php
$prefix = 'sc_games_';
$options = get_option($prefix . 'options');
$fp_content_title = isset($options[$prefix . 'fp_content_title']) && !empty($options[$prefix . 'fp_content_title']) ? $options[$prefix . 'fp_content_title'] : '';
$fp_content_subtitle = isset($options[$prefix . 'fp_content_subtitle']) && !empty($options[$prefix . 'fp_content_subtitle']) ? $options[$prefix . 'fp_content_subtitle'] : '';
$fp_content_blocks = isset($options[$prefix . 'fp_content_blocks']) && !empty($options[$prefix . 'fp_content_blocks']) ? $options[$prefix . 'fp_content_blocks'] : '';
$fp_games_title = isset($options[$prefix . 'fp_games_title']) && !empty($options[$prefix . 'fp_games_title']) ? $options[$prefix . 'fp_games_title'] : '';
?>
<section class="content">
    <div class="container">
        <div class="content-block">
            <?php
            if (!empty($fp_content_title)) {
                echo '<div class="content-title">' . $fp_content_title . '</div>';
            }
            if (!empty($fp_content_subtitle)) {
                echo '<div class="content-subtitle">' . $fp_content_subtitle . '</div>';
            }
            ?>
            <div class="gamer">
                <?php echo get_d_asset_img('gamer.svg'); ?>
            </div>
            <?php
            if (!empty($fp_content_blocks)) {
                echo '<div class="content-list">';
                foreach ($fp_content_blocks as $fp_content_block) {
                    echo '<div class="content-list-item">';
                    echo '<div class="item-wrapper">';
                    echo '<div class="icon"><img src="' . $fp_content_block['image'] . '" alt="sword"></div>';
                    echo '<div class="title">' . $fp_content_block['title'] . '</div>';
                    echo '<div class="subtitle">' . $fp_content_block['content'] . '</div>';
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
            <div class="games-title">
                <div class="decor-left">
                    <?php echo get_d_asset_img('stars_l.svg'); ?>
                </div>
                <?php
                echo !empty($fp_games_title) ? '<div class="name">' . $fp_games_title . '</div>' : '';
                ?>
                <div class="decor-right">
                    <?php echo get_d_asset_img('stars_r.svg'); ?>
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
                echo '<div class="games-card-list">';
                foreach ($games as $game) {
                    $rating = get_post_meta($game->ID, 'game_page__rating', true);
                    echo '<div class="game-card"><div class="game-card-wrapper">';
                    if (has_post_thumbnail($game->ID)) {
                        echo '<div class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></div>';
                    }
                    echo '<div class="title">' . $game->post_title . '</div>';
                    draw_rating_block($rating);
                    echo '<a class="play-now-btn" href="' . get_permalink($game->ID) . '"><span class="name">Play Now</span></a>';
                    echo '</div></div>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>