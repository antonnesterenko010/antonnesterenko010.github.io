<?php
$game_title = the_title('', '', false);
$game_data = get_game_page_data(get_the_ID());
?>
<main>
    <section class="single-game">
        <div class="container">
            <div class="single-game-card">
                <div class="single-game-top">
                    <?php
                    echo !empty($game_data['provider']) ? '<div class="img-l"><img src="' . $game_data['provider'] . '" class="provider" alt=""/></div>' : '';
                    echo !empty($game_data['logo']) ? '<div class="img"><img src="' . $game_data['logo'] . '" alt="logo"></div>' : '';
                    ?>
                </div>
                <div class="single-game-content">
                    <div class="title">
                        <h3><?php echo $game_title ?></h3>
                    </div>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    <?php
                    if (!empty($game_data['game_link'])) { ?>
                        <div class="game">
                            <?php
                            echo !empty($game_data['bg']) ? '<img src="' . $game_data['bg'] . '" class="bg" alt="' . $game_title . '"/>' : '';
                            echo !empty($game_data['bg']) ? '<img src="' . $game_data['logo'] . '" class="logo" alt="' . $game_title . '"/>' : '';
                            ?>
                            <a class="play btn"
                               data-modal="#game-modal"><?php echo !empty($game_data['play_btn']) ? $game_data['play_btn'] : 'Play for Free' ?></a>
                        </div>
                    <?php } ?>
                </div>
                <?php
                if (!empty($game_data['game_link'])) {
                    if (!empty($game_data['img_disclaimer'])) {
                        echo '<div class="game-disclaimer"> ' . $game_data['img_disclaimer'] . '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
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
                        if (has_post_thumbnail($game->ID)) {
                            echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
                        }
                        echo '<div class="game-related-content">';
                        draw_rating_block($rating);
                        echo '<div class="title">' . $game->post_title . '</div>';
                        echo '</div></div></div>';
                    }
                    echo '</div>';
                } ?>
            </div>
        </div>
    </section>
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


