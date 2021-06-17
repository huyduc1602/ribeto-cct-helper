<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

class CCT_Elementor_Widget_Single_Product_Icon_Text extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cct_single_product_icon_text';
    }

    public function get_title()
    {
        return esc_html__('Single Product Icon Text', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-favorite';
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
            'image_theme',
            [
                'label' => esc_html__('Choose Image', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'title_theme',
            [
                'label' => esc_html__( 'Title Theme', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Mobile-First Design', 'cct-helper' ),

            ]
        );
        $this->add_control(
            'desc_theme',
            [
                'label' => esc_html__( 'Description Theme', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Mobile-First Design', 'cct-helper' ),

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
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
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
                'name' => 'typography_title_theme',
                'selector' => '{{WRAPPER}} .item-content-inner-title h1',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('title Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#303030',
                'selectors'	=> [
                    '{{WRAPPER}} .item-content-inner-title ' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'img_padding',
            [
                'label' => esc_html__('Img Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .theme-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_desc',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'selector' => '{{WRAPPER}} .item-content-inner-desc p',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#707070',
                'selectors'	=> [
                    '{{WRAPPER}} .item-content-inner-desc' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => esc_html__('Desc Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-inner-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
    }
    protected function render() {

        $settings = $this->get_settings_for_display();
        $html = array();
        $html[] = '<div class="cct-elementor-single-product-icon-text ">';
        $html[] = '<div class="item-content">';

        $html[] = '<div class="theme-image">';
        $html[] =  '<img src="' . $settings['image_theme']['url'] . '">';
        $html[] = '</div>';

        $html[] = '<div class="item-content-inner">';
        $html[] = '<div class="item-content-inner-title">';
        $html[] = '<h1>'.$settings['title_theme'].'</h1>';
        $html[] = '</div>';

        $html[] = '<div class="item-content-inner-desc">';
        $html[] = '<p>'.$settings['desc_theme'].'</p>';
        $html[] = '</div>';
        $html[] = '</div>';


        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}

