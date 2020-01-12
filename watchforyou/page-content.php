<?php
/* 
Template name: Страница с редактируемым контентом
Template Post Type: page
*/
?>
<?php
get_header('category');
?>
<section class="greetings-section section">
<div class="container">
  <?php
    the_post();
    the_content(); 
?>
</div>
</section>
<?php
get_footer();
?>