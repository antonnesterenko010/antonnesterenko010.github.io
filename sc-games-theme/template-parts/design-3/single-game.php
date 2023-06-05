<?php
$game_title = the_title('', '', false);
$game_data = get_game_page_data(get_the_ID());
?>
<main>
    <section class="single-game">
        <div class="container">
            <?php echo !empty($game_data['logo']) ? '<div class="img"><img src="' . $game_data['logo'] . '" alt="provider"></div>' : ''; ?>
            <div class="title">
                <h3><?php echo $game_title ?></h3>
            </div>
            <?php
            if (!empty($game_data['game_link'])) { ?>
                <div class="game">
                    <?php
                    echo !empty($game_data['bg']) ? '<img src="' . $game_data['bg'] . '" class="bg" alt="game_bg">' : '';
                    echo !empty($game_data['provider']) ? '<img src="' . $game_data['provider'] . '" class="provider" alt="provider">' : '';
                    echo !empty($game_data['logo']) ? '<img src="' . $game_data['logo'] . '" class="logo" alt="logo">' : '';
                    ?>
                    <a class="play btn" data-modal="#game-modal"><?= $game_data['play_btn'] ?></a>
                    <?php echo !empty($game_data['img_disclaimer']) ? '<div class="disclaimer"> ' . $game_data['img_disclaimer'] . '</div>' : ''; ?>
                </div>

            <?php } ?>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php if($game_data['show_related_posts']) { ?>
    <section class="related games">
        <div class="container">
            <div class="games-block">
                <div class="games-title"><span class="name"><?= $game_data['related_posts_title'] ?></span></div>
                <?php $games = get_posts(array(
                    'numberposts' => 3,
                    'post_type' => 'game',
                    'orderby' => 'rand',
                    'order' => 'DESC',
                    'exclude' => get_the_ID()
                ));
                if (!empty($games)) {
                    echo '<div class="games-card-list">';
                    foreach ($games as $key => $game) {
                        $rating = get_post_meta($game->ID, 'game_page__rating', true);
                        $percent = $rating * 10;
                        echo '<div class="game-card"><div class="game-card-wrapper bg' . $key . '">';
                        echo has_post_thumbnail($game->ID) ? '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>' : '';
                        echo '<div class="title">' . $game->post_title . '</div>';
                        draw_rating_block($rating);
                        echo '<a class="play-now-btn" href="' . get_permalink($game->ID) . '"><span class="name"> ' . $game_data['play_btn'] . ' </span></a>';
                        echo '</div></div>';
                    }
                    echo '</div>';
                } ?>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if (!empty($game_data['game_link'])) { ?>
        <div class="modal-overlay game-modal" id="game-modal"
             data-callback="gameModal"
             data-src="<?php echo $game_data['game_link'] ?>">
            <div class="modal-window">
                <div class="btns-wrapper">
                    <div class="modal-fullscreen"></div>
                    <div class="modal-close"></div>
                </div>
                <div class="modal-content"></div>
            </div>
        </div>
    <?php } ?>
</main>


