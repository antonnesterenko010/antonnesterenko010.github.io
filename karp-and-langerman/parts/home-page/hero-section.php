<?php
$section_bg  = get_post_meta( get_the_ID(), 'home_hero_bg', true );
$section_title  = get_post_meta( get_the_ID(), 'home_hero_title', true );

?>
<section class="hero" style="background-image: url('<?php  echo esc_html( $section_bg ); ?>')">
    <div class="container">
        <div class="square"></div>
        <div class="hero-title">
            <?php echo $section_title ?>
        </div>
    </div>
</section>