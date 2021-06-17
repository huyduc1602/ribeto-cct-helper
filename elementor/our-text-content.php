<?php

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

/**
 * Created by VienPC.
 * User: VienPC
 * Date: 5/5/2021
 * Time: 2:32 PM
 */
class CCT_Elementor_Widget_Our_Service_Text_Content extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'our_text_content';
    }

    public function get_title()
    {
        return esc_html__('Text Content', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-animated-headline';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('Type your description here', 'cct-helper'),
                'default' => esc_html__('Integrio deep industry expertise enables global brands to hit the ground running.'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .our-text-content p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .our-text-content p',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .our-text-content p' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .our-text-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ($settings['content']) { ?>
            <div class="our-text-content">
                <?php echo $settings['content'] ?>
            </div>
<?php
        }
    }
}
