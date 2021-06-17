<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

class CCT_Elementor_Widget_Single_Product_Theme_Text_Image extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cct_single_product_theme_text_image';
    }

    public function get_title()
    {
        return esc_html__('Theme Text Image', 'cct-helper');
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
            'image_small',
            [
                'label' => esc_html__('Image Small', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'show_icon',
            [
                'label' => esc_html__( 'Show Icon', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'cct-helper' ),
                'label_off' => esc_html__( 'Hide', 'cct-helper' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'text_icon',
            [
                'label' => esc_html__( 'Text', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '10+', 'cct-helper' ),

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
                'selector' => '{{WRAPPER}} .theme-title h1',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('title Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#303030',
                'selectors'	=> [
                    '{{WRAPPER}} .theme-title ' => 'color: {{VALUE}}'
                ]
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
                'selector' => '{{WRAPPER}} .theme-desc p',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#707070',
                'selectors'	=> [
                    '{{WRAPPER}} .theme-desc' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .theme-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_img',
            [
                'label' => esc_html__( 'Image', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_img',
            [
                'label'		=> esc_html__('BG Image Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors'	=> [
                    '{{WRAPPER}} .theme-image' => 'background-color: {{VALUE}}'
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
                    '{{WRAPPER}} .theme-image-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_icon',
            [
                'label' => esc_html__( 'Image', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_icon',
            [
                'label'		=> esc_html__('BG Icon Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#219CEB',
                'selectors'	=> [
                    '{{WRAPPER}} .theme-icon' => 'background-color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => esc_html__('Icon Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .theme-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {

        $settings = $this->get_settings_for_display();
        $html = array();
        $html[] = '<div class="cct-elementor-single-product-theme-text-image ">';
        $html[] = '<div class="item-content">';

        $html[] = '<div class="theme-title">';
        $html[] = '<h1>'.$settings['title_theme'].'</h1>';
        $html[] = '</div>';

        $html[] = '<div class="theme-desc">';
        $html[] = '<p>'.$settings['desc_theme'].'</p>';
        $html[] = '</div>';

        $html[] = '<div class="theme-image">';
        $html[] = '<div class="theme-image-inner">';
        $html[] =  '<img src="' . $settings['image_theme']['url'] . '">';
        $html[] = '</div>';
        if($settings['image_small']){
            $html[] = '<div class="theme-image-icon">';
            $html[] =  '<img src="' . $settings['image_small']['url'] . '">';
            $html[] = '</div>';
        }
        if($settings['show_icon']){
            $html[] = '<div class="theme-icon">';
            $html[] = '<p>'.$settings['text_icon'].'</p>';
            $html[] = '</div>';
        }
        $html[] = '</div>';

        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}