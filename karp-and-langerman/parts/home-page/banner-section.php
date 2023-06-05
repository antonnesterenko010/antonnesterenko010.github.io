<?php
$bg_desktop = get_post_meta( get_the_ID(), 'banner_bg_desktop', true );
$bg_mobile = get_post_meta( get_the_ID(), 'banner_bg_mobile', true );
?>
<section class="banner">
    <div class="banner-full-desktop banner-full" style="background-image: url('<?php echo $bg_desktop?>')">
    </div>
    <div class="banner-full-mobile banner-full" style="background-image: url('<?php echo $bg_mobile?>')"></div>
</section>