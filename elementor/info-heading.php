<?php


use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Widget_Info_Headding extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'info_heading';
    }

    public function get_title()
    {
        return esc_html__('Infomation Headding', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-t-letter';

    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Add Your Title Text Here', 'cct-helper'),
                'placeholder' => esc_html__('Enter your title', 'cct-helper'),
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Title Text', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Add Your Title Text Here', 'cct-helper'),
                'placeholder' => esc_html__('Enter your title', 'cct-helper'),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => esc_html__('Number Phone', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('+ 804 463 235 897', 'cct-helper'),
                'placeholder' => esc_html__('Enter Number Phone ', 'cct-helper'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '\'section_style_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .info_heading h2',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info_heading h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'heading_title_text',
            [
                'label' => esc_html__('Title Text', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title_text',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .info_heading h1',
            ]
        );

        $this->add_control(
            'color_title_text',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info_heading h1' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'heading_title_phone',
            [
                'label' => esc_html__('Phone', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_phone',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .info_heading p',
            ]
        );

        $this->add_control(
            'color_phone',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info_heading p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $html = array();
        $html[] = '<div class="cct_widget_info-heading ">';
        $html[] = '<div class="info_heading">';
        if ($settings['title']) {
            $html[] = '<h2>' . $settings['title'] . '</h2>';
        }
        if ($settings['title1']) {
            $html[] = '<h1>' . $settings['title1'] . '</h1>';
        }
        if ($settings['phone']) {
            $html[] = '<p>' . $settings['phone'] . '</p>';
        }
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }


}