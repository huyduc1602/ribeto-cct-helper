<?php
//ẩn một số menu không cần thiết
if ( ! function_exists( 'cct_remove_menu_not_use' ) ) {
	add_action( 'admin_menu', 'cct_remove_menu_not_use' );
	function cct_remove_menu_not_use() {
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'themes.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'wc-admin' );
	}
}

//ẩn menu maketing
add_filter( 'woocommerce_admin_features', function( $features ) {
	return array_values(
		array_filter( $features, function($feature) {
			return $feature !== 'marketing';
		} )
	);
} );
// ẩn menu analytics
add_filter( 'woocommerce_admin_disabled', '__return_true' );

//custom css admin area
if ( ! function_exists( 'cct_my_custom_css_admin_area' ) ) {
	add_action('admin_head', 'cct_my_custom_css_admin_area');
	function cct_my_custom_css_admin_area() {
		echo '<style>
		#toplevel_page_woocommerce{display: none}.parent-menu-check{top:auto!important;left:0px!important;position:relative!important}
  		</style>';
	}
}

//hide menu từ khóa và các thuộc tính của sản phẩm - admin area
if ( ! function_exists( 'cct_remove_menu_tag_attr_woo' ) ) {
	add_action('admin_menu', 'cct_remove_menu_tag_attr_woo');
	function cct_remove_menu_tag_attr_woo() {
		global $submenu;
		unset($submenu['edit.php?post_type=product'][16]);
		unset($submenu['edit.php?post_type=product'][17]);
	}
}

//remove metabox tag prodect
if ( ! function_exists( 'cct_remove_metabox_tag_prodect' ) ) {
	add_action( 'admin_menu', 'cct_remove_metabox_tag_prodect' );
	function cct_remove_metabox_tag_prodect() {
		remove_meta_box( 'tagsdiv-product_tag', 'product', 'side' );
	}
}

//add menu oreder, report, setting woo vào menu product
if ( ! function_exists( 'cct_add_menu_order_setting_report_woo' ) ) {
	if ( is_admin() ) {
		add_action( 'admin_menu', 'cct_add_menu_order_setting_report_woo', 100 );
	}
	function cct_add_menu_order_setting_report_woo() {
		add_submenu_page(
			'edit.php?post_type=product',
			esc_html__('Order Management', 'cct'),
			esc_html__('Order Management', 'cct'),
			'manage_woocommerce', // Required user capability
			'edit.php?post_type=shop_order',
		);
		add_submenu_page(
			'edit.php?post_type=product',
			__( 'Reports' ),
			__( 'Reports' ),
			'manage_woocommerce', // Required user capability
			'admin.php?page=wc-reports',
		);
		add_submenu_page(
			'edit.php?post_type=product',
			esc_html__('Setting', 'cct'),
			esc_html__('Setting', 'cct'),
			'manage_woocommerce', // Required user capability
			'admin.php?page=wc-settings',
		);
		//remove_menu_page('woocommerce');
	}
}

//custom css active menu admin
add_action( 'admin_print_scripts', function() {
	//menu report woo
	$page_cr = $_GET['page'];
	if($page_cr == 'wc-reports' ){
		echo <<<'EOT'
	<script type="text/javascript">
	jQuery(function($){
		$('#menu-posts-product ul li:nth-child(6)').addClass('current');
		$('#menu-posts-product ul li:nth-child(6)').parent().addClass('parent-menu-check');
		$('#menu-posts-product ul li:nth-child(7)').removeClass('current');
		$('.parent-menu-check').siblings().addClass('wp-has-current-submenu').removeClass('wp-not-current-submenu');
		$('#menu-posts-product').removeClass('wp-not-current-submenu').addClass('wp-has-current-submenu');
	});
	</script>
	EOT;
	}

	//menu setting woo
	if($page_cr == 'wc-settings' ){
		echo <<<'EOT'
	<script type="text/javascript">
	jQuery(function($){
		$('#menu-posts-product ul li:nth-child(7)').addClass('current');
		$('#menu-posts-product ul li:nth-child(7)').parent().addClass('parent-menu-check');
		$('#menu-posts-product ul li:nth-child(6)').removeClass('current');
				$('.parent-menu-check').siblings().addClass('wp-has-current-submenu').removeClass('wp-not-current-submenu');
		$('#menu-posts-product').removeClass('wp-not-current-submenu').addClass('wp-has-current-submenu');
	});
	</script>
	EOT;
	}
}, PHP_INT_MAX );
