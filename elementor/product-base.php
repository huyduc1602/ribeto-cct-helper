<?php
// https://www.gavick.com/blog/wp_query-woocommerce-products
// https://github.com/woocommerce/woocommerce/wiki/wc_get_products-and-WC_Product_Query
// https://sarathlal.com/custom-product-query-wp-query-woocommerce/
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CCT_Elementor_Widget_Products_Base extends Widget_Base
{
    public function get_name()
    {
        return 'cct-products-base';
    }

    public function get_categories()
    {
        return ['ribeto-base'];
    }

    protected function _register_controls()
    {
        $this->_register_controls_query();
        $this->_register_controls_styles();
    }   

    protected function _register_controls_query() {

        $this->start_controls_section(
            'query',
            [
                'label' => __('Query', 'ribeto-helper'),
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => __('Posts per page', 'ribeto-helper'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 4,
            ]
        );

        $this->end_controls_section();
    }

    protected function _register_controls_styles() {
        $this->start_controls_section(
            'box_text_style',
            [
                'label' => __('Box Text', 'ribeto-helper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'label' => __( 'Title', 'ribeto-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label' => __( 'Alignment', 'ribeto-helper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ribeto-helper'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ribeto-helper'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ribeto-helper'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'ribeto-helper'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_spacing_bottom',
            [
                'label' => __( 'Spacing', 'ribeto-helper'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'ribeto-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__title' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_1,
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '.elementor-ctwp_products-wrapper .woocommerce-loop-product__title',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );
        //Product Sku
       

        $this->add_control(
            'product_sku_heading',
            [
                'label' => __( 'Product Sku', 'ribeto-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'product_sku_color',
            [
                'label' => __( 'Color', 'ribeto-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#A7A7A7',
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__sku' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_1,
                ],
            ]
        );

        $this->add_control(
            'product_sku_size',
            [
                'label' => __( 'Font Size', 'ribeto-helper'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],        
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__sku' => 'font-size: {{SIZE}}px;'
                ],
            ]
        );

        $this->add_responsive_control(
            'product_code_spacing_bottom',
            [
                'label' => __( 'Spacing', 'ribeto-helper'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__sku' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        //Price
        $this->add_control(
            'price_heading',
            [
                'label' => __( 'Price', 'ribeto-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price Color', 'ribeto-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '#E83528',
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__price' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_1,
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_ins_typography',
                'selector' => '.elementor-ctwp_products-wrapper .woocommerce-loop-product__price',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_responsive_control(
            'price_spacing_bottom',
            [
                'label' => __( 'Spacing', 'ribeto-helper'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        //Stock
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '.elementor-ctwp_products-wrapper .woocommerce-loop-product__stock',
                'scheme' => Schemes\Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_control(
            'stock_heading',
            [
                'label' => __( 'Stock', 'ribeto-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'stock_color',
            [
                'label' => __( 'Color', 'ribeto-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__stock' => 'color: {{VALUE}};',
                ],
                'scheme' => [
                    'type' => Schemes\Color::get_type(),
                    'value' => Schemes\Color::COLOR_1,
                ],
            ]
        );

        $this->add_control(
            'stock_size',
            [
                'label' => __( 'Font Size', 'ribeto-helper'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],        
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 30,
                    ],
                ],
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__stock' => 'font-size: {{SIZE}}px;'
                ],
            ]
        );

        $this->add_responsive_control(
            'inventory_spacing_bottom',
            [
                'label' => __( 'Spacing', 'ribeto-helper'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '.elementor-ctwp_products-wrapper .woocommerce-loop-product__stock' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

    }

    protected function ctwp_query_product($swiper = false) {
        $settings = $this->get_settings_for_display();
        $params = array(
            'posts_per_page' => $settings['limit'],
            'post_type' => array('product', 'product_variation'),
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => array('accessories','tshirts'), 
                ),
            ),
        );
        if (!empty($settings['categories'])) {
            $params = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $settings['categories'], 
                    ),
                ),
            );
        }
        if ($settings['featured']=='yes') {
            $params = array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'term_id',
                        'terms'    => 'featured',
                        'operator' => 'IN',
                    ),
                ),
            );
        }
        $wc_query = new WP_Query($params);
        $this->ctwp_template($wc_query,$swiper);
    }

    protected function ctwp_template($wc_query,$swiper) {
        $settings = $this->get_settings_for_display();
        ?>
            <div <?php echo isset($settings['slides_per_view_mobile']) ? 'data-limit-mobile='.$settings['slides_per_view_mobile'].' ' : ''; echo isset($settings['slides_per_view_tablet']) ? 'data-limit-tablet='.$settings['slides_per_view_tablet'] . ' ' : '';echo isset($settings['slides_per_view']) ? 'data-limit-desktop='.$settings['slides_per_view'] . ' ' : '' ?> class="elementor-ctwp_products-wrapper<?php echo ( $swiper == true ) ? " swiper swiper-container" : ""; ?>">
                <?php if ($swiper === true): ?>
                    <div class="swiper-wrapper">
                <?php else: ?>
                    <div class="container">
                    <div class="row">
                <?php endif; ?>
                    <?php if ($wc_query->have_posts()) :
                    while ($wc_query->have_posts()) :
                        $wc_query->the_post();
                        $product = wc_get_product( get_the_ID() );        
                        $sku =  $product->get_sku();  
                        $price =  $product->get_price(); 
                        $stock = $product->get_stock_quantity();

                        ?>
                        <div class="col-product <?php echo $product->get_type(); ?><?php echo ( $swiper === true ) ? ' swiper-slide' : ""; ?>">
                            <div class="item-product">
                                <?php echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">'; ?>
                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                                <?php echo '<h5 class="' . esc_attr( 'woocommerce-loop-product__sku' ) . '">' .$sku. '</h5>'; ?>
                                <?php echo '<h5 class="' . esc_attr( 'woocommerce-loop-product__title' ) . '">' . get_the_title() . '</h5>'; ?>
                                <div class="row">
                                    <?php echo '<h5 class="col-md-6 ' . esc_attr( 'woocommerce-loop-product__price' ) . '">' . $price . '???</h5>'; ?>
                                    <?php echo '<h5 class="col-md-6 ' . esc_attr( 'woocommerce-loop-product__stock' ) . '">????????????  ' . $stock . '</h5>'; ?>
                                </div>
                                <?php echo '</a>'; ?>
                                </div>
                        </div>
                    <?php
                        endwhile;
                            wp_reset_postdata();
                    else:  ?>
                        <p><?php _e( 'No Products' );?></p> 
                    <?php endif; ?>
                <?php if ($swiper === true): ?>
                    </div>
                    <div class="swiper-button-nav">
                        <div class="swiper-pagination"></div>
                        <button class="swiper-button-prev" style="background-image:none;width: 50px;height: 50px;background-color: #fff;border-radius: 50%;border:none;left:-12px"><i class="fas fa-arrow-left"></i></button>
                        <button class="swiper-button-next" style="background-image:none;width: 50px;height: 50px;background-color: #fff;border-radius: 50%;border:none;right:-15px"><i class="fas fa-arrow-right"></i></button>
                    </div>
                <?php else: ?>
                    </div>
                    </div>
                <?php endif; ?>
        </div>
        <?php
    }
}