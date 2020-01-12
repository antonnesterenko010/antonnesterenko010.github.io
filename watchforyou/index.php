<?php
get_header();
?>
<main class="main">
  <section class="greetings-section section">
    <div class="container">
      <?php wp_nav_menu( [
          'theme_location'  => 'index-mainmenu',
          'container' => false,
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          'menu_class'      => 'greetings-menu',
          'walker' => new My_First_Walker(),
        ] ); ?>
      
    </div>
  </section>
  <!-- /.greetings-section section -->
  <section class="section bestseller-section">
      <h2 class="bestseller-title main-title">Хиты продаж</h2>
      <ul class="bestseller-slider">
        <?php
        // параметры по умолчанию
          $bestseller = get_posts( array(
            'numberposts' => 0,
            'order'       => 'ASC',
            'post_type'   => 'watch-page',
            'meta_query' => [
              'bestseller' => [
                'key' => 'item_is_bestseller',
                'value' => true,
                'compare' => 'EXISTS'
              ]
            ],
          ) );
          foreach( $bestseller as $post ){
            setup_postdata($post);
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
          }

          wp_reset_postdata(); // сброс
        ?>
      </ul>
      
          
  </section>
  <!-- /.section bestseller-section -->
  <section class="offer-section section">
    <h2 class="offer-title main-title">Акции и предложения</h2>
    <?php wp_nav_menu( [
                'theme_location'  => 'offer-slidermenu',
                'container' => false,
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'menu_class'      => 'offer-slider',
                'walker' => new Offer_Slider_Walker(),
        ] ); ?>
              
  </section>
  <!-- offer-section -->
  <section class="form-section section">
    <h2 class="form-title main-title">Заявка обратной связи</h2>
    <div class="container">
      <form action="mail.php" id="main-form" method="POST" class="main-form form">
          <input type="text"  name="user_name" class="main-form__input form__input" placeholder="Ваше имя">
          <input type="tel" name="user_tel"  class="form__input__tel main-form__input form__input" placeholder="Номер вашего телефона">
          <input type="email" name="user_email"  class="main-form__input form__input" placeholder="Электронная почта">
          <input type="text" name="user_text"  class="main-form__input form__input" placeholder="Введите ваше сообщение">
        <button type="submit" class="button main-form__button form__button">Отправить</button>
      </form>
    </div>
  </section>
  <!-- /.form-section section -->
</main>

<?php
get_footer();
?>