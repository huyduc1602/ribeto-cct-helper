<?php

use Elementor\Controls_Manager;

class CCT_Elementor_Widget_Logo_Image extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_logo_image';
    }

    public function get_title()
    {
        return esc_html__('Logo Image', 'cct-helper');
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
            'link',
            [
                'label' => esc_html__('Link logo', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
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
                        'list_Image' => esc_html__( 'logo #1', 'cct-helper' ),
                        'link' => '#',
                    ],
                    [
                        'list_Image' => esc_html__( 'logo #2', 'cct-helper' ),
                        'link' => '#',
                    ],
                ],
                'title_field' => '{{{ list_Image }}}',
            ]
        );
        $gallery_columns = range(2, 6);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'number_column',
            [
                'label' => esc_html__('Columns', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 5,
                'options' => $gallery_columns,
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();
        $html[] = '<div class="cct-elementor-logo-image cct-shortcode container">';
        foreach (  $settings['list'] as $item ) {
            $html[] = '<div class="logo-image item-content-'.$settings['number_column'].'">';
            $html[] = '<div class="logo-image-inner">';
            $html[] = '<a href="' . $item['link'] . '">';
            $html[] =  '<img src="' . $item['list_Image']['url'] . '">';
            $html[] = '</a>';
            $html[] = '</div>';
            $html[] = '</div>';
        }

        $html[] = '</div>';
        echo implode('', $html);
    }
}