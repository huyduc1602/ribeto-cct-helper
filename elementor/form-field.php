<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

class CCT_Widget_Form_Field extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'form';
    }

    public function get_title()
    {
        return esc_html__('Form', 'cct-helper');
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

        $this->end_controls_section();

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Form field', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_label', [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title Name', 'cct-helper'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_placeholder', [
                'label' => esc_html__('Placeholder', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Title', 'cct-helper'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'list',
            [
                'label' => esc_html__('Form Name', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_label' => esc_html__('Title Name', 'cct-helper'),
                    ],
                    [
                        'list_label' => esc_html__('Title Name', 'cct-helper'),
                    ],

                ],
                'title_field' => '{{{ list_label }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '\'section_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'submit',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Submit', 'cct-helper'),
                'placeholder' => esc_html__('Submit', 'cct-helper'),
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
                'selector' => '{{WRAPPER}} .cct-helper_widget_form_field h2',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-helper_widget_form_field h2' => 'color: {{VALUE}}'
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
                'selector' => '{{WRAPPER}} .cct-helper_widget_form_field h1',
            ]
        );

        $this->add_control(
            'color_title_text',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-helper_widget_form_field h1' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '\'section_style_content',
            [
                'label' => esc_html__('Form field', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_label',
            [
                'label' => esc_html__('Label', 'elementor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_label',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .cct-helper_widget_form_field label',
            ]
        );

        $this->add_control(
            'color_label',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-helper_widget_form_field label' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'heading_placeholder',
            [
                'label' => esc_html__('Placeholder', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_placeholder',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .cct-helper_widget_form_field input,.cct-helper_widget_form_field textarea',
            ]
        );

        $this->add_control(
            'color_placeholder',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-helper_widget_form_field input,.cct-helper_widget_form_field textarea' => 'color: {{VALUE}}'

                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '\'section_style_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_button',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .submit',
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'cct-helper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .submit' => 'fill: {{VALUE}}; color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'cct-helper'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .submit',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'color' => [
                        'global' => [
                            'default' => Global_Colors::COLOR_ACCENT,
                        ],
                    ],
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $html = array();
        $html[] = '<div class="cct_widget_form_field ">';
        if ($settings['title']) {
            $html[] = '<h2>' . $settings['title'] . '</h2>';
        }

        if ($settings['title1']) {
            $html[] = '<h1>' . $settings['title1'] . '</h1>';
        }

        if ($settings['list']) {
            $html[] = '<form action="#">';
            $end = array_pop($settings['list']);
            foreach ($settings['list'] as $item) {
                $html[] = '<label for="' . $item['list_label'] . '">' . $item['list_label'] . '</label><br>';
                $html[] = '<input type="text" id="' . $item['list_label'] . '" name="' . $item['list_label'] . '" placeholder="' . $item['list_placeholder'] . '" ><br>';
            }
            $html[] = '<label for="' . $end['list_label'] . '">' . $end['list_label'] . '</label><br>';
            $html[] = '<textarea name="' . $end['list_label'] . '" id="' . $end['list_label'] . '" placeholder="' . $end['list_placeholder'] . ' " rows="4"></textarea><br>';
            $html[] = '<div class="btn_submit"><input class="submit" type="submit" value="' . $settings['submit'] . '"></div>';
            $html[] = '</form>';
        }

        $html[] = '</div>';
        echo implode('', $html);

    }

}