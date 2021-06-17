<?php

use Elementor\Group_Control_Typography;

/**
 * Created by VienPC.
 * User: VienPC
 * Date: 5/5/2021
 * Time: 2:32 PM
 */
class CCT_Elementor_Widget_Our_Service_Title_Our extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_title_our';
    }

    public function get_title()
    {
        return esc_html__('Title Our', 'cct-helper');
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
            'our',
            [
                'label' => esc_html__('Item', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'item',
            [
                'label' => esc_html__('Item', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Services'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'select_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('What We Offer for You'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_item',
            [
                'label' => esc_html__('Item', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_item',
                'selector' => '{{WRAPPER}} .our-item a',
            ]
        );
        $this->add_control(
            'color_item',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .our-item a' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'item_margin',
            [
                'label' => esc_html__('Item Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .our-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
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
                'selector' => '{{WRAPPER}} .our-title h2',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .our-title h2' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ($settings['item']) { ?>
            <div class="our-text-first">
                <div class="our-item">
                    <a href="<?php echo $settings['link'] ?>"><?php echo $settings['item'] ?></a>
                </div>
                <div class="our-title">
                    <h2><?php echo $settings['select_title'] ?></h2>
                </div>
            </div>

<?php }
    }
}
