<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

class CCT_Widget_Text_Image_Buttom extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'text_image_buttom';
    }

    public function get_title()
    {
        return esc_html__('Text_Image_Buttom', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-image';

    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_image',
            [
                'label' =>esc_html__('Image', 'cct-helper'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' =>esc_html__('Choose Image', 'cct-helper'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_image',
            [
                'label' =>esc_html__('Image', 'cct-helper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' =>esc_html__('Width', 'cct-helper'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'space',
            [
                'label' =>esc_html__('Max Width', 'cct-helper'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'height',
            [
                'label' =>esc_html__('Height', 'cct-helper'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' =>esc_html__('Border Radius', 'cct-helper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_title',
            [
                'label' =>esc_html__('Title', 'cct-helper'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' =>esc_html__('Title', 'cct-helper'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' =>esc_html__('Enter your title', 'cct-helper'),
                'default' =>esc_html__('Add Your Heading Text Here', 'cct-helper'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' =>esc_html__('Title', 'cct-helper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align_title',
            [
                'label' =>esc_html__('Alignment', 'cct-helper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>esc_html__('Left', 'cct-helper'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>esc_html__('Center', 'cct-helper'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>esc_html__('Right', 'cct-helper'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' =>esc_html__('Justified', 'cct-helper'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' =>esc_html__('Text Color', 'cct-helper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' =>esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .title h2',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_editor',
            [
                'label' =>esc_html__('Text Editor', 'cct-helper'),
            ]
        );

        $this->add_control(
            'editor',
            [
                'label' => '',
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<p>' .esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'cct-helper') . '</p>',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' =>esc_html__('Text Editor', 'cct-helper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'text-align',
            [
                'label' =>esc_html__('Alignment', 'cct-helper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>esc_html__('Left', 'cct-helper'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>esc_html__('Center', 'cct-helper'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>esc_html__('Right', 'cct-helper'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' =>esc_html__('Justified', 'cct-helper'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .text_editor' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' =>esc_html__('Text Color', 'cct-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .text_editor p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [

                'name' => 'text_typography',
                'label' =>esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .text_editor p',

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button',
            [
                'label' =>esc_html__('Button', 'cct-helper'),
            ]
        );


        $this->add_control(
            'text_button',
            [
                'label' =>esc_html__('Text', 'cct-helper'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' =>esc_html__('Click here', 'cct-helper'),
                'placeholder' =>esc_html__('Click here', 'cct-helper'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' =>esc_html__('Link', 'cct-helper'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' =>esc_html__('https://your-link.com', 'cct-helper'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_button',
            [
                'label' =>esc_html__('Button', 'cct-helper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align_button',
            [
                'label' =>esc_html__('Alignment', 'cct-helper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' =>esc_html__('Left', 'cct-helper'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' =>esc_html__('Center', 'cct-helper'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' =>esc_html__('Right', 'cct-helper'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' =>esc_html__('Justified', 'cct-helper'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .button' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'selector' => '{{WRAPPER}} .button a',
            ]
        );


        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' =>esc_html__('Normal', 'cct-helper'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' =>esc_html__('Text Color', 'cct-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .button a' => 'fill: {{VALUE}}; color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' =>esc_html__('Background', 'cct-helper'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .button a',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
//
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' =>esc_html__('Hover', 'cct-helper'),
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' =>esc_html__('Text Color', 'cct-helper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button a:hover, {{WRAPPER}}  .button ar:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  .button a:hover svg, {{WRAPPER}}  .button a:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background_hover',
                'label' =>esc_html__('Background', 'cct-helper'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}}  .button a:hover, {{WRAPPER}} . .button a:focus',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' =>esc_html__('Border Color', 'cct-helper'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}}  .button a:hover, {{WRAPPER}} .button a:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' =>esc_html__('Hover Animation', 'cct-helper'),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .button a',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' =>esc_html__('Border Radius', 'cct-helper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_padding',
            [
                'label' =>esc_html__('Padding', 'cct-helper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();
        $html[] ='<div class="cct_widget_text_image_buttom">';

        $html[] ='<div class="inner">';

        $html[] ='<div class="title"><h2>'.$settings['title'].'</h2>';
        $html[] ='</div>';
        $html[] ='<div  class="text_editor">'.$settings['editor'];
        $html[] ='</div>';
        $html[] ='<div class="button">';
        $html[] = '<a href="' . $settings['link']['url'] . '">';
        $html[] = $settings['text_button'];
        $html[] = '</a>';
        $html[] ='</div>';
        $html[] ='</div>';

        $html[] ='<div class="images">';
        $html[] = '<img src="' . $settings['image']['url'] . '">';
        $html[] ='</div>';



        $html[] ='</div>';
        echo implode('', $html);
    }
}