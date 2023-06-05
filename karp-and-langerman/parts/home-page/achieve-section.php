<?php
$text = apply_filters('the_content' , get_post_meta ( get_the_ID(), 'achieve_text', true));
?>
<section class="achieve">
    <div class="container">
        <div class="achieve-text">
            <?php
            echo $text ;
            ?>
        </div>
    </div>
</section>