<?php


add_action( 'cmb2_admin_init', 'cmb2_homepage_metaboxes' );
function cmb2_homepage_metaboxes() {

    $cmb = new_cmb2_box( array(
        'id'            => 'hero_metabox',
        'title'         => __( 'Hero Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Hero title', 'cmb2' ),
        'id'         => 'hero_title',
        'type' => 'wysiwyg'
    ) );


    $cmb->add_field( array(
        'name'       => __( 'Hero subtitle', 'cmb2' ),
        'id'         => 'hero_subtitle',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Hero button link', 'cmb2' ),
        'id'         => 'hero_link',
        'type' => 'text_url'
    ) );


    $cmb->add_field( array(
        'name'       => __( 'Hero button name', 'cmb2' ),
        'id'         => 'hero_btn_name',
        'type' => 'text'
    ) );

    $group_field_id = $cmb->add_field( array(
        'id'          => 'hero_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Slider Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'hero_item_title',
        'type' => 'text'
    ) );
    $cmb = new_cmb2_box( array(
        'id'            => 'partners_metabox',
        'title'         => __( 'Partners Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'partners_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Partner Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'partners_item_image',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        ),
        'preview_size' => 'large'
    ) );
    $cmb = new_cmb2_box( array(
        'id'            => 'about_1_metabox',
        'title'         => __( 'How it works Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Set section title', 'cmb2' ),
        'id'         => 'about_1_title',
        'type' => 'wysiwyg'
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'about_1_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'How it works Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'about_1_item_title',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'about_1_item_subtitle',
        'type' => 'textarea_small'
    ) );
    $cmb = new_cmb2_box( array(
        'id'            => 'about_2_metabox',
        'title'         => __( 'About Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Start today button link', 'cmb2' ),
        'id'         => 'about_2_link',
        'type' => 'text_url'
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'about_2_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'About Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'about_2_item_title',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'about_2_item_subtitle',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'about_2_item_image',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        ),
        'preview_size' => 'large'
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'review_metabox',
        'title'         => __( 'Review Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Set section title', 'cmb2' ),
        'id'         => 'review_title',
        'type' => 'wysiwyg'
    ) );



    $group_field_id = $cmb->add_field( array(
        'id'          => 'review_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Service Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Reviewer name',
        'id'   => 'review_item_name',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Reviewer position',
        'id'   => 'review_item_position',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Reviewer quote',
        'id'   => 'review_item_quote',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Rating',
        'id'   => 'review_item_rating',
        'type' => 'text',
        'attributes' => [
                'type' => 'number',
                'min' => '0',
                'max' => '100',
                'step' => '5'
        ]
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Reviewer image',
        'id'   => 'review_item_image',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        ),
        'preview_size' => 'large'
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'promo_metabox',
        'title'         => __( 'Promo Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Promo title', 'cmb2' ),
        'id'         => 'promo_title',
        'type' => 'wysiwyg'
    ) );


    $cmb->add_field( array(
        'name'       => __( 'Promo subtitle', 'cmb2' ),
        'id'         => 'promo_subtitle',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Promo button link', 'cmb2' ),
        'id'         => 'promo_link',
        'type' => 'text_url'
    ) );
    $cmb->add_field( array(
        'name'       => __( 'Promo button name', 'cmb2' ),
        'id'         => 'promo_btn_name',
        'type' => 'text'
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'about_3_metabox',
        'title'         => __( 'Other Services Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Set section title', 'cmb2' ),
        'id'         => 'about_3_title',
        'type' => 'wysiwyg'
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'about_3_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Service Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'about_3_item_title',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'about_3_item_subtitle',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'about_3_item_image',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        ),
        'preview_size' => 'large'
    ) );
    $cmb = new_cmb2_box( array(
        'id'            => 'faq_metabox',
        'title'         => __( 'FAQ Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front'),
        ),
    ) );
    $cmb->add_field( array(
        'name'       => __( 'Set section title', 'cmb2' ),
        'id'         => 'faq_title',
        'type' => 'wysiwyg'
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'faq_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'FAQ List {#}', 'cmb2' ),
            'add_button'        => __( 'Add Question', 'cmb2' ),
            'remove_button'     => __( 'Remove Question', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Question',
        'id'   => 'faq_question',
        'type' => 'textarea_small'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Answer',
        'id'   => 'faq_answer',
        'type' => 'wysiwyg'
    ) );


    $cmb = new_cmb2_box( array(
        'id'            => 'contact_metabox',
        'title'         => __( 'Contact Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front')
        )
    ) );
    $cmb->add_field( array(
        'name'       => __( 'Set section title', 'cmb2' ),
        'id'         => 'contact_title',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_field( array(
        'name'       => __( 'Contact Form 7 Shortcode', 'cmb2' ),
        'id'         => 'contact_form',
        'type' => 'text'
    ) );
}


add_action( 'cmb2_admin_init', 'register_niche_admin_page' );
function register_niche_admin_page() {
    $cmb_options = new_cmb2_box( array(
        'id'           => 'niche_option_metabox',
        'title'        => esc_html__( 'Site Options', 'niche' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'niche_options',
    ) );

    $cmb_options->add_field( array(
        'name'    => __( 'Header', 'niche' ),
        'id'      => 'header_textarea',
        'type'    => 'textarea',
        'sanitization_cb' => 'niche_sanitization_func'
    ) );
    $cmb_options->add_field( array(
        'name'    => __( 'Footer', 'niche' ),
        'id'      => 'footer_textarea',
        'type'    => 'textarea',
        'sanitization_cb' => 'niche_sanitization_func'
    ) );

    $cmb_options->add_field( array(
        'name'    => __( 'Cookies', 'niche' ),
        'id'      => 'cookies_section',
        'type'    => 'title'
    ) );

    $cmb_options->add_field( array(
        'name'       => __( 'Cookies title', 'cmb2' ),
        'id'         => 'cookies_title',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'niche_sanitization_func'
    ) );

    $cmb_options->add_field( array(
        'name'       => __( 'Cookies subtitle', 'cmb2' ),
        'id'         => 'cookies_subtitle',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'niche_sanitization_func'
    ) );

    $cmb_options->add_field( array(
        'name'    => __( 'Footer', 'niche' ),
        'id'      => 'footer_section',
        'type'    => 'title'
    ) );

    $cmb_options->add_field( array(
        'name'       => __( 'Copyright text', 'cmb2' ),
        'id'         => 'copyright_text',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'niche_sanitization_func'
    ) );
    $group_field_id = $cmb_options->add_field( array(
        'id'          => 'social_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Social Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb_options->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'social_item_image',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        ),
        'preview_size' => 'large'
    ) );

    $cmb_options->add_group_field( $group_field_id, array(
        'name'       => __( 'Social link', 'cmb2' ),
        'id'         => 'social_item_link',
        'type' => 'text_url'
    ) );
}

add_action('admin_footer', 'wpct_admin_js');

function wpct_admin_js()
{
    wp_enqueue_script('jquery');
    ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                window.adminWPCT = {};

                adminWPCT.addTinymce = function (id) {
                    tinymce.init({
                        selector: "textarea#" + id,
                        plugins: [
                            "lists image charmap",
                            "fullscreen textcolor",
                            "media paste"
                        ],
                        toolbar: [
                            'undo redo | styleselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image | code',
                        ]
                    });
                };

                adminWPCT.init = function() {
                    $(document).on('click', '.wysiwyg-onclick', function(){
                        var $this = $(this).find(':input');
                        if ($this.hasClass('wysiwyg-onclick-on')) return false;

                        adminWPCT.addTinymce($this.attr('id'));

                        $this.addClass('wysiwyg-onclick-on');
                    });
                }

                adminWPCT.init();
            })
        })(jQuery);
    </script>
    <?php
}
