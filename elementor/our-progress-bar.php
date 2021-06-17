<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor progress widget.
 *
 * Elementor widget that displays an escalating progress bar.
 *
 * @since 1.0.0
 */
class CCT_Elementor_Widget_Progress_Bar extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve progress widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'progress';
    }

    /**
     * Get widget title.
     *
     * Retrieve progress widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Progress Bar', 'cct-helper');
    }

    /**
     * Get widget icon.
     *
     * Retrieve progress widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-skill-bar';
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['progress', 'bar'];
    }
    public function get_categories()
    {
        return ['cct-base'];
    }
    /**
     * Register progress widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_progress',
            [
                'label' => esc_html__('Progress Bar', 'cct-helper'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('Enter your title', 'cct-helper'),
                'default' => esc_html__('My Skill', 'cct-helper'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'progress_type',
            [
                'label' => esc_html__('Type', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Default', 'cct-helper'),
                    'info' => esc_html__('Info', 'cct-helper'),
                    'success' => esc_html__('Success', 'cct-helper'),
                    'warning' => esc_html__('Warning', 'cct-helper'),
                    'danger' => esc_html__('Danger', 'cct-helper'),
                ],
            ]
        );

        $this->add_control(
            'percent',
            [
                'label' => esc_html__('Percentage', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'size' => 50,
                    'unit' => '%',
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => esc_html__('View', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_progress_style',
            [
                'label' => esc_html__('Progress Bar', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bar_color',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-progress-wrapper .elementor-progress-bar' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bar_bg_color',
            [
                'label' => esc_html__('Background Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-progress-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'bar_border_radius',
            [
                'label' => esc_html__('Border Radius', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-progress-wrapper' => 'border-radius: {{SIZE}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Title Style', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-title' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'selector' => '{{WRAPPER}} .elementor-title',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} .elementor-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_number',
            [
                'label' => esc_html__('Number Style', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography-number',
                'selector' => '{{WRAPPER}} .number-progress',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number-progress' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render progress widget output on the frontend.
     * Make sure value does no exceed 100%.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $progress_percentage = is_numeric($settings['percent']['size']) ? $settings['percent']['size'] : '0';
        if (100 < $progress_percentage) {
            $progress_percentage = 100;
        }

        $this->add_render_attribute('title', [
            'class' => 'elementor-title',
        ]);

        $this->add_inline_editing_attributes('title');

        $this->add_render_attribute('wrapper', [
            'class' => 'elementor-progress-wrapper',
            'role' => 'progressbar',
            'aria-valuemin' => '0',
            'aria-valuemax' => '100',
            'aria-valuenow' => $progress_percentage,

        ]);

        if (!empty($settings['progress_type'])) {
            $this->add_render_attribute('wrapper', 'class', 'progress-' . $settings['progress_type']);
        }

        $this->add_render_attribute('progress-bar', [
            'class' => 'elementor-progress-bar',
            'data-max' => $progress_percentage,
        ]);

        $this->add_render_attribute('inner_text', [
            'class' => 'elementor-progress-text',
        ]); ?>


        <div class="border-progress">
            <div class="title-progress-bar">
                <span <?php echo $this->get_render_attribute_string('title'); ?>><?php echo $settings['title']; ?></span>
                <span class="number-progress"><?php echo $progress_percentage; ?>%</span>
            </div>
            <div class="border-progress">
                <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
                    <div <?php echo $this->get_render_attribute_string('progress-bar'); ?>>

                        <span <?php echo $this->get_render_attribute_string('inner_text'); ?>></span>
                        <div class="progress-icon"></div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

    /**
     * Render progress widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     * @access protected
     */
}
