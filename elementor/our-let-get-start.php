<?php

use Elementor\Group_Control_Typography;
use Elementor\Utils;

/**
 * Created by VienPC.
 * User: VienPC
 * Date: 5/5/2021
 * Time: 2:32 PM
 */
class CCT_Elementor_Widget_Our_Service_Let_Get_Start extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_let_get_start';
    }

    public function get_title()
    {
        return esc_html__('Let Get Start', 'cct-helper');
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
            'image',
            [
                'label' => esc_html__(' BackGround Image', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_image',
            [
                'label' => esc_html__('Choose BackGround Image', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
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
            'section_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Let’s Get Started'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'section_content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Pick a demo and start building your  website today.'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Browser Themes'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Subscribe'),
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
                'selector' => '{{WRAPPER}} .title-let-get h3',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .title-let-get h3' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .title-let-get' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();




        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_content',
                'selector' => '{{WRAPPER}} .content-let-get p',
            ]
        );

        $this->add_control(
            'color_content',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .content-let-get p' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__('Content Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content-let-get' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_button',
                'selector' => '{{WRAPPER}} .button-let-get a',
            ]
        );
        $this->add_control(
            'color_button',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .button-let-get a' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'cct-helper'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .button-let-get',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ($settings['section_title']) { ?>
            <div class="border-let-get">
                <div class="main-content">
                    <div class="title-let-get">
                        <h3><?php echo $settings['section_title'] ?></h3>
                    </div>
                    <div class="content-let-get">
                        <p><?php echo $settings['section_content'] ?></p>
                    </div>
                    <div class="button-let-get">
                        <a href="<?php echo $settings['link'] ?>"><?php echo $settings['section_button'] ?></a>
                    </div>
                </div>
                <div class="img-let-get">
                    <?php echo '<img src="' . $settings['section_image']['url'] . '">'; ?>
                </div>
            </div>
<?php }
    }
}
