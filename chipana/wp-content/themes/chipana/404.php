<?php
get_header();

$fields = get_fields('options');
$errorPage = $fields['page_not_found'];
$errorPageText = $errorPage['text'];
$errorPageButtonBack = $errorPage['button_back'];
?>


    <main class="grid-container">
        <section class="error grid-content-full grid-container" style="background-color: #EADFEC;">
            <div class="grid-content">
                <?php echo $errorPageText?>
                <a href="<?php echo home_url()?>" class="btn"><?php echo $errorPageButtonBack?></a>
            </div>
        </section>
    </main>

<?php
get_footer();