<?php

$entries = get_post_meta( get_the_ID(), 'partners_list', true );
?>
<section class="partners">
    <div class="container">
        <div class="partners-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['partners_item_image'])?$entry['partners_item_image']:"";
            ?>
                <div class="partner">
                    <img src="<?php echo $image ?>" alt="partner-<?php echo $key + 1?>">
                </div>
            <?php } ?>
        </div>
        <button class="partners-btn"><span>view more</span></button>
    </div>
</section>