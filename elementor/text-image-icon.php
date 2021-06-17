<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Text_Image_Icon extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cct_text_image_icon';
    }

    public function get_title()
    {
        return esc_html__('Text Image Icon', 'cct-helper');
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
            'section_icon_list',
            [
                'label' => esc_html__('List icon text', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Stunning Design'),
            ]
        );



        $this->add_control(
            'list',
            [
                'label' => esc_html__('List', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => esc_html__('List', 'cct-helper'),

                    ],
                ],
                'title_field' => '{{{ image }}}',
            ]
        );


        $gallery_columns = range(1, 4);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'info_columns',
            [
                'label' => esc_html__('Slide_to_show', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 3,
                'options' => $gallery_columns,
            ]
        );

        $this->end_controls_section();




        $this->start_controls_section(
            'section_style_general',
            [
                'label' => esc_html__('General', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'cct-helper'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .column-icon',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .border' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .border',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'border_box_shadow',
                'selector' => '{{WRAPPER}} .border',
            ]
        );

        $this->add_responsive_control(
            'content_border',
            [
                'label' => esc_html__('Border Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .title h3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .title h3',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .title h3' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_content',
                'selector' => '{{WRAPPER}} .content p',
            ]
        );

        $this->add_control(
            'color_content',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .content p' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="cct-border-icon">
            <div class="row">
                <?php if ($settings['list']) {
                    $x = 12 / $settings['info_columns'];
                    foreach ($settings['list'] as $item) { ?>
                        <div class="col-lg-<?php echo $x ?> col-md-6 col-sm-12 column-icon">
                            <div class="border">
                                <div class="icon">
                                    <?php echo '<img src="' . $item['image']['url'] . '">'; ?>
                                </div>
                                <div class="title">
                                    <h3><?php echo $item['title'] ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

            </div>
        </div>
        <?php
    }
}
