<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Created by Truong.
 * User: Truong
 * Date: 4/5/2021
 * Time: 11:15 AM
 */
class CCT_Elementor_Widget_Text_H3 extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_text_h3';
    }

    public function get_title()
    {
        return esc_html__('Text H3', 'cct-helper');
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
            'title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Featured Magento Themes', 'cct-helper' ),
                'placeholder' => esc_html__('Type your title banner', 'cct-helper'),
            ]
        );
        $this->add_control(
            'item_description',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your description here', 'cct-helper' ),
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
                'selector' => '{{WRAPPER}} .item-content h3',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Title Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-content h3' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Title Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
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
                'selector' => '{{WRAPPER}} .item-content p',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-content p' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();
        $html[] = '<div class="cct-elementor-text-h3 cct-shortcode ">';
        $html[] = '<div class="item-content">';
        $html[] = '<h3>'.$settings['title'].'</h3>';
        $html[] = '<p>'.$settings['item_description'].'</p>';
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}