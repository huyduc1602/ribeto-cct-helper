<?php

use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

/**
 * Created by VienPC.
 * User: VienPC
 * Date: 5/5/2021
 * Time: 2:32 PM
 */
class CCT_Elementor_Widget_Our_Service_Footer_Mail extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_last_our_service';
    }

    public function get_title()
    {
        return esc_html__('Last Our Server', 'cct-helper');
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
            'section_image',
            [
                'label' => esc_html__('Image', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_icon',
            [
                'label' => esc_html__('Icon', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Choose Icon', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section',
            [
                'label' => esc_html__('selection', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Be the First One to Hear About Updates'),
            ]
        );

        $this->add_control(
            'section_placeholder',
            [
                'label' => esc_html__('Placeholder', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your email address'),
            ]
        );
        $this->add_control(
            'section_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
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
                'selector' => '{{WRAPPER}} .item-title-last h3',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .item-title-last h3' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .item-title-last' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();




        $this->start_controls_section(
            'section_style_placeholder',
            [
                'label' => esc_html__('Placeholder', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_placeholder',
                'selector' => '{{WRAPPER}} .item-placeholder input',
            ]
        );

        $this->add_control(
            'color_placeholder',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .item-placeholder input' => 'color: {{VALUE}}'
                ]
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
                'selector' => '{{WRAPPER}} .item-button-last input',
            ]
        );
        $this->add_control(
            'color_button',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .item-button-last input' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ($settings['section_title']) {  ?>
            <div class="img-bg-last">
                <?php echo  Group_Control_Image_Size::get_attachment_image_html($settings) ?>
                <div class="cct-title-last-our">
                    <div class="item-title-last">
                        <h3><?php echo $settings['section_title'] ?></h3>
                    </div>

                    <form class="form-css">
                        <div class="item-placeholder"><input style="" type="text" id="fname" name="fname" placeholder="<?php echo $settings['section_placeholder'] ?>"></div>
                        <div class="item-button-last"><input type="submit" value="<?php echo $settings['section_button'] ?>"></div>
                        <div class="item-icon-mail"><?php echo '<img src="' . $settings['icon']['url'] . '">'; ?></div>
                    </form>
                </div>
            </div>
<?php }
    }
}
