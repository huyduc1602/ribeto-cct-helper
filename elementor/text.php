<?php
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/7/2020
 * Time: 2:32 PM
 */
class CCT_Elementor_Widget_Text extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_text';
    }

    public function get_title()
    {
        return esc_html__('Text ', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-text';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_title_label',
            [
                'label' => esc_html__('Title_label', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title_label',
            [
                'label' => esc_html__('Title_label', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolosit amet .'
            ]
        );
        $this->end_controls_section();

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
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolosit amet .'
            ]

        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_title_label',
            [
                'label' => esc_html__('Title_Label','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .title_label ',
            ]
        );


        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .title_label ' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .title_label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__('Title','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title1',
                'selector' => '{{WRAPPER}} .main-title',
            ]
        );


        $this->add_control(
            'color_title1',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .main-title ' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_general',
            [
                'label' => esc_html__('General','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'cct-helper'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'cct-helper'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'cct-helper'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'cct-helper'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .lrewards-elementor-text' => 'text-align: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();



    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $html = array();

        $html[] = '<div class="lrewards-elementor-text lrewards-shortcode lr-' . $settings['align'] . '"><div class="lrewards-inner">';

        $html[] = '<div class="item-content">';

        if ($settings['title_label']){
            $html[] = '<div class="title_label">'.$settings['title_label'].'</div>';

        }

        if ($settings['title']) {
            $html[] = '<div class="main-title">'.$settings['title'] .'</div>';
//			if ($settings['link']) {
//				$html[] = '<a href="' . $settings['link'] . '">';
//			}
        }
        $html[] = '</div>';
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);

    }

}
