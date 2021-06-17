<?php

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Description extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_des';
    }

    public function get_title()
    {
        return esc_html__('Description', 'cct-helper');
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
            'section_desc',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('Type your description here', 'cct-helper'),
                'default' => 'Lorem ipsum dolosit amet .'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Description','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .item-desc p',
            ]
        );



        $this->add_control(
            'color_content',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-desc p' => 'color: {{VALUE}}'
                ]
            ]
        );




        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $html = array();

        $html[] = '<div class="lrewards-elementor-text-des lrewards-shortcode "><div class="lrewards-inner">';

        $html[] = '<div class="item-content_des">';

        if ($settings['description']){
            $html[] = '<div class="item-desc">'.$settings['description'].'</div>';

        }
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }

}
