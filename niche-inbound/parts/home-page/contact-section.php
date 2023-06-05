<?php
$section_title = get_post_meta( get_the_ID(), 'contact_title', true );
$form = apply_filters('the_content' , get_post_meta( get_the_ID(), 'contact_form', true ));
?>
<section class="contact" id="contact">
    <div class="container">
        <div class="contact-title heading-1 heading">
            <?php echo $section_title ?>
        </div>
        <?php echo $form ?>
    </div>
</section>