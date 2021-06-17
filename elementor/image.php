<?php
use Elementor\Group_Control_Image_Size;

class CCT_Elementor_Widget_Image extends \Elementor\Widget_Base {
    public function get_name() {
        return 'cct_image';
    }

    public function get_title() {
        return esc_html__('Image', 'cct-helper');
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_image',
            [
                'label' => esc_html__('Image', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

//		lrewards_elementor_generate_image_options_content($this);

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_general',
            [
                'label' => esc_html__('General', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lrewards-inner_image,{{WRAPPER}} .curver-bottom > div' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .curver-bottom > div' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__('Image Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        $html = array();

        $html[] = '<div class="lrewards-elementor-image lrewards-shortcode "><div class="lrewards-inner_image">';

        $html[] = '<div class="item-image">' . Group_Control_Image_Size::get_attachment_image_html($settings) . '</div>';

        $html[] = '</div>';
        $html[] = '</div>';

        echo implode('', $html);

    }
}