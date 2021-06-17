<?php


use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class CCT_Elementor_Widget_Product_Category extends \Elementor\Widget_Base {
	public function get_name() {
		return 'cct_product_category';
	}

	public function get_title() {
		return esc_html__('Product Category', 'cct-helper');
	}

	public function get_icon() {
		return 'eicon-products';
	}

	public function get_categories() {
		return ['cct-base'];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_product_category',
			[
				'label' => __( 'Settings', 'cct-helper'),
			]
		);

		$this->add_control(
			'menu',
			[
				'label' => __( 'Shop Menu', 'cct-helper'),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => cct_list_menu_registered()
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		global $wp_query, $product;
		$product_cat = isset($_GET['product_cat']) ? sanitize_text_field($_GET['product_cat']) : 'all';
		$settings = $this->get_settings_for_display();
		echo '<div class="content-product-category">
			<div class="btn-control-category">';
				wp_nav_menu( array(
					'theme_location' => $settings['menu'],
					'menu_class'     => 'main-' . $settings['menu'],
					'container'      => '',
					'link_before'    => '<span class="cct-link-inner filter_list">',
					'link_after'     => '</span>',
                    'walker'         => new Product_Category_Nav_Walker(),
				) );
			echo '</div>';
			echo '<div class="row list-new product-cate">';
				$args1 = array( 'post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1 );
				if ( $product_cat != 'all' ) {
					$args1['product_cat'] = $product_cat;
				}
				$products = new WP_Query( $args1 );
				$total = $products->found_posts;
				$post_per_page = wc_get_default_products_per_row() * wc_get_default_product_rows_per_page();
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => $post_per_page
				);
				if ( $product_cat != 'all' ) {
					$args['product_cat'] = $product_cat;
				}
				$getposts = new WP_query($args);
				$wp_query->in_the_loop = true;
				while ($getposts->have_posts()) : $getposts->the_post();
				$add_cart = wc_get_product(get_the_ID());
				$x= get_post_meta( get_the_ID(), 'show_link_view_demo', true );
				$price = get_post_meta( get_the_ID(), '_regular_price',true);
				echo
				'<div class="col-lg-4 col-md-6 col-sm-12 style-cate">
					<div class="inner">
						<div class="border"> '.woocommerce_get_product_thumbnail().'
							<div class="icon">
								<div class="icon-cart">
	
									<a href="'.$add_cart->add_to_cart_url().'"><i class="bi bi-cart3"></i>

</a>
								</div>
		
								<div class="icon-link">
									<a href="' . get_permalink() . '"><svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0)">
<path fill-rule="evenodd" clip-rule="evenodd" d="M19.4184 15.3725L16.8067 12.7879C16.7204 12.7016 16.6178 12.633 16.505 12.5863C16.3922 12.5396 16.2713 12.5155 16.1492 12.5155C16.027 12.5155 15.9061 12.5396 15.7933 12.5863C15.6805 12.633 15.578 12.7016 15.4916 12.7879C15.4054 12.8726 15.3369 12.9736 15.2902 13.0851C15.2434 13.1966 15.2193 13.3162 15.2193 13.4371C15.2193 13.558 15.2434 13.6777 15.2902 13.7891C15.3369 13.9006 15.4054 14.0017 15.4916 14.0864L18.1033 16.6771C18.4043 16.9738 18.6433 17.3273 18.8064 17.7171C18.9695 18.1069 19.0536 18.5254 19.0536 18.9479C19.0536 19.3705 18.9695 19.7889 18.8064 20.1787C18.6433 20.5685 18.4043 20.922 18.1033 21.2187C17.492 21.822 16.6677 22.1602 15.8088 22.1602C14.95 22.1602 14.1257 21.822 13.5144 21.2187L8.59131 16.3449C8.29086 16.0479 8.05232 15.6943 7.88952 15.3045C7.72672 14.9147 7.64289 14.4965 7.64289 14.0741C7.64289 13.6516 7.72672 13.2334 7.88952 12.8436C8.05232 12.4538 8.29086 12.1003 8.59131 11.8033C9.07867 11.3188 9.70759 11.0019 10.387 10.8987C10.507 10.8815 10.6223 10.8408 10.7264 10.7788C10.8306 10.7169 10.9214 10.6348 10.9936 10.5376C11.0659 10.4403 11.1182 10.3297 11.1475 10.2121C11.1767 10.0946 11.1824 9.97233 11.1642 9.85254C11.1254 9.6096 10.9923 9.39184 10.7937 9.24662C10.5951 9.1014 10.3472 9.04048 10.1039 9.07715C9.03463 9.23965 8.04452 9.73744 7.27624 10.4987C6.80327 10.9663 6.42777 11.5231 6.1715 12.1368C5.91523 12.7505 5.78327 13.409 5.78327 14.0741C5.78327 14.7392 5.91523 15.3976 6.1715 16.0113C6.42777 16.6251 6.80327 17.1819 7.27624 17.6495L12.1993 22.5171C13.1604 23.4673 14.4574 24.0001 15.8088 24.0001C17.1603 24.0001 18.4573 23.4673 19.4184 22.5171C19.892 22.0505 20.2681 21.4944 20.5248 20.8812C20.7815 20.2679 20.9137 19.6097 20.9137 18.9449C20.9137 18.28 20.7815 17.6218 20.5248 17.0085C20.2681 16.3952 19.892 15.8391 19.4184 15.3725ZM2.81039 7.32332C2.50926 7.02676 2.27013 6.67327 2.10691 6.28343C1.94368 5.89359 1.85962 5.47514 1.85962 5.05251C1.85962 4.62987 1.94368 4.21151 2.10691 3.82166C2.27013 3.43182 2.50926 3.07833 2.81039 2.78178C3.42168 2.17849 4.24599 1.84022 5.10485 1.84022C5.96371 1.84022 6.78802 2.17849 7.39931 2.78178L12.3224 7.64949C12.7446 8.06915 13.0416 8.59799 13.1801 9.17691C13.3187 9.75583 13.2934 10.3619 13.107 10.9273C12.9206 11.4926 12.5805 11.9949 12.1247 12.3779C11.669 12.7608 11.1157 13.0094 10.5267 13.0956C10.2988 13.1331 10.0932 13.2547 9.95061 13.4364C9.80797 13.618 9.73862 13.8466 9.75624 14.0768C9.77386 14.3071 9.87717 14.5224 10.0458 14.6803C10.2144 14.8381 10.4361 14.9271 10.667 14.9295C10.7148 14.9284 10.7625 14.9243 10.8098 14.9171C11.8789 14.7542 12.8689 14.2566 13.6375 13.4956C14.1102 13.0285 14.4855 12.4722 14.7416 11.859C14.9978 11.2458 15.1297 10.5879 15.1297 9.9233C15.1297 9.25874 14.9978 8.60081 14.7416 7.9876C14.4855 7.37439 14.1102 6.81806 13.6375 6.35096L8.71439 1.47716C7.75329 0.527017 6.45632 -0.00585938 5.10485 -0.00585938C3.75338 -0.00585938 2.4564 0.527017 1.49531 1.47716C1.02167 1.94437 0.645584 2.501 0.388888 3.11478C0.132192 3.72856 0 4.38721 0 5.05251C0 5.7178 0.132192 6.37646 0.388888 6.99023C0.645584 7.60401 1.02167 8.16072 1.49531 8.62793L4.10639 11.2125C4.28225 11.3841 4.51822 11.4802 4.76393 11.4802C5.00963 11.4802 5.2456 11.3841 5.42146 11.2125C5.50787 11.1273 5.57648 11.0257 5.62331 10.9138C5.67014 10.8018 5.69425 10.6816 5.69425 10.5602C5.69425 10.4389 5.67014 10.3187 5.62331 10.2067C5.57648 10.0948 5.50787 9.99314 5.42146 9.9079L2.81039 7.32332Z" fill="#219CEB"/>
</g>
<defs>
<clipPath id="clip0">
<rect width="20.9231" height="24" fill="white"/>
</clipPath>
</defs>
</svg>



 </a>
								</div>
								<div class="icon-demo tooltip">
									<a href="'.$x.'" data-toggle="tooltip"><i class="bi bi-box-arrow-up-right"></i></a>
									<span class="tooltiptext">Live Demo</span>
									<span class="tooltiptext tamgiac"></span>
								</div>
							</div>
						</div>
						<div class="bottom">
							<div class="title">
								<a href="'. get_permalink() .'">'. get_the_title() .'</a>
							</div>
							<div class="price-content">
								<span class="dv">'.get_woocommerce_currency_symbol().'</span><span class="price"> '.$price.'</span>
							</div>
						</div>
					</div>
				</div>';
				endwhile; wp_reset_postdata();
				if ( $post_per_page < $total ) {
					echo '<div class="btn-load">
        				<button data-paged="1" class="load-more-pc">'.cct_get_option('cct_product_category_load_more').' <i class="fal fa-spinner-third fa-spin"></i></button>
    				</div>';
				}
			echo '</div>';
		echo '</div>';
	}
}
