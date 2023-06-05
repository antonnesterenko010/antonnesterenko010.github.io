<?php

add_action('cmb2_admin_init', 'define_theme_options');
function define_theme_options()
{
    $prefix = 'sc_games_';
    $cmb_options = new_cmb2_box(array(
        'id' => $prefix . 'options',
        'title' => 'Main Settings',
        'object_types' => array('options-page'),
        'option_key' => 'sc_games_options',
        'vertical_tabs' => true,
        'tabs' => array(
            array(
                'id' => 'global-tab',
                'icon' => '',
                'title' => 'Global',
                'fields' => array(
                    $prefix . 'global_title',
                    $prefix . 'logo',
                    $prefix . 'design_type',
                    $prefix . 'pln_btn',
                    $prefix . 'announcement_text',
                    $prefix . 'disclaimer',
                    $prefix . 'show_related_posts',
                    $prefix . 'related_posts_title',
                ),
            ),
            array(
                'id' => 'header-tab',
                'icon' => '',
                'title' => 'Header',
                'fields' => array(
                    $prefix . 'header_title',
                    $prefix . 'contact_label',
                    $prefix . 'contact_link',
                    $prefix . 'reg_label',
                    $prefix . 'reg_link',
                ),
            ),
            array(
                'id' => 'frontpage-tab',
                'icon' => '',
                'title' => 'Frontpage',
                'fields' => array(
                    $prefix . 'frontpage_title',
                    $prefix . 'fp_hero_title',
                    $prefix . 'fp_hero_description',
                    $prefix . 'fp_hero_button_label',
                    $prefix . 'fp_hero_button_link',
                    $prefix . 'fp_htp_title',
                    $prefix . 'fp_htp_description',
                    $prefix . 'fp_htp_blocks',
                    $prefix . 'fp_games_title',
                    $prefix . 'fp_games_description',
                    $prefix . 'fp_newsletter_title',
                    $prefix . 'fp_newsletter_subtitle',
                    $prefix . 'fp_newsletter_placeholder',
                    $prefix . 'fp_newsletter_button_label',
                    $prefix . 'fp_cont_form_title',
                    $prefix . 'fp_cont_form_main_title_label',
                    $prefix . 'fp_cont_form_name_label',
                    $prefix . 'fp_cont_form_email_label',
                    $prefix . 'fp_cont_form_textarea_label',
                    $prefix . 'fp_cont_form_submit_label',
                    $prefix . 'fp_reg_form_title',
                    $prefix . 'fp_reg_form_main_title_label',
                    $prefix . 'fp_reg_form_name_label',
                    $prefix . 'fp_reg_form_email_label',
                    $prefix . 'fp_reg_form_password_label',
                    $prefix . 'fp_reg_form_password_again_label',
                    $prefix . 'fp_reg_form_submit_label',
                ),
            ),
            array(
                'id' => 'footer-tab',
                'icon' => '',
                'title' => 'Footer',
                'fields' => array(
                    $prefix . 'footer_title',
                    $prefix . 'footer_col_1',
                    $prefix . 'footer_col_2',
                    $prefix . 'footer_col_3',
                    $prefix . 'footer_copyright',
                ),
            ),
            array(
                'id' => 'code-insert-tab',
                'icon' => '',
                'title' => 'Insert Code',
                'fields' => array(
                    $prefix . 'header_code_insert',
                    $prefix . 'body_code_insert',
                    $prefix . 'footer_code_insert',
                ),
            ),
        )
    ));

    /* ---Global options--- */
    $cmb_options->add_field(array(
        'name' => 'Global',
        'id' => $prefix . 'global_title',
        'type' => 'title',
    ));
    $cmb_options->add_field(array(
        'name' => 'Logo',
        'id' => $prefix . 'logo',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text' => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        )
    ));
    $cmb_options->add_field(array(
        'name' => 'Design',
        'id' => $prefix . 'design_type',
        'type' => 'select',
        'options' => array(
            'design-0' => 'Design Zero',
            'design-1' => 'Design One',
            'design-2' => 'Design Two',
            'design-3' => 'Design Three',
            'design-4' => 'Design Four',
            'design-5' => 'Design Five',
            'design-6' => 'Design Six',
            'design-7' => 'Design Seven',
            'design-8' => 'Design Eight',
            'design-9' => 'Design Nine',
            'design-10' => 'Design Ten',
            'design-11' => 'Design Eleven',
            'design-12' => 'Design Twelve',
            'design-13' => 'Design Thirteen',
            'design-14' => 'Design Fourteen',
            'design-15' => 'Design Fifteen',
            'design-16' => 'Design Sixteen',
            'design-17' => 'Design Seventeen',
            'design-18' => 'Design Eighteen',
            'design-19' => 'Design Nineteen',
            'design-20' => 'Design Twenty',
            'design-21' => 'Design Twenty One',
            'design-22' => 'Design Twenty Two',
            'design-23' => 'Design Twenty Three',
            'design-24' => 'Design Twenty Four',
            'design-25' => 'Design Twenty Five',
            'design-26' => 'Design Twenty Six',
            'design-27' => 'Design Twenty Seven',
            'design-28' => 'Design Twenty Eight',
            'design-29' => 'Design Twenty Nine',
            'design-30' => 'Design Thirty',
            'design-31' => 'Design Thirty One',
            'design-32' => 'Design Thirty Two',
            'design-33' => 'Design Thirty Three',
            'design-34' => 'Design Thirty Four',
            'design-35' => 'Design Thirty Five',
            'design-36' => 'Design Thirty Six',
            'design-37' => 'Design Thirty Seven',
            'design-38' => 'Design Thirty Eight',
            'design-39' => 'Design Thirty Nine',
            'design-40' => 'Design Forty'
        ),
    ));
    $cmb_options->add_field(array(
        'name' => '"Play Now" button label',
        'id' => $prefix . 'pln_btn',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Announcement text',
        'id' => $prefix . 'announcement_text',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'id' => $prefix . 'disclaimer',
        'name' => 'Image disclaimer',
        'type' => 'text'
    ));
    $cmb_options->add_field(array(
        'id' => $prefix . 'show_related_posts',
        'name' => 'Show related posts',
        'type' => 'checkbox'
    ));
    $cmb_options->add_field(array(
        'id' => $prefix . 'related_posts_title',
        'name' => 'Related posts title',
        'type' => 'text'
    ));

    /* ---Header options--- */
    $cmb_options->add_field(array(
        'name' => 'Header',
        'id' => $prefix . 'header_title',
        'type' => 'title',
    ));
    $cmb_options->add_field(array(
        'name' => 'Contact label',
        'id' => $prefix . 'contact_label',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Contact link',
        'id' => $prefix . 'contact_link',
        'type' => 'text_url',
    ));
    $cmb_options->add_field(array(
        'name' => 'Registration label',
        'id' => $prefix . 'reg_label',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Registration link',
        'id' => $prefix . 'reg_link',
        'type' => 'text_url',
    ));

    /* ---Frontpage options--- */
    $cmb_options->add_field(array(
        'name' => 'Frontpage',
        'id' => $prefix . 'frontpage_title',
        'type' => 'title',
    ));
    $cmb_options->add_field(array(
        'name' => 'Hero title',
        'id' => $prefix . 'fp_hero_title',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Hero description',
        'id' => $prefix . 'fp_hero_description',
        'type' => 'wysiwyg',
    ));
    $cmb_options->add_field(array(
        'name' => 'Hero button label',
        'id' => $prefix . 'fp_hero_button_label',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Hero button link',
        'id' => $prefix . 'fp_hero_button_link',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => '"How to play" title',
        'id' => $prefix . 'fp_htp_title',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => '"How to play" description',
        'id' => $prefix . 'fp_htp_description',
        'type' => 'wysiwyg',
    ));

    $group_field_id = $cmb_options->add_field(array(
        'id' => $prefix . 'fp_htp_blocks',
        'type' => 'group',
        'options' => array(
            'group_title' => __('Block {#}', 'cmb2'),
            'add_button' => __('Add Another Block', 'cmb2'),
            'remove_button' => __('Remove Block', 'cmb2'),
            'sortable' => true,
            'closed' => true
        ),
    ));
    $cmb_options->add_group_field($group_field_id, array(
        'name' => 'Image',
        'id' => 'image',
        'type' => 'file',
        'options' => array(
            'url' => false,
        ),
        'text' => array(
            'add_upload_file_text' => 'Add File'
        ),
        'query_args' => array(
            'type' => array(
                'image/gif',
                'image/jpeg',
                'image/png',
                'image/svg+xml',
            ),
        )
    ));
    $cmb_options->add_group_field($group_field_id, array(
        'name' => 'Title',
        'id' => 'title',
        'type' => 'text',
    ));
    $cmb_options->add_group_field($group_field_id, array(
        'name' => 'Content',
        'id' => 'content',
        'type' => 'wysiwyg',
        'options' => array(),
    ));

    $cmb_options->add_field(array(
        'name' => 'Games title',
        'id' => $prefix . 'fp_games_title',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Games description',
        'id' => $prefix . 'fp_games_description',
        'type' => 'wysiwyg',
    ));
    $cmb_options->add_field(array(
        'name' => 'Newsletter title',
        'id' => $prefix . 'fp_newsletter_title',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Newsletter subtitle',
        'id' => $prefix . 'fp_newsletter_subtitle',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Newsletter placeholder',
        'id' => $prefix . 'fp_newsletter_placeholder',
        'type' => 'text',
    ));
    $cmb_options->add_field(array(
        'name' => 'Newsletter button label',
        'id' => $prefix . 'fp_newsletter_button_label',
        'type' => 'text',
    ));

    /* --- Content Form options ---- */
    $cmb_options->add_field(array(
        'name' => 'Contact Form',
        'id' => $prefix . 'fp_cont_form_title',
        'type' => 'title',
    ));
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_cont_form_main_title_label',
            'name' => 'Contact Form Main Title',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_contact_form_name_label',
            'name' => 'Name label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_cont_form_email_label',
            'name' => 'Email label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_cont_form_textarea_label',
            'name' => 'Message label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_cont_form_submit_label',
            'name' => 'Submit label',
            'type' => 'text'
        )
    );

    /* ---Register Form options--- */
    $cmb_options->add_field(array(
        'name' => 'Register Form',
        'id' => $prefix . 'fp_reg_form_title',
        'type' => 'title',
    ));
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_reg_form_main_title_label',
            'name' => 'Registration Form Main Title',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_reg_form_name_label',
            'name' => 'Name label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_reg_form_email_label',
            'name' => 'Email label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_reg_form_password_label',
            'name' => 'Password label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_reg_form_password_again_label',
            'name' => 'Password again label',
            'type' => 'text'
        )
    );
    $cmb_options->add_field(
        array(
            'id' => $prefix . 'fp_reg_form_submit_label',
            'name' => 'Submit label',
            'type' => 'text'
        )
    );

    /* ---Footer options--- */
    $cmb_options->add_field(array(
        'name' => 'Footer',
        'id' => $prefix . 'footer_title',
        'type' => 'title',
    ));
    $cmb_options->add_field(array(
        'name' => 'Footer column 1',
        'id' => $prefix . 'footer_col_1',
        'type' => 'wysiwyg',
        'options' => array(),
    ));
    $cmb_options->add_field(array(
        'name' => 'Footer column 2',
        'id' => $prefix . 'footer_col_2',
        'type' => 'wysiwyg',
        'options' => array(),
    ));
    $cmb_options->add_field(array(
        'name' => 'Footer column 3',
        'id' => $prefix . 'footer_col_3',
        'type' => 'wysiwyg',
        'options' => array(),
    ));
    $cmb_options->add_field(array(
        'name' => 'Footer copyright',
        'id' => $prefix . 'footer_copyright',
        'type' => 'text',
    ));
    $cmb_options->add_field( array(
        'name' => 'Header',
        'default' => '',
        'id' => $prefix . 'header_code_insert',
        'type' => 'textarea_code',
        'options' => array( 'disable_codemirror' => true )
    ) );
    $cmb_options->add_field( array(
        'name' => 'Body',
        'default' => '',
        'id' => $prefix . 'body_code_insert',
        'type' => 'textarea_code',
        'options' => array( 'disable_codemirror' => true )
    ) );
    $cmb_options->add_field( array(
        'name' => 'Footer',
        'default' => '',
        'id' => $prefix . 'footer_code_insert',
        'type' => 'textarea_code',
        'options' => array( 'disable_codemirror' => true )
    ) );
}