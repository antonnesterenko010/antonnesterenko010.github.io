<?php
add_action('cmb2_admin_init', 'cmb2_game_page_options');
function cmb2_game_page_options()
{
    $prefix = 'game_page_';
    $cmb = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => ('Game Data'),
        'object_types' => array('game'),
        'show_names' => true,
    ));
    $cmb->add_field(
        array(
            'id' => $prefix . '_game_subtitle',
            'name' => 'Game subtitle',
            'type' => 'text'
        )
    );
    $cmb->add_field(
        array(
            'id' => $prefix . '_link',
            'name' => 'Game link',
            'type' => 'text_url'
        )
    );
    $cmb->add_field(array(
        'name' => 'Game logo',
        'id' => $prefix . '_logo',
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
    $cmb->add_field(array(
        'name' => 'Game Background Image',
        'id' => $prefix . '_bg',
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
    $cmb->add_field(array(
        'name' => 'Provider Image',
        'id' => $prefix . '_provider',
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
    $cmb->add_field(
        array(
            'id' => $prefix . '_rating',
            'name' => 'Rating',
            'type' => 'text',
            'default' => 0,
            'attributes' => array(
                'type' => 'number',
                'min' => '0',
                'max' => '10',
                'step' => '1',
            ),
        )
    );
}