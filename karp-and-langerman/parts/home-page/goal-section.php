<?php
$entries = get_post_meta( get_the_ID(), 'goal_list', true );
?>
<section class="goal">
    <div class="container">
        <div class="goal-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['goal_image'])?$entry['goal_image']:"";
            $title = isset($entry['goal_title'])?$entry['goal_title']:"";
            $subtitle = isset($entry['goal_subtitle'])?$entry['goal_subtitle']:"";
            ?>
            <div class="goal-item">
                <div class="image-wrapper" style="background-image: url('<?php echo $image ?>');">
                </div>
                <div class="title-wrapper">
                    <div class="goal-title"><?php echo $title ?></div>
                    <div class="goal-subtitle"><?php echo $subtitle?></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>