<?php

class KL_Nav_walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( is_array( $item->classes ) && array_search( 'menu-item-has-children', $item->classes ) ) {
			$menu_wrap = sprintf(
					"<div class='expand-btn-wrap'><span>%s</span><div class='btn-expand'><svg width=\"15\" height=\"12\" viewBox=\"0 0 15 12\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
    <path d=\"M8.33678 10.7212C7.94203 11.3244 7.05797 11.3244 6.66321 10.7212L1.15138 2.29753C0.716196 1.63245 1.19336 0.750001 1.98817 0.750001L13.0118 0.750002C13.8066 0.750002 14.2838 1.63245 13.8486 2.29753L8.33678 10.7212Z\"
          fill=\"#BFE2EB\"/>
</svg></div></div>", $item->title
				);
			$output .= sprintf( "<li class='extra-class-name'>%s", $menu_wrap );
		} else {
			if ( $depth === 1){
				$item_icon = '';
				if ( !empty( $item->classes[0] ) ){
					$item_icon = '<div class="img"><img src="'. get_template_directory_uri() . '/assets/img/people/'. $item->classes[0] .'.jpg' .'" alt="people-img"></div>';
				}
				$sub_menu_wrap = sprintf( "<a href='%s'>%s<div class='align-wrap'><div class='name'>%s</div><div class='job-position'>%s</div></div></a>", $item->url, $item_icon, $item->title, $item->description );
			}else{
				$sub_menu_wrap = sprintf( "<a href='%s'>%s</a>", $item->url, $item->title );
			}
			$output .= sprintf( "\n<li>%s\n",$sub_menu_wrap );
		}
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='dropdown-menu'><ul>\n";
	}
}