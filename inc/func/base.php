<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 3/29/2021
 * Time: 9:12 AM
 */

/**
 * Get config from library
 */
if ( ! function_exists( 'cct_get_option' ) ) {
	function cct_get_option( $option_name = '', $default = '', $name = '_cct_options' ) {
		$options = get_option( $name );

		if ( ! empty( $option_name ) && ! empty( $options[ $option_name ] ) ) {
			return $options[ $option_name ];
		} else {
			return ( ! empty( $default ) ) ? $default : null;
		}

	}
}

/**
 * Get array value.
 */
if ( ! function_exists( 'cct_get_value_in_array' ) ) {
	function cct_get_value_in_array( $array, $key, $default = null ) {
		return isset( $array[ $key ] ) ? $array[ $key ] : $default;
	}
}

/**
 * Get nav menu register
 */
if(!function_exists('cct_list_menu_registered')) {
	function cct_list_menu_registered() {
		$menuLocations = get_nav_menu_locations();
		$list_menu_register = get_registered_nav_menus();
		$menus = [];
		foreach ( $menuLocations as $key => $item ) {
			$menus[$item] = $list_menu_register[$key];
		}
		return $list_menu_register;
	}
}

if(!function_exists('ctwpGetAllPostsSelect2')):
function ctwpGetAllPostsSelect2($post_type='post') {
    $arr = array();
    $posts = get_posts(array(
        'post_type' => $post_type,
        'posts_per_page' => 20,
        'order' => 'DESC',
        'orderby' => 'date',
    ));
    if (!empty($posts)) {
        foreach ($posts as $post) {
            $arr[$post->ID] = $post->post_title;
        }
    }
    return $arr;
}
endif;
if(!function_exists('ctwpGetAllCategoriesSelect2')):
function ctwpGetAllCategoriesSelect2($taxonomy='category') {
    $arr = array();
    $terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ) );
    if (!empty($terms)) {
        foreach ($terms as $category) {
            $arr[$category->term_id] = $category->name;
        }
    }
    return $arr;
}
endif;
if(!function_exists('ctwpStringLimitWords')):
function ctwpStringLimitWords($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
        array_pop($words);
    return implode(' ', $words);
}
endif;


//FUNCTION SWIPER
if(!function_exists('ctwpGetAllPostsSelect2')):
	function ctwpGetAllPostsSelect2($post_type='post') {
		$arr = array();
		$posts = get_posts(array(
			'post_type' => $post_type,
			'posts_per_page' => 20,
			'order' => 'DESC',
			'orderby' => 'date',
		));
		if (!empty($posts)) {
			foreach ($posts as $post) {
				$arr[$post->ID] = $post->post_title;
			}
		}
		return $arr;
	}
	endif;
	if(!function_exists('ctwpGetAllCategoriesSelect2')):
	function ctwpGetAllCategoriesSelect2($taxonomy='category') {
		$arr = array();
		$terms = get_terms( array(
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
		) );
		if (!empty($terms)) {
			foreach ($terms as $category) {
				$arr[$category->term_id] = $category->name;
			}
		}
		return $arr;
	}
	endif;
	if(!function_exists('ctwpStringLimitWords')):
	function ctwpStringLimitWords($string, $word_limit) {
		$words = explode(' ', $string, ($word_limit + 1));
		if(count($words) > $word_limit)
			array_pop($words);
		return implode(' ', $words);
	}
	endif;