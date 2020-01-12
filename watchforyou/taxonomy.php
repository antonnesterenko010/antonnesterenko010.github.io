<?php
get_header('taxonomy');
?>
  
          <p class="header_navigation">
            <a class="header_navigation" href="<?php 
            bloginfo('url');
            ?>"><?php
            bloginfo();
            ?></a>
            <a class="header_navigation"  href="">
              
                <?php 
                  $tax = $wp_query->get_queried_object();
                  echo ' | '. $tax->name . '';
                ?>
            </a>
          </p>
  <section class="section watch-section">
    <div class="container">
      <ul class="watch-list">
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php
                if(!get_field('watch_disabled')) :
      
              ?>
              <li class="watch-list__item">
              <a href="<?php
              the_permalink();
              ?>">
                <?php
                if(get_field('discount_item')){
                echo '<span class="watch-list__item__discount">Скидка -' . get_field('discount_item') . '%!</span>';
              }
                ?>
                <div class="watch-list__item__image">
                <?php
                the_post_thumbnail('post_preview');
                ?></div>
                <h2 class="watch-list__item__title"><?php
                the_title();
                ?></h2>
                <?php
                if(get_field('id_item')){
                echo '<p class="watch-list__item__id">ID: ' . get_field('id_item') . '</p>';
              }
                ?>
                
                <p class="watch-list__item__price"><?php
                the_field('price_item');
                ?> ГРН</p>
                <p class="watch-list__item__link">Смотреть описание</p>
              </a>
        </li>
        
              <?php
              endif;
              ?>
     
        
              <?php endwhile; else : ?>
                <p>Пока что таких часов нет.</p>
              <?php endif; ?>
      </ul>
    </div>
  </section>
  <?php
  get_footer();
  ?>