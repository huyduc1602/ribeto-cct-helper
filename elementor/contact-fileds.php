<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Contact extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_contact';
    }

    public function get_title()
    {
        return esc_html__('Ribeto FORM', 'ribeto-helper');
    }

    public function get_icon()
    {
        return 'eicon-text';
    }

    public function get_categories()
    {
        return ['ribeto-base'];
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
            'title_label',
            [
                'label' => esc_html__('Title Label', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('お問い合わせ', 'cct-helper'),
            ]
        );
        $this->add_control(
            'title_sec',
            [
                'label' => esc_html__('Title Sec', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('あなたからの御一報をお待ちしています', 'cct-helper'),
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
                'default' => esc_html__('Content', 'cct-helper'),
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
            'section_des',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Your description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('お問い合わせ', 'cct-helper'),
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
                'label' => esc_html__('Title Label', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .cct_widget_form_field h2',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct_widget_form_field h2' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_title_sec',
            [
                'label' => esc_html__('Title Sec', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title_text',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .cct_widget_form_field h1',
            ]
        );

        $this->add_control(
            'color_title_text',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct_widget_form_field h1' => 'color: {{VALUE}}'
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
                'selector' => '{{WRAPPER}} .cct_widget_form_field label',
            ]
        );

        $this->add_control(
            'color_label',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct_widget_form_field label' => 'color: {{VALUE}}'
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
                'selector' => '{{WRAPPER}} .cct_widget_form_field input,.cct_widget_form_field textarea',
            ]
        );

        $this->add_control(
            'color_placeholder',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct_widget_form_field input,.cct_widget_form_field textarea' => 'color: {{VALUE}}'

                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '\'section_style_des',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_des',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .des-contact p',
            ]
        );

        $this->add_control(
            'color_des',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .des-contact p' => 'color: {{VALUE}}'

                ]
            ]
        );
        $this->end_controls_section();



    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $html = array();
        $html[] = '<div class="cct_widget_form_field ">';
        if ($settings['title_label']) {
            $html[] = '<h2>' . $settings['title_label'] . '</h2>';
        }

        if ($settings['title_sec']) {
            $html[] = '<h1>' . $settings['title_sec'] . '</h1>';
        }

        $html[]='[contact-form-7 id="956" title="Contact form 1"]';
        $html[] = '</div>';
        echo implode('', $html);

    }


}