<?php
/* 
Template name: Страница товара
Template Post Type: watch-page, page
*/
?>
<?php
get_header('taxonomy');
?>
<p class="header_navigation">
            <a  href="<?php 
            bloginfo('url');
            ?>"><?php
            bloginfo();
            ?></a>
            <a  href="">
              
                <?php 
                the_terms( get_the_ID(), 'category_tax' , ' | ', ' & ', ' | ' );
                ?>
            </a>
            <a href=""><?php
            the_title();
            ?></a>
          </p>
<section class="product-section section">
    <div class="container">
      <div class="product-block">
        <div class="product-arrows">
          <button class="product-arrows-left"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/offer/arrows-left.svg" alt="Влево"></button>
          <div class="product-sliders">
            <div class="product-slider-main">
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image')){
                echo '<img src="'.get_field('slider_image',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
              
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image_2')){
                echo '<img src="'.get_field('slider_image_2',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
              
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image_3')){
                echo '<img src="'.get_field('slider_image_3',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image_4')){
                echo '<img src="'.get_field('slider_image_4',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image_5')){
                echo '<img src="'.get_field('slider_image_5',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image_6')){
                echo '<img src="'.get_field('slider_image_6',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
              <div class="product-slider-main__item"><?php
              if(get_field('slider_image_7')){
                echo '<img src="'.get_field('slider_image_7',$item->ID).'" alt="Фото часов">';
              }
              ?></div>
            </div>
            <div class="product-slider">
               <?php
              if(get_field('slider_image')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
              
              <?php
              if(get_field('slider_image_2')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image_2',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
              
              <?php
              if(get_field('slider_image_3')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image_3',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
              <?php
              if(get_field('slider_image_4')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image_4',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
              <?php
              if(get_field('slider_image_5')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image_5',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
              <?php
              if(get_field('slider_image_6')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image_6',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
              <?php
              if(get_field('slider_image_7')){
                echo '<div class="product-slider__item"><img src="'.get_field('slider_image_7',$item->ID).'" alt="Фото часов"></div>';
              }
              ?>
            </div>
          </div>
          <button class="product-arrows-right"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/offer/arrows-right.svg" alt="Вправо"></button>
        </div>
        <div class="product-info">
          <h1 class="product-title"><?php
          the_title();
          ?></h1>
          <p class="product-id">Код товара: <?php
          the_field('id_item');
          ?></p>
          <!-- <p class="product-id">Категория: <?php
          the_terms( get_the_ID(), 'category_tax', '', ' |<br> ', '' );
          ?></p> -->
          <div class="product-info-wrap">
            <div class="product-price">
              <p class="product-price__title"><?php
              the_field('price_item')
              ?> грн</p>
              <?php
              if(get_field('availability_item')){
                echo '<p class="product-price__availability">
                    <img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/watch/checkmark.png" alt="Есть"> В наличии</p>';
              } else {
                echo '<p class="product-price__availability">
                    <img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/watch/denied.png" alt="Нету"> Нету в наличии</p>';
              }
              ?>
              
              <button class="product-price__button"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/watch/buy.svg" alt="Купить"
                  class="product-price__button__icon">Купить</button>
              <form action="mail.php" method="POST" id="product-form" class="product-form">
                <input type="text" name="user_tel" placeholder="Номер вашего телефона" class="product-form__input form__input__tel">
                <button type="submit" class="product-form__button">Заказать в один клик</button>
              </form>
            </div>
            <div class="product-description">
              <ul class="product-description-list">
                <?php
                if(get_field('item_param_1')){
                  echo '<li class="product-description-list__item"><span>Механизм</span>' . get_field('item_param_1') . '</li>';
                }
                ?>
                
                <?php
                if(get_field('item_param_2')){
                  echo '<li class="product-description-list__item"><span>Тип застежки</span>' . get_field('item_param_2') . '</li>';
                } 
                ?>
                <?php
                if(get_field('item_param_3')){
                  echo '<li class="product-description-list__item"><span>Ширина браслета</span>' . get_field('item_param_3') . '</li>';
                } 
                ?>
                <?php
                if(get_field('item_param_4')){
                  echo '<li class="product-description-list__item"><span>Длина ремешка</span>' . get_field('item_param_4') . '</li>';
                } 
                ?>
                <?php
                if(get_field('item_param_5')){
                  echo '<li class="product-description-list__item"><span>Диаметр циферблата</span>' . get_field('item_param_5') . '</li>';
                } 
                ?>
                <?php
                if(get_field('item_param_6')){
                  echo '<li class="product-description-list__item"><span>Стекло</span>' . get_field('item_param_6') . '</li>';
                } 
                ?>
                <?php
                if(get_field('item_param_7')){
                  echo '<li class="product-description-list__item"><span>Материал корпуса</span>' . get_field('item_param_7') . '</li>';
                } 
                ?>
                <?php
                if(get_field('item_param_8')){
                  echo '<li class="product-description-list__item"><span>Материал браслета</span>' . get_field('item_param_8') . '</li>';
                } 
                ?>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
get_footer();
?>