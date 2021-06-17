<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Icon_Text extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_icon_text';
    }

    public function get_title()
    {
        return esc_html__('Icon Text', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-text';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'cct-helper' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_Image',
            [
                'label' => esc_html__( 'Add Image', 'cct-helper' ),
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
                'default' => esc_html__('Stunning Design', 'cct-helper'),
            ]
        );
        $repeater->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We offer beautiful and unique themes to help you build a website with professional layouts and amazing look for your bussiness.', 'cct-helper'),
            ]
        );
        $repeater->add_control(
            'color_icon',
            [
                'label'		=> esc_html__('Icon Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#E0A7FF',
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => __( 'Repeater List', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_Image' => esc_html__( 'Icon #1', 'cct-helper' ),
                        'title' => esc_html__( 'Title #1', 'cct-helper' ),
                        'desc'  => esc_html__( 'Desc #1', 'cct-helper' ),
                        'color_icon' => '#E0A7FF',
                    ],
                    [
                        'list_Image' => esc_html__( 'Icon #2', 'cct-helper' ),
                        'title' => esc_html__( 'Title #2', 'cct-helper' ),
                        'desc'  => esc_html__( 'Desc #2', 'cct-helper' ),
                        'color_icon' => '#E0A7FF',
                    ],
                ],
                'title_field' => '{{{ list_Image }}}',
            ]
        );
        $gallery_columns = range(1, 4);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'number_column_1',
            [
                'label' => esc_html__('Columns', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 3,
                'options' => $gallery_columns,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .item-content-inner-title',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Title Product Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-content-inner-title' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_title_desc',
            [
                'label' => esc_html__( 'Desc', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'selector' => '{{WRAPPER}} .item-content-inner-desc',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-content-inner-desc' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();
        $html[] = '<div class="cct-elementor-icon-text cct-shortcode">';
        $html[] = '<div class="row">';
        $x = 12/$settings['number_column_1'];

        foreach (  $settings['list'] as $item ) {
            $html[] = '<div class="item-icon-text col-xl-'.$x.' col-lg-6 col-md-12">';
            $html[] = '<div class="item-content">';
            $html[] = '<div class="icon" style="background-color: '.$item['color_icon'].'">';
            $html[] =  '<img src="' . $item['list_Image']['url'] . '">';
            $html[] = '</div>';
            $html[] = '<div class="item-content-inner">';
            $html[] =  '<div class="item-content-inner-title">'.$item['title'].'</div>';
            $html[] =  '<div class="item-content-inner-desc">'.$item['desc'].'</div>';
            $html[] = '</div>';
            $html[] = '</div>';
            $html[] = '</div>';
        }
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}