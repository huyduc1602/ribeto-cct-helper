<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_About_Us_Table extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_about_us_table';
    }

    public function get_title()
    {
        return esc_html__('About Us Table', 'cct-helper');
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Stunning Design', 'cct-helper'),
            ]
        );
        $repeater->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We offer beautiful and unique themes to help you build a website with professional layouts and amazing look for your bussiness.', 'cct-helper'),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => __( 'Repeater List', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__( 'Title #1', 'cct-helper' ),
                        'desc'  => esc_html__( 'Desc #1', 'cct-helper' ),
                    ],
                    [
                        'title' => esc_html__( 'Title #2', 'cct-helper' ),
                        'desc'  => esc_html__( 'Desc #2', 'cct-helper' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                'selector' => '{{WRAPPER}} .item-content-table-title',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'     => esc_html__('Title Product Color', 'cct-helper'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item-content-table-title' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_title_desc',
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
                'selector' => '{{WRAPPER}} .item-content-table-desc',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'     => esc_html__('Desc Color', 'cct-helper'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item-content-table-desc' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();
        $html[] = '<div class="cct-elementor-about-table">';
        $html[] = '<div class="item-content-table">';
        $html[] = '<div class="row">';

        foreach (  $settings['list'] as $item ) {

            $html[] = '<div class="item-about-table-title col-3">';
            $html[] =  '<div class="item-content-table-title">'.$item['title'].'</div>';
            $html[] = '</div>';

            $html[] = '<div class="item-about-table-desc col-9">';
            $html[] =  '<div class="item-content-table-desc">'.$item['desc'].'</div>';
            $html[] = '</div>';

        }
        $html[] = '</div>';
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}
