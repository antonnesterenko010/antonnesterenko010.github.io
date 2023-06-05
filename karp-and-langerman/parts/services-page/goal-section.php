<?php
$entries = get_post_meta( get_the_ID(), 'service_goal_list', true );
?>
<section class="goal">
    <div class="container">
        <div class="goal-list">

            <?php
            foreach ( (array) $entries as $key => $entry) {
            $image = isset($entry['service_goal_image'])?$entry['service_goal_image']:"";
            $overlay = isset($entry['service_goal_overlay'])?$entry['service_goal_overlay']:"";
            $title = isset($entry['service_goal_title'])?$entry['service_goal_title']:"";
            $subtitle = isset($entry['service_goal_subtitle'])?$entry['service_goal_subtitle']:"";
            ?>
            <div class="goal-item" id="<?php echo $title?>">
                <div class="image-wrapper">
                    <div class="overlay" style="background: #1A1817;"></div>
                    <div class="image" style="background-image: url('<?php echo $image ?>');"></div>
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