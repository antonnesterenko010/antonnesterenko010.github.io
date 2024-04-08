<?php
/* Template Name: Contact Template */
get_header();

$fields = get_fields('options');
$form_shortcode = $fields['global']['form_shortcode'];
?>


    <main class="main">

        <section class="form__section">
            <div class="container">
                <?php
                echo do_shortcode($form_shortcode);
                ?>
            </div>
        </section>

    </main>

<?php
get_footer();