<?php

add_action('cmb2_admin_init', 'cmb2_register_page_options');
function cmb2_register_page_options()
{
    $prefix = 'register_page_';
    $cmb = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => ('Register Form Data'),
        'object_types' => array('page'),
        'show_on' => array('key' => 'page-template', 'value' => 'page-registration.php'),
        'show_names' => true,
    ));
    $cmb->add_field(
        array(
            'id' => $prefix . '_name_label',
            'name' => 'Name label',
            'type' => 'text'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_email_label',
            'name' => 'Email label',
            'type' => 'text'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_password_label',
            'name' => 'Password label',
            'type' => 'text'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_password_again_label',
            'name' => 'Password again label',
            'type' => 'text'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_submit_label',
            'name' => 'Submit label',
            'type' => 'text'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_answer_text',
            'name' => 'Answer text',
            'type' => 'wysiwyg'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_answer_button_label',
            'name' => 'Answer button label',
            'type' => 'text'
        )
    );
}