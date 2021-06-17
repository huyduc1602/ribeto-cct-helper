<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Link_Download extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cct_link_download';
    }

    public function get_title()
    {
        return esc_html__('Button Link Download', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-button';
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
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Download', 'cct-helper' ),

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
                'label' => esc_html__( 'Button', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_button',
            [
                'label'		=> esc_html__('Button Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#219CEB',
                'selectors'	=> [
                    '{{WRAPPER}} .item-content-inner ' => 'background-color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_text',
            [
                'label' => esc_html__( 'Button Text', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_text',
                'selector' => '{{WRAPPER}} .item-content-inner a',
            ]
        );
        $this->add_control(
            'color_text',
            [
                'label'		=> esc_html__('Text Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFFFFF',
                'selectors'	=> [
                    '{{WRAPPER}} .item-content-inner a' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        global $product;
        $settings = $this->get_settings_for_display();
        $html = array();
        $linkdownload = $product->get_downloads();
        $html[] = '<div class="cct-elementor-button-link-download">';
        $html[] = '<div class="item-content">';
        if(!empty($linkdownload)) {
            foreach ($linkdownload as $key => $each_download) {
                $html[] = '<div class="item-content-inner">';
                $html[] = '<a  href="' . $each_download["file"] . '">' . $settings['button_text']  .'</a>';
                $html[] = '</div>';
            }
        }
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}