<?php

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
/**
 * Created by Truong.
 * User: Truong
 * Date: 29/4/2021
 * Time: 11:15 AM
 */
class CCT_Elementor_Widget_Banner extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_banner_home';
    }

    public function get_title()
    {
        return esc_html__('Banner Home', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-text';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'cct-helper' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'widget_title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Design, Build & Launch Professiona Ecommerce Websites - Without Coding', 'cct-helper' ),
                'placeholder' => esc_html__('Type your title banner', 'cct-helper'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link button', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );
        $this->add_control(
            'item_description',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'As a leading provider of outstanding ecommerce website themes for Magento, Shopify, WooCommerce, Wordpress, etc, our multipurpose & responsive themes are fully customizable and suitable for e-commerce websites of any purpose with modern design and great functionality.', 'cct-helper' ),
                'placeholder' => esc_html__( 'Type your description here', 'cct-helper' ),
            ]
        );
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__( 'Button Title', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Browser Themes', 'cct-helper' ),
            ]
        );


        $this->end_controls_section();
        $this->start_controls_section(
            'content_section_2',
            [
                'label' => esc_html__( 'Images', 'cct-helper' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Add Images', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
//        $this->add_control(
//            'color_content',
//            [
//                'label'		=> esc_html__('Banner Color', 'cct-helper'),
//                'type'		=> \Elementor\Controls_Manager::COLOR,
//                'default'   => '#1367FD',
//                'selectors'	=> [
//                    '{{WRAPPER}} .cct-elementor-banner-home' => 'background-color: {{VALUE}}'
//                ]
//            ]
//        );
        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .main-title h1',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Title Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .main-title h1' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_desc',
            [
                'label' => esc_html__( 'Desc', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'selector' => '{{WRAPPER}} .item-desc p',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-desc p' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();

        $html[] = '<div class="cct-elementor-banner-home cct-shortcode container">';
        $html[] = '<div class="item-content row">';
        $html[] = '<div class="item-content-inner-1 col-lg-5">';
        if ($settings['widget_title']) {
            $html[] = '<div class="main-title">';
                $html[] = '<h1>';
                $html[] = $settings['widget_title'];
                $html[] = '</h1>';
            $html[] = '</div>';
        }
        if ($settings['item_description']) {
            $html[] = '<div class="item-desc"><p>' . $settings['item_description'] . '</p></div>';
        }
        if ($settings['button_title']) {
            $html[] = '<div class="button-title">';
            if ($settings['link']) {
                $html[] = '<a href="' . $settings['link'] . '">';
            }

            $html[] = $settings['button_title'];

            if ($settings['link']) {
                $html[] = '</a>';
            }

            $html[] = '</div>';
        }
        $html[] = '</div>';
        $html[] = '<div class="item-content-inner-2 col-lg-7">';
        $html[] =  '<img src="' . $settings['image']['url'] . '">';
        $html[] = '</div>';
        $html[] = '</div>';


        echo implode('', $html);
    }
}