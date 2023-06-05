<?php $index_data = get_index_page_data(); ?>
<main>
  <section class="content hero">
    <div class="container">
      <div class="content-block">
        <div class="wrapper">
          <div>
            <?php
            if (!empty($index_data['hero_title'])) {
              echo '<div class="content-title">' . $index_data['hero_title'] . '</div>';
            }
            if (!empty($index_data['hero_description'])) {
              echo '<div class="content-subtitle">' . $index_data['hero_description'] . '</div>';
            }
            ?>
          </div>
          <img src="<?php echo get_template_directory_uri() . '/assets/design-3/img/slot.png' ?>" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="games">
    <div class="container">
      <div class="games-block">
        <?php if (!empty($index_data['games_title'])) { ?>
          <div class="games-title">
            <div class="name"><?php echo $index_data['games_title'] ?></div>
          </div>
        <?php } ?>
        <?php if (!empty($index_data['games_description'])) { ?>
          <div class="games-description">
            <div class="name"><?php echo $index_data['games_description'] ?></div>
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
            echo '<div class="game-card">';
            echo '<div class="game-card-wrapper bg' . $key . '">';
            if (has_post_thumbnail($game->ID)) {
              echo '<a href="' . get_permalink($game->ID) . '" class="image"><img src="' . get_the_post_thumbnail_url($game->ID) . '" alt="game-image"></a>';
            }
            echo '<div class="title">' . $game->post_title . '</div>';
            draw_rating_block($rating);
            echo '<a class="play-now-btn" href="' . get_permalink($game->ID) . '"><span class="name"> ' . $index_data['play_btn'] . ' </span></a>';
            echo '</div>';
            echo '</div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container">
      <div class="content-block">
        <?php
        echo !empty($index_data['htp_title']) ? '<h3 class="content-title">' . $index_data['htp_title'] . '</h3>' : '';
        echo !empty($index_data['htp_description']) ? '<div class="content-subtitle">' . $index_data['htp_description'] . '</div>' : '';
        if (!empty($index_data['htp_blocks'])) {
          echo '<div class="content-list">';
          foreach ($index_data['htp_blocks'] as $key => $fp_htp_block) {
            echo '<div class="content-list-item">';
            echo '<div class="item-wrapper bg' . $key . '">';
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
  <section class="">
    <div class="container">
      <div class="subscribe">
        <div class="wrapper">
            <?php echo !empty($index_data['newsletter_title']) ? '<h3>' . $index_data['newsletter_title'] . '</h3>' : ''; ?>
          <form action="#">
            <input type="text" name="email" placeholder="<?php echo !empty($index_data['newsletter_placeholder']) ? $index_data['newsletter_placeholder'] : ''; ?>">
            <button type="submit"><?= $index_data['newsletter_button_label']; ?></button>
          </form>
        </div>
        <div class="img">
          <img src="<?php echo get_template_directory_uri() . '/assets/design-3/img/bags.png' ?>" alt="bags">
        </div>
      </div>
    </div>
  </section>
</main>