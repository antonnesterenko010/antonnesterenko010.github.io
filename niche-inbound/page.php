<?php
get_header();
?>
<section class="page-default-section">
    <div class="container">
        <h1>
            <?php
            the_title();
            ?></h1>
        <?php
        the_content();
        ?>
    </div>
</section>

<?php
get_footer();
?>