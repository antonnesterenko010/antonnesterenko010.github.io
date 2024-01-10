<?php
/*
Template Name: 404
*/
get_header('not-found');
?>

    <main class="error-404">
        <section class="not-found__block"
                 style="background-image: url('<?php echo get_template_directory_uri() . '/dest/images/hero-bg.png' ?>')">

            <div class="container">
                <h1><?php esc_html_e('404 Not Found', 'cnc-solutions') ?></h1>
                <p><?php esc_html_e('It looks like nothing was found at this location.', 'cnc-solutions'); ?></p>
            </div>
        </section>

    </main>

<?php
get_footer();
