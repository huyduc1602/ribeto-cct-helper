<?php


use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Add_To_Cart extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cct_add_to_cart';
    }

    public function get_title()
    {
        return esc_html__('Button Add To Cart', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Buy Now', 'cct-helper'),

            ]
        );
        $this->add_control(
            'button_text_2',
            [
                'label' => esc_html__('Before Text', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Just', 'cct-helper'),

            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_button',
            [
                'label' => esc_html__('Button Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#219CEB',
                'selectors' => [
                    '{{WRAPPER}} .button-buy-now ' => 'background-color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_text',
            [
                'label' => esc_html__('Button Text', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_text',
                'selector' => '{{WRAPPER}} .button-buy-now',
            ]
        );
        $this->add_control(
            'color_text',
            [
                'label' => esc_html__('Text Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .button-buy-now' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
//        global $product;
//        $product = wc_get_product();
//        $settings = $this->get_settings_for_display()
//        ?>
<!--        <div id="product---><?php //the_ID(); ?><!--" --><?php //wc_product_class( '', $product ); ?><!-->-->
<!--        <form class="cart" action="--><?php //echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?><!--" method="post" enctype='multipart/form-data'>-->
<!--                <button type="submit" name="add-to-cart" value="--><?php //echo esc_attr( $product->get_id() ); ?><!--" class="button-buy-now">-->
<!--                    --><?php //echo esc_html__('Just ', 'cct'); ?>
<!--                    --><?php //echo get_woocommerce_currency_symbol().get_post_meta( get_the_ID(), '_regular_price', true ); ?>
<!--                    <span>--><?php //echo $settings['button_text']; ?><!--</span>-->
<!--                </button>-->
<!--         </form>-->
<!--        </div>-->
        <?php
    }
}