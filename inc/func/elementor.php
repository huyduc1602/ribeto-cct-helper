<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/7/2020
 * Time: 2:24 PM
 */

if (!class_exists('CCT_Elementor')) {
	class CCT_Elementor {
		public function __construct() {
			add_action('elementor/elements/categories_registered', array(__CLASS__, 'create_elementor_categories'), 99);
			add_action('elementor/widgets/widgets_registered', array(__CLASS__, 'remove_default_widget'), 15);
			add_action('elementor/widgets/widgets_registered', array(__CLASS__, 'init_widgets'));
		}

		static public function create_elementor_categories($elements_manager) {
			$elements_manager->add_category(
				'cct-base',
				[
					'title' => esc_html__('CCT Base', 'cct-helper'),
					'icon' => 'fa fa-plug',
				]
			);
            $elements_manager->add_category(
                'ribeto-base',
                [
                    'title' => esc_html__('Ribeto', 'ribeto-helper'),
                    'icon' => 'fa fa-plug',
                ]
            );

    }

		public static function remove_default_widget($widget_manager) {
			//$widget_manager->unregister_widget_type('button');
		}

		public static function init_widgets() {
			$patch	= CCT_HELPER_DIR_PATH . 'elementor';


			// Load list widgets
            require_once $patch . '/info-heading.php';
            require_once $patch . '/info-other.php';
            require_once $patch . '/form-field.php';
            require_once $patch . '/accordion-custom.php';
            require_once $patch . '/text-image-button.php';
            require_once $patch . '/huy-text-editor.php';

            require_once $patch . '/banner-home.php';
            require_once $patch . '/logo-image.php';
            require_once $patch . '/text-h3.php';
            require_once $patch . '/product-home.php';
            require_once $patch . '/icon-text.php';
            require_once $patch . '/map.php';
            require_once $patch . '/product-query-home.php';

            require_once $patch . '/single-product-button-link-download.php';
            require_once $patch . '/single-product-button-add-to-cart.php';
            require_once $patch . '/single-product-theme-text-image.php';
            require_once $patch . '/single-product-icon-text.php';

            require_once $patch .'/image.php';
            require_once $patch . '/text.php';
            require_once $patch . '/description.php';
            require_once $patch . '/accordion.php';
            require_once $patch . '/text-contact-about.php';
            require_once $patch . '/testimonial.php';
            require_once $patch . '/text-image-icon.php';

            require_once $patch . '/our-title.php';
            require_once $patch . '/our-text-content.php';
            require_once $patch . '/our-let-get-start.php';
            require_once $patch . '/our-footer-mail.php';
            require_once $patch . '/our-repeat-icon.php';
            require_once $patch . '/our-progress-bar.php';

			require_once $patch . '/archive-product.php';

            require_once $patch . '/about_us_table.php';

            require_once $patch . '/how-to-buy-page.php';
            //Widget Ribeto
            require_once $patch . '/how-to-shopping.php';
            require_once $patch . '/slider.php';
            require_once $patch . '/banner-box.php';
            require_once $patch . '/product-base.php';
            require_once $patch . '/product-swiper.php';
            require_once $patch . '/faqs.php';
            require_once $patch . '/contact-fileds.php';

			// Register widget
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ CCT_Widget_Info_Headding());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ CCT_Widget_Info_Other());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ CCT_Widget_Form_Field());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ CCT_Widget_Accordion_Custom());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ CCT_Widget_Text_Image_Buttom());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \ CCT_Widget_Huy_Text_Editor());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Text());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Image());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Text_About());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Description());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Text_Image_Icon());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Accordion());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Testimonial_Carousel());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Banner());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Logo_Image());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Text_H3());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Product_Home());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Icon_Text());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Map());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Product_Query_Home());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Link_Download());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Add_To_Cart());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Single_Product_Theme_Text_Image());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Single_Product_Icon_Text());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Our_Service_Title_Our());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Our_Service_Text_Content());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Our_Service_Let_Get_Start());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Our_Service_Footer_Mail());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Progress_Bar());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Our_Widget_Repeat_Icon());

			\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Product_Category());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_About_Us_Table());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_How_To_Buy());
            //Widget Ribeto
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_How_To_Shopping());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Slider());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Banner_Box());
            // \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Products_Base());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Products_Swiper());

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_FAQS());
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CCT_Elementor_Widget_Contact());

        }
	}

	new CCT_Elementor();
}

