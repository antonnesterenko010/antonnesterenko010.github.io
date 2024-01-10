<?php

use inc\Enqueue;
use inc\Ajax;
use inc\CustomFunctions;
use ThemeOptions\PostType;
use ThemeOptions\Options;
use ThemeOptions\AcfBlocksEnable;
use ThemeOptions\RegisterMenus;
use ThemeOptions\PostTaxonomy;

class Theme
{
    static function init()
    {
        self::autoload();
        Enqueue::init();
        self::registerThemeSettings();
        self::initThemeMethods();
        Ajax::init();
        CustomFunctions::init();
    }

    static function autoload()
    {
        require_once(realpath(get_template_directory()) . '/inc/loader.php');
    }

    static function registerThemeSettings()
    {
        new Options();
//        new AcfBlocksEnable(self::acfBlocks());
    }

    static function initThemeMethods()
    {
        /*self::addCustomPostType();*/
        /*self::addCustomTaxonomy();*/
        self::registerMenu();
        self::addImageSizes();
        self::customThemeHooks();
    }

    static function customThemeHooks()
    {
        add_filter('show_admin_bar', '__return_false');
        add_theme_support('custom-logo');
    }

    static function acfBlocks(): array
    {
        $path = get_template_directory_uri() . '/dest/images/gutenberg/';
        $css_path = '/dest/css/main/blocks/';
        return [
            'acf_block_slider' => ['title' => 'Slider', 'preview' => $path . 'acf_block_hero_image.jpg', 'css_path' => $css_path],
        ];
    }


    static function addCustomPostType()
    {
        new PostType('Post type name', basename(__DIR__));
    }


    static function addCustomTaxonomy()
    {
        new PostTaxonomy('Taxonomy name', 'post-type-name', basename(__DIR__));
    }


    static function registerMenu()
    {
        $menuArray = ['MainHeader'];
        $registerAllMenuItems = new RegisterMenus('', basename(__DIR__), $menuArray);
        $registerAllMenuItems->addAction();
    }

    static function addImageSizes()
    {
        add_image_size('large', 1900, 800);
        add_image_size('medium', 800, 600);
        add_image_size('small', 400, 250);
    }
}

Theme::init();

function wpf_dev_frontend_output_success(  $form_data, $fields, $entry_id ) {

    // Optional, you can limit it to specific forms. Below, we restrict output to form #235.
    if ( absint( $form_data[ 'id' ] ) !== 235 ) {
        return;
    }
    // Reset the fields to blank
    unset(
        $_GET[ 'wpforms_return' ],
        $_POST[ 'wpforms' ][ 'id' ]
    );

    // Uncomment this line out if you want to clear the form field values after submission
    unset( $_POST[ 'wpforms' ][ 'fields' ] );

    // Actually render the form.
    wpforms()->frontend->output( $form_data[ 'id' ] );

}

add_action( 'wpforms_frontend_output_success', 'wpf_dev_frontend_output_success', 10, 3 );
