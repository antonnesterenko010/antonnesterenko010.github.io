<?php
/* 
Template name: Акции и предложения
Template Post Type: page
*/
?>
<?php
get_header('category');
?>
<section class="offer-page section">
    <ul class="offer-page-list">
      
    <?php
    if(!get_field('offer_disabled')) :
      
    ?>
      <?php
      if(get_field('offer_image')){
        echo '<li class=""><img class="offer-slider__item__image" src="' . get_field('offer_image'). '" alt="Акция"></li>';
      }
      ?>
      <ul class="offer-terms-list ">
        
          <?php
            if(get_field('offer_terms_list')){
            echo '<h3 class="offer-terms-list__title " style="color:' . get_field('offer_terms_list_color') . '">' . get_field('offer_terms_list') . '</h3>';
            }
          ?>

        
              <?php
                if(get_field('offer_terms_item')){
                echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_item_color') .  '">' . get_field('offer_terms_item') .'</li>';
                }
              ?>
              <?php
                if(get_field('offer_terms_item_2')){
                echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_item_color_2') .  '">' . get_field('offer_terms_item_2') .'</li>';
                }
              ?>
              <?php
                if(get_field('offer_terms_item_3')){
                echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_item_color_3') .  '">' . get_field('offer_terms_item_3') .'</li>';
                }
              ?>
              <?php
                if(get_field('offer_terms_item_4')){
                echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_item_color_4') .  '">' . get_field('offer_terms_item_4') .'</li>';
                }
              ?>
      </ul>
      <?php
      endif;
      ?>
      
      <?php
      if(!get_field('offer_2_disabled')) :
        
      ?>
      <?php
      if(get_field('offer_image_2')){
        echo '<li class=""><img class="offer-slider__item__image" src="' . get_field('offer_image_2'). '" alt="Акция"></li>';
      }
      ?>
      <ul class="offer-terms-list">
        <?php
        if(get_field('offer_terms_2_list')){
          echo '<h3 class="offer-terms-list__title " style="color:' . get_field('offer_terms_2_list_color') . '">' . get_field('offer_terms_2_list') . '</h3>';
        }
        ?>
        
        <?php
        if(get_field('offer_terms_2_item')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_2_item_color') .  '">' . get_field('offer_terms_2_item') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_2_item_2')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_2_item_color_2') .  '">' . get_field('offer_terms_2_item_2') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_2_item_3')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_2_item_color_3') .  '">' . get_field('offer_terms_2_item_3') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_2_item_4')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_2_item_color_4') .  '">' . get_field('offer_terms_2_item_4') .'</li>';
        }
        ?>
      </ul>
      <?php
      endif;
      ?>
      <?php
      if(!get_field('offer_3_disabled')) :
        
      ?>
      <?php
      if(get_field('offer_image_3')){
        echo '<li class=""><img class="offer-slider__item__image" src="' . get_field('offer_image_3'). '" alt="Акция"></li>';
      }
      ?>
      <ul class="offer-terms-list">
        <?php
        if(get_field('offer_terms_3_list')){
          echo '<h3 class="offer-terms-list__title " style="color:' . get_field('offer_terms_3_list_color') . '">' . get_field('offer_terms_3_list') . '</h3>';
        }
        ?>
        <?php
        if(get_field('offer_terms_3_item')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_3_item_color') .  '">' . get_field('offer_terms_3_item') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_3_item_2')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_3_item_color_2') .  '">' . get_field('offer_terms_3_item_2') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_3_item_3')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_3_item_color_3') .  '">' . get_field('offer_terms_3_item_3') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_3_item_4')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_3_item_color_4') .  '">' . get_field('offer_terms_3_item_4') .'</li>';
        }
        ?>
      </ul>
      <?php
      endif;
      ?>
      <?php
      if(!get_field('offer_4_disabled')) :
        
      ?>
      <?php
      if(get_field('offer_image_4')){
        echo '<li class=""><img class="offer-slider__item__image" src="' . get_field('offer_image_4'). '" alt="Акция"></li>';
      }
      ?>
      <ul class="offer-terms-list">
        <?php
        if(get_field('offer_terms_4_list')){
          echo '<h3 class="offer-terms-list__title " style="color:' . get_field('offer_terms_4_list_color') . '">' . get_field('offer_terms_4_list') . '</h3>';
        }
        ?>
        <?php
        if(get_field('offer_terms_4_item')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_4_item_color') .  '">' . get_field('offer_terms_4_item') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_4_item_2')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_4_item_color_2') .  '">' . get_field('offer_terms_4_item_2') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_4_item_3')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_4_item_color_3') .  '">' . get_field('offer_terms_4_item_3') .'</li>';
        }
        ?>
        <?php
        if(get_field('offer_terms_4_item_4')){
          echo '<li class="offer-terms-list__item" style="color:'. get_field('offer_terms_4_item_color_4') .  '">' . get_field('offer_terms_4_item_4') .'</li>';
        }
        ?>
      </ul>
      <?php
      endif;
      ?>
    </ul>
  </section>
  <!-- offer-section -->

<?php
get_footer();
?>