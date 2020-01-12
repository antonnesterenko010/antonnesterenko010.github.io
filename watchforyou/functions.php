<?php
add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action('wp_footer', 'scripts_theme');
add_action( 'after_setup_theme', 'theme_register_nav_menu');
add_filter( 'nav_menu_css_class', 'change_menu_topmenu', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_footermenu', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_header_telmenu', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_footer_telmenu', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_index_mainmenu', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_offer_slidermenu', 10, 4 );
add_filter( 'nav_menu_item_id', 'change_menu_id_offer_slidermenu', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_footer_mediamenu', 10, 4 );
add_filter( 'wp_nav_menu_items', 'change_nav_menu_items', 10, 2 );

		 

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('watch-page', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Страница товара', // основное название для типа записи
			'singular_name'      => 'Страница товара', // название для одной записи этого типа
			'add_new'            => 'Добавить новую страницу товара', // для добавления новой записи
			'add_new_item'       => 'Добавление страницы товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование страницы товара', // для редактирования типа записи
			'new_item'           => 'Новое описание страницы товара', // текст новой записи
			'view_item'          => 'Смотреть страницу товара', // для просмотра записи этого типа.
			'search_items'       => 'Искать страницу товара', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Мои страницы товаров', // название меню
		),
		'description'         => 'Страница нашего товара',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 2,
		'menu_icon'           => 'dashicons-welcome-add-page', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions',,'post-formats'
		'taxonomies'          => ['category_tax'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => false,
	) );
}
// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'category_tax', [ 'watch-page' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Категории',
			'singular_name'     => 'Категория',
			'search_items'      => 'Поиск категорий',
			'all_items'         => 'Все категории',
			'view_item '        => 'Смотреть категорию',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Изменить категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить новую категорию',
			'new_item_name'     => 'Новое название категории',
			'menu_name'         => 'Категории',
		],
		'description'           => 'Категории к которым относятся товары', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}


function change_menu_topmenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'topmenu' ){
		$classes[] = 'navbar-list__item';
	}
	return $classes;
}
function change_menu_footermenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'footermenu' ){
		$classes[] = 'navbar-list__item';
	}
	return $classes;
}
function change_menu_header_telmenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'header-telmenu' ){
		$classes[] = 'navbar-phonelist__item';
	}
	return $classes;
}
function change_menu_footer_telmenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'footer-telmenu' ){
		$classes[] = 'footer-list__item';
	}
	return $classes;
}
function change_menu_index_mainmenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'index-mainmenu' ){
		$classes[] = 'greetings-menu-item';
	}
	return $classes;
}
function change_menu_footer_mediamenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'footer-mediamenu' ){
		$classes[] = 'footer-links__item';
	}
	return $classes;
}
function change_menu_offer_slidermenu( $classes, $item, $args, $depth ) {
	if( $args->theme_location === 'offer-slidermenu' ){
		$classes = ['offer-slider__item'];
	}
	return $classes;
}
function change_menu_id_offer_slidermenu( $menuid, $item, $args, $depth ) {
	return $args->theme_location === 'offer-slidermenu' ? '' :$menuid;
}
function change_nav_menu_items( $items, $args ) {
	if ( 'index-mainmenu' == $args->theme_location ) {
		$items .= '<li>' . the_title() . '</li>';
	}

	return $items;
}
class My_First_Walker extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		// создаем HTML код элемента меню
		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );


		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before  . $args->link_after;
		$item_output .= '<img src="'.get_field('menu_image',$item->ID).'" class="greetings-menu-item__image"><h2 class="greetings-menu-item__title">' . $title . '</h2> </a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
class Footer_Tel_Walker extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		// создаем HTML код элемента меню
		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );


		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before  . $args->link_after;
		$item_output .= '<img class="footer-list__icon__sub" src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/call.svg" alt="Звонок">' . $title . '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
class Footer_Media_Walker extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		// создаем HTML код элемента меню
		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );


		$item_output = $args->before;
		$item_output .= '<a target="_blank"'. $attributes .'>';
		$item_output .= $args->link_before  . $args->link_after;
		$item_output .= '<img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/greetings/'.$title.'.svg" alt="'.$title.'">' . '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
class Offer_Slider_Walker extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		// создаем HTML код элемента меню
		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );


		$item_output = $args->before;
		$item_output .= '<a href="'.get_permalink($id='12').'"'. $attributes .'>';
		$item_output .= $args->link_before  . $args->link_after;
		$item_output .= '<img src="'.get_field('menu_image',$item->ID).'" class="offer-slider__item__image" alt="'.$title.'"></a>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
function theme_register_nav_menu() {
  register_nav_menu( 'topmenu', 'Меню в шапке сайта' );
  register_nav_menu( 'footermenu', 'Меню в подвале сайта' );
	register_nav_menu( 'header-telmenu', 'Телефоны в шапке сайта' );
  register_nav_menu( 'footer-telmenu', 'Телефоны в подвале сайта' );
	register_nav_menu( 'index-mainmenu', 'Главное меню на главной странице' );
  register_nav_menu( 'offer-slidermenu', 'Меню слайдера Акции и предложения' );
  register_nav_menu( 'footer-mediamenu', 'Меню социальных сетей в подвале' );
	add_theme_support( 'post-formats');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_image_size( 'post_preview', 9999, 290 );
	}

function style_theme() {
  wp_enqueue_style( 'style', get_stylesheet_uri());
  wp_enqueue_style( 'style.css.map', get_template_directory_uri() . '/assets/css/style.css.map');

}
function scripts_theme(){
  wp_deregister_script( 'jquery');
  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' );
  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', ['jquery'], null , true);
  wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/assets/js/jquery.maskedinput.min.js', ['jquery'], null , true);
  wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js');
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js');

}
?>