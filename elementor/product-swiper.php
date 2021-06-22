<?php

use Elementor\Controls_Manager;
$patch	= CCT_HELPER_DIR_PATH . 'elementor';
require_once $patch . '/product-base.php';

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CCT_Elementor_Widget_Products_Swiper extends CCT_Elementor_Widget_Products_Base
{

    public function get_name()
    {
        return 'ribeto-products-swiper';
    }

    public function get_title()
    {
        return __('Ribeto Products Swiper', 'ribeto-helper');
    }

    public function get_icon()
    {
        return 'eicon-posts-carousel';
    }

    public function get_categories()
    {
        return ['ribeto-base'];
    }

    protected function _register_controls() {
        $this->_register_controls_swiper();
        $this->_register_controls_custom_query();
        parent::_register_controls();
    }

    protected function _register_controls_swiper() {
        $this->start_controls_section(
            'swiper_settings',
                [
                    'label' => __('Swiper','ribeto-helper'),
                ]
            );
        $this->add_responsive_control(
            'slides_per_view',
            [
                'label' => __('Slides Per View', 'ribeto-helper'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 4,
                'tablet_default' => 2,
                'mobile_default' => 1,
            ]
        );
        $this->end_controls_section();
    }

    protected function _register_controls_custom_query() {
        $this->start_controls_section(
            'ctwp_products_custom_query',
            [
                'label' => __('Custom Query', 'ribeto-helper'),
            ]
        );

        $this->add_control(
            'custom_products',
            [
                'label' => __('Custom Products', 'ribeto-helper'),
                'label_block' => true,
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => ctwpGetAllPostsSelect2('product'),
                'default' => array(),
                'separator' => 'before',
            ]
        );   
        
        $this->add_control(
            'categories',
            [
                'label' => __('Categories', 'ribeto-helper'),
                'label_block' => true,
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => ctwpGetAllCategoriesSelect2('product_cat'),
                'default' => array(),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'featured',
            [
                'label' => __('Featured', 'ribeto-helper'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'no' => __('No', 'ribeto-helper'),
                    'yes' => __('Yes', 'ribeto-helper'),
                ],
                'default' => 'no',
                'frontend_available' => true,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $this->ctwp_query_product(true);
    }
}
// \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new CCT_Elementor_Widget_Products_Swiper());