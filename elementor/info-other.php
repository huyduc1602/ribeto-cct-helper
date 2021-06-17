<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Widget_Info_Other extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'info_other';
    }

    public function get_title()
    {
        return esc_html__('Infomation Other', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-document-file';

    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section_info_other',
            [
                'label' => esc_html__('Info Other', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'offices',
            [
                'label' => esc_html__('Offices', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('headquarter', 'cct-helper'),
                'placeholder' => esc_html__('Your Offices', 'cct-helper'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'address',
            [
                'label' => esc_html__('Address', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Hà Nội', 'cct-helper'),
                'placeholder' => esc_html__('Your Address', 'cct-helper'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'address_detail',
            [
                'label' => esc_html__('Address Detail', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('60 East 65th Street', 'cct-helper'),
                'placeholder' => esc_html__('Your Address Detail', 'cct-helper'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'address_ma',
            [
                'label' => esc_html__('Mã', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('NY 10065', 'cct-helper'),
                'placeholder' => esc_html__('Your Mã', 'cct-helper'),
                'label_block' => true,
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
                        'address' => esc_html__('List', 'cct-helper'),

                    ],
                    [
                        'address' => esc_html__('List', 'cct-helper'),

                    ],
                ],
                'title_field' => '{{{ address }}}',
            ]
        );


        $gallery_columns = range(2, 6);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'info_columns',
            [
                'label' => esc_html__('Columns', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 2,
                'options' => $gallery_columns,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '\'section_style_info_list',
            [
                'label' => esc_html__('Info', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_offices',
            [
                'label' => esc_html__('Offices', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_offices',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .info_other_item h5',
            ]
        );

        $this->add_control(
            'color_offices',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info_other_item h5' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'heading_address',
            [
                'label' => esc_html__('Address', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_address',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .info_other_item h2',
            ]
        );

        $this->add_control(
            'color_address',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info_other_item h2' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'heading_address_detail',
            [
                'label' => esc_html__('Address Detail', 'cct-helper'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_address_detail',
                'label' => esc_html__('Typography', 'cct-helper'),
                'selector' => '{{WRAPPER}} .info_other_item p',
            ]
        );

        $this->add_control(
            'color_address_detail',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info_other_item p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $html = array();
        $html[] = '<div class="cct_widget_info_other ">';

//        if ($settings['gallery_columns']) {
//            $this->add_render_attribute('shortcode', 'columns', $settings['gallery_columns']);
//        }
        if ($settings['list']) {

            foreach ($settings['list'] as $item) {
                $html[] = '<div class="info_other_item  info_columns_' . $settings['info_columns'] . '">';
                $html[] = ' <h5>' . $item['offices'] . '</h5>';
                $html[] = ' <h2>' . $item['address'] . '</h2>';
                $html[] = ' <p>' . $item['address_detail'] . '</p>';
                $html[] = ' <p>' . $item['address_ma'] . '</p>';
                $html[] = '</div>';
            }

        }

        $html[] = '</div>';
        echo implode('', $html);
    }
}