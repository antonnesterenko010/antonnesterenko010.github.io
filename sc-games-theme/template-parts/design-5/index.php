<?php
$index_data = get_index_page_data();
?>

<main>
  <section class="content">
    <div class="container">
      <div class="content-block">
        <div class="wrapper">
          <?php
          if (!empty($index_data['hero_title'])) {
            echo '<h3 class="title">' . $index_data['hero_title'] . '</h3>';
          }
          if (!empty($index_data['hero_description'])) {
            echo '<div class="subtitle">' . $index_data['hero_description'] . '</div>';
          }
          ?>
        </div>
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
            if (has_post_thumbnail($game->ID)) {
              echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
            }
            echo '<div class="wrapper">';
            draw_rating_block($rating);
            echo '<div class="title">' . $game->post_title . '</div>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>
  <section class="content how-it-works-content">
    <div class="container">
      <div class="content-block">
        <?php
        echo '<div class="wrapper">';
        echo !empty($index_data['htp_title']) ? '<h3 class="title min-small">' . $index_data['htp_title'] . '</h3>' : '';
        echo !empty($index_data['htp_description']) ? '<div class="subtitle min-small">' . $index_data['htp_description'] . '</div>' : '';
        echo '</div>';
        if (!empty($index_data['htp_blocks'])) {
          echo '<div class="content-list">';
          foreach ($index_data['htp_blocks'] as $key => $fp_htp_block) {
            echo '<div class="content-list-item">';
            echo '<div class="item-wrapper">';
            echo '<div class="item-wrapper-txt"><div class="title">' . $fp_htp_block['title'] . '</div>';
            echo '<div class="subtitle">' . $fp_htp_block['content'] . '</div></div>';
            echo '<div class="icon"><img src="' . $fp_htp_block['image'] . '" alt="sword"></div>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>
</main>