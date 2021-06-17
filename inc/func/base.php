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