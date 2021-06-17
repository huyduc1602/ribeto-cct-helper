<?php
/*
Plugin Name: 		CCT Helper
Plugin URI:
Description:		Plugin support ribeto theme
Version: 			1.0.0
Author: 			aht-asia
Author URI:
*/
if (!defined('ABSPATH')) {
	return;
}

if (!class_exists('CCT_Helper')) {
	class CCT_Helper {
		public function __construct() {
			$this->define();
			$this->load_library();
			$this->load_helper();

			add_action('init', array(__CLASS__, 'load_config'), 2);
		}

		// define
		public function define() {
			define('CCT_HELPER_DIR_PATH', plugin_dir_path(__FILE__));
			define('CCT_HELPER_DIR_URL', plugin_dir_url(__FILE__));

			define('CCT_OPTIONS', '_cct_options');
            define('CCT_PRODUCT_OPTIONS', '_cct_product_options');
		}

		// load library.
		public function load_library() {
			// Load core framework
			if (!class_exists('CSF')) {
				require_once CCT_HELPER_DIR_PATH . '/lib/codestar-framework/codestar-framework.php';
			}
		}

		// load config.
		public static function load_config() {
			require_once CCT_HELPER_DIR_PATH . '/inc/config/framework.php';
			require_once CCT_HELPER_DIR_PATH . '/inc/config/metabox.php';
		}

		// load helper.
		public function load_helper() {
			require_once CCT_HELPER_DIR_PATH . '/inc/func/base.php';
			require_once CCT_HELPER_DIR_PATH . '/inc/func/post-type.php';
			require_once CCT_HELPER_DIR_PATH . '/inc/func/helpers.php';
			require_once CCT_HELPER_DIR_PATH . '/inc/func/hooks.php';
			require_once CCT_HELPER_DIR_PATH . '/inc/func/filter.php';

			// load elementor
			require_once CCT_HELPER_DIR_PATH . '/inc/func/elementor.php';
		}
	}

	new CCT_Helper();
}