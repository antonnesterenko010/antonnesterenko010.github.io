<?php
get_header();

$fields = get_fields('options');
$sidebar_position = $fields['global']['sidebar_position'];


?>


    <main class="main">

        <?php
        if ($sidebar_position === 'left') : ?>
            <div class="sidebar left">
                <?php
                dynamic_sidebar('left_sidebar');
                ?>
            </div>
        <?php
        endif;
        if ($sidebar_position === 'right') : ?>
            <div class="sidebar right">
                <?php
                dynamic_sidebar('right_sidebar');
                ?>
            </div>
        <?php
        endif;
        ?>
        <div class="content">
            <?php
            the_content();
            ?>
        </div>

    </main>

<?php
get_footer();