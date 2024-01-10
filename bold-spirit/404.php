<?php
/*
Template Name: 404
*/
get_header();
?>

    <main id="primary" class="site-main">
        <section class="error-404 not-found">
            <div class="page-content">
                <h1><?php esc_html_e('404 Not Found', 'Bold Spirit') ?></h1>
                <p><?php esc_html_e('It looks like nothing was found at this location.', 'Bold Spirit'); ?></p>
            </div>
        </section>
    </main>

<?php
get_footer();
