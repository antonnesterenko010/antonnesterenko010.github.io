<?php


add_action( 'cmb2_admin_init', 'cmb2_homepage_metaboxes' );
function cmb2_homepage_metaboxes() {

    $cmb = new_cmb2_box( array(
        'id'            => 'home_hero_metabox',
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
        'name'       => __( 'Set section title', 'cmb2' ),
        'id'         => 'home_hero_title',
        'type' => 'textarea_small',
        'classes' => 'wysiwyg-onclick'
    ) );
    $cmb->add_field( array(
        'name' => 'Hero Background Image',
        'id'   => 'home_hero_bg',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'preview_size' => 'large'
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'banner_metabox',
        'title'         => __( 'Banner Section', 'cmb2' ),
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
        'name' => 'Desktop Background Image',
        'id'   => 'banner_bg_desktop',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'preview_size' => 'large'
    ) );
    $cmb->add_field( array(
        'name' => 'Mobile Background Image',
        'id'   => 'banner_bg_mobile',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'preview_size' => 'large'
    ) );

    $cmb = new_cmb2_box( array(
        'id'            => 'achieve_metabox',
        'title'         => __( 'Achieve Section', 'cmb2' ),
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
        'name'       => __( 'Achieve text', 'cmb2' ),
        'id'         => 'achieve_text',
        'type' => 'wysiwyg'
    ) );
    $cmb = new_cmb2_box( array(
        'id'            => 'about_metabox',
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

    $group_field_id = $cmb->add_field( array(
        'id'          => 'about_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'About List {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'about_title',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'about_subtitle',
        'type' => 'textarea_small'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'about_image',
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
        'id'            => 'goal_metabox',
        'title'         => __( 'Goal Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'id',
            'value' => get_option('page_on_front')
        )
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'goal_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Goal List Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'goal_title',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'goal_subtitle',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'goal_image',
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

}

add_action( 'cmb2_admin_init', 'cmb2_service_metaboxes' );
function cmb2_service_metaboxes() {
    $cmb = new_cmb2_box( array(
        'id'            => 'service_goal_metabox',
        'title'         => __( 'Goal Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'page-template',
            'value' => 'page-services.php',
        )
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'service_goal_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Goal List Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'service_goal_title',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'service_goal_subtitle',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Image',
        'id'   => 'service_goal_image',
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
    $cmb->add_group_field( $group_field_id, array(
        'name'    => 'Overlay Color',
        'id'      => 'service_goal_overlay',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
    ) );
}


add_action( 'cmb2_admin_init', 'cmb2_people_metaboxes' );
function cmb2_people_metaboxes() {
    $cmb = new_cmb2_box( array(
        'id'            => 'people_hero_metabox',
        'title'         => __( 'Hero Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'page-template',
            'value' => 'page-people.php',
        )
    ) );
    $cmb->add_field( array(
        'name' => 'Hero Background Image',
        'id'   => 'people_hero_bg',
        'type' => 'file',
        'options' => array(
            'url' => true,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File'
        ),
        'preview_size' => 'large'
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Set title', 'cmb2' ),
        'id'         => 'people_title',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Set position', 'cmb2' ),
        'id'         => 'people_position',
        'type' => 'text',
    ) );
    $group_field_id = $cmb->add_field( array(
        'id'          => 'tags_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Tag {#}', 'cmb2' ),
            'add_button'        => __( 'Add Tag', 'cmb2' ),
            'remove_button'     => __( 'Remove Tag', 'cmb2' ),
            'sortable'          => true,
        ),
    ) );
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'tag_title',
        'type' => 'text'
    ) );
    $cmb = new_cmb2_box( array(
        'id'            => 'people_info_metabox',
        'title'         => __( 'Info Section', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'show_on'       => array(
            'key' => 'page-template',
            'value' => 'page-people.php',
        )
    ) );

    $cmb->add_field( array(
        'name' => 'Email',
        'id'   => 'people_email',
        'type' => 'text_email'
    ) );

    $cmb->add_field( array(
        'name' => 'Education',
        'id'   => 'people_education',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
        'name' => 'Bar Admissions',
        'id'   => 'people_admissions',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_field( array(
        'name' => 'Bio Narrative',
        'id'   => 'people_bio',
        'type' => 'wysiwyg'
    ) );
    $cmb->add_field( array(
        'name' => 'Representative Transactions',
        'id'   => 'people_represent',
        'type' => 'wysiwyg'
    ) );
}

add_action( 'cmb2_admin_init', 'register_kl_admin_page' );
function register_kl_admin_page() {
    $cmb_options = new_cmb2_box( array(
        'id'           => 'kl_option_metabox',
        'title'        => esc_html__( 'Site Options', 'kl' ),
        'object_types' => array( 'options-page' ),
        'option_key'   => 'kl_options',
    ) );

    $cmb_options->add_field( array(
        'name'    => __( 'Header', 'carter' ),
        'id'      => 'header_textarea',
        'type'    => 'textarea',
        'sanitization_cb' => 'kl_sanitization_func'
    ) );
    $cmb_options->add_field( array(
        'name'    => __( 'Footer', 'carter' ),
        'id'      => 'footer_textarea',
        'type'    => 'textarea',
        'sanitization_cb' => 'kl_sanitization_func'
    ) );

    $cmb_options->add_field( array(
        'name'       => __( 'Contact Form 7 Shortcode', 'cmb2' ),
        'id'         => 'footer_form',
        'type' => 'text',
        'sanitization_cb' => 'kl_sanitization_func'
    ) );
    $group_field_id = $cmb_options->add_field( array(
        'id'          => 'footer_list',
        'type'        => 'group',
        'options'     => array(
            'group_title'       => __( 'Footer List Item {#}', 'cmb2' ),
            'add_button'        => __( 'Add Item', 'cmb2' ),
            'remove_button'     => __( 'Remove Item', 'cmb2' ),
            'sortable'          => true,
        ),
        'sanitization_cb' => 'kl_sanitization_func'
    ) );
    $cmb_options->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'id'   => 'footer_list_title',
        'type' => 'text',
        'sanitization_cb' => 'kl_sanitization_func'
    ) );
    $cmb_options->add_group_field( $group_field_id, array(
        'name' => 'Subtitle',
        'id'   => 'footer_list_text',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'kl_sanitization_func'
    ) );
    $cmb_options->add_field( array(
        'name'       => __( 'Copyright text', 'cmb2' ),
        'id'         => 'copyright_text',
        'type' => 'wysiwyg',
        'sanitization_cb' => 'kl_sanitization_func'
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
