<?php

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container-fluid max-width">
            <section class="error-404 not-found">
                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'marketsquare'); ?></p>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        </div>
    </main><!-- #main -->

<?php
get_footer();
