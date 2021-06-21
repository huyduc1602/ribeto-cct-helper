<?php


use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

/**
 * Created by Truong.
 * User: Truong
 * Date: 21/6/2021
 * Time: 11:15 AM
 */
class CCT_Elementor_Widget_How_To_Buy extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_how_to_buy';
    }

    public function get_title()
    {
        return esc_html__('How To Buy', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $gallery_columns = range(2, 4);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'number_column',
            [
                'label' => esc_html__('Columns', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 4,
                'options' => $gallery_columns,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'step_number',
            [
                'label' => esc_html__( 'Step', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 1,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Add Images', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '売りたい商品を選択・カートへ', 'cct-helper' ),

            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '幅広い商品を買取しております。商品一覧はそれぞれのページでチェックできます。', 'cct-helper' ),

            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Add Icon', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__( 'How To Buy', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_image',
            [
                'label' => esc_html__( 'Image', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__('Image Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__('Image Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_icon',
            [
                'label' => esc_html__( 'Icon', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label' => esc_html__('Icon Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_content',
            [
                'label' => esc_html__( 'Content', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__('Content Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $html = array();

        $html[] = '<div class="cct-elementor-how-to-buy">';
        $html[] = '<div class="row">';
        $x = 12/$settings['number_column'];
        foreach (  $settings['list'] as $item ) {
            $html[] = '<div class=" col-xl-'.$x.' col-lg-6">';
            $html[] = '<div class="item-content">';
            $html[] = '<div class="item-content-1">';
            $html[] =  '<img src="' . $item['image']['url'] . '">';
            $html[] = '</div>';
            $html[] = '<div class="item-content-2">';
            $html[] =  '<img src="' . $item['icon']['url'] . '">';
            $html[] =  '<p>'.$item['step_number'].'</p>';
            $html[] = '</div>';
            $html[] = '<div class="item-content-inner">';
            $html[] =  '<div class="item-content-inner-title">'.$item['title'].'</div>';
            $html[] =  '<div class="item-content-inner-desc">'.$item['description'].'</div>';
            $html[] = '</div>';
            $html[] = '</div>';
            $html[] = '</div>';
        }
        $html[] = '</div>';
        $html[] = '</div>';


        echo implode('', $html);
    }
}