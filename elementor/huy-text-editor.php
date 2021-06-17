<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class CCT_Widget_Huy_Text_Editor extends Widget_Base {
    
    public function get_name() {
        return 'huy-text-editor';
    }
    
    public function get_title() {
        return esc_html__( 'Text Editor', 'cct-helper' );
    }
    
    public function get_icon() {
        return 'eicon-text';
    }
    
    public function get_categories() {
        return [ 'cct-base' ];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'section_editor',
            [
                'label' => esc_html__( 'Text Editor', 'elementor' ),
            ]
        );

        $this->add_control(
            'editor',
            [
                'label' => '',
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<p>' . esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ) . '</p>',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Text Editor', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'elementor' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'editor_typography',
                'selector' => '{{WRAPPER}} .description',
            ]
        );

        $this->add_control(
            'margin',
            [
                'label' => __( 'Margin', 'cct-helper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .description p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

   
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="description">' . $settings['editor'] . '</div>';

    }

    

   
   
}
