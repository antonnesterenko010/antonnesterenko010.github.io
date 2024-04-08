<?php
get_header();
while (have_rows('content', get_the_ID())) {
    the_row();
    get_template_part('templates/blocks/' . get_row_layout());

}
get_footer();
?>
