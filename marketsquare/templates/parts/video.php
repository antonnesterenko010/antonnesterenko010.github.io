<?php if ($type === 'upload') { ?>
    <video class="video__wrapper upload  <?php echo $autoplay ? 'autoplay' : '' ?>"
           playsinline <?php echo $autoplay ? 'autoplay="autoplay"' : '' ?> loop muted width="100%" height="100%">
        <source src="<?php echo $src ?>">
    </video>
<?php } elseif ($type == 'vimeo') {
    $pattern = '/\d+/';

    if (preg_match($pattern, $src, $matches)) {
        $id = $matches[0];

        $source = 'https://player.vimeo.com/video/' . $id;

        if ($autoplay) {
            $source .= '?autoplay=1&muted=1';
        } ?>
        <iframe src="<?php echo $source; ?>" data-src="<?php echo $source; ?>" width="640" height="360" frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
    <?php }
} elseif ($src) {
    $srcToggle = $src . '&autoPlay=1&mutedAutoPlay=1&autoMute=1';
    if ($autoplay) {
        $src .= '&ambient=1';
    }
    ?>
    <iframe allow="fullscreen" data-toggle="<?php echo $srcToggle ?>" data-src="<?php echo $src ?>"></iframe>

    <div class="loader"></div>
<?php } ?>
<div class="video__absolute <?php echo $fullScreen ? '' : 'not_full' ?>"></div>
<div class="video__mobile-close"></div>
