<?php
$game_link = get_post_meta(get_the_ID(), 'game_page__link', true);
?>
<section class="content__form game">
    <div class="container">
        <div class="content-block">
            <div class="content-title">
                <?php the_title(); ?>
            </div>
            <?php
            if (!empty($game_link)) {
                echo '<div class="game-content"><iframe src="' . $game_link . '"></iframe></div>';
            }
            ?>
        </div>
    </div>
</section>