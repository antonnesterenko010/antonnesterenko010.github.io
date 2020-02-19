<?php

// подключение css файлов
add_action( 'wp_enqueue_scripts', 'style_theme' );
function style_theme() {
  wp_enqueue_style( 'style', get_stylesheet_uri());
  wp_enqueue_style( 'style.css.map', get_template_directory_uri() . '/assets/css/style.css.map');

}


// подключение логотипа в header
add_theme_support('custom-logo');
// регистрация меню
add_action( 'after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu() {
	register_nav_menu( 'header-menu', 'Верхнее навигационное меню' );
	register_nav_menu( 'footer-menu', 'Нижнее навигационное меню' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'video-thumb', 300, 9999 );
	add_image_size( 'videos-thumb', 300, 350 );
	add_image_size( 'classic-thumb', 400, 150 );
	}
// замена класса в custom-logo
function helpwp_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'navbar-logo', $html );
	return $html;
}
add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);
// удаление id у всех пунктов меню
add_filter( 'nav_menu_item_id', '__return_empty_string' );

// настройка header-menu
// замена классов в header-menu
add_filter( 'nav_menu_css_class', 'change_menu_header_menu', 10, 4 );
function change_menu_header_menu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'header-menu' ){
		$classes = ['navbar-list__item'];
	}
	return $classes;
}
// настройка footer-menu
// замена классов в footer-menu
add_filter( 'nav_menu_css_class', 'change_menu_footer_menu', 10, 4 );
function change_menu_footer_menu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'footer-menu' ){
		$classes = ['navbar-list__item'];
	}
	return $classes;
}
// video post type 
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('video', array(
		'labels' => array(
			'name'               => 'Страница Video', // основное название для типа записи
			'singular_name'      => 'Страница Video', // название для одной записи этого типа
			'add_new'            => 'Добавить новое Video', // для добавления новой записи
			'add_new_item'       => 'Добавление Video', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Video', // для редактирования типа записи
			'new_item'           => 'Новое описание Video', // текст новой записи
			'view_item'          => 'Смотреть страницу Video', // для просмотра записи этого типа.
			'search_items'       => 'Искать Video', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Video', // название меню
		),
		'description'         => 'Video post type',
		'public'              => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-video-alt2', 
		'supports'            => [ 'title', 'thumbnail', 'page-attributes', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions',,'post-formats'
		'has_archive'         => true,
	) );
}

?>
