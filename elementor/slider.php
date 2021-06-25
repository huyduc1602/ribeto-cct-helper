<?php

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;





/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/7/2020
 * Time: 2:32 PM
 */
class CCT_Elementor_Slider extends \Elementor\Widget_Base {
    public function get_name() {
        return 'cct_slider';
    }

    public function get_title() {
        return esc_html__('Ribeto Slider', 'ribeto-helper');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['ribeto-base'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'slide_section',
            [
                'label' => esc_html__('Slide', 'ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'show_content',
			[
				'label' => __( 'Text display', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'ribeto-helper' ),
				'label_off' => __( 'Hide', 'ribeto-helper' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Add Images', 'ribeto-helper' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'image_link',
            [
                'label' => esc_html__('Image link', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );
        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__( 'Title', 'ribeto-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '業界最高水準の高価買取', 'ribeto-helper' ),
                'placeholder' => esc_html__('Type your title slider', 'ribeto-helper'),
            ]
        );
        
        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__( 'Description', 'ribeto-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '業界、最高水準の査定価格、サービス品質をご体験ください。', 'ribeto-helper' ),
                'placeholder' => esc_html__( 'Type your description here', 'ribeto-helper' ),
            ]
        );
        $repeater->add_control(
            'button_title',
            [
                'label' => esc_html__( 'Button Title', 'ribeto-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '私に連絡して', 'ribeto-helper' ),
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button link', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_desc' => esc_html__('Title #1', 'ribeto-helper'),

                    ],
                    [
                        'list_desc' => esc_html__('Title #2', 'ribeto-helper'),

                    ],
                ],
                'title_field' => '{{{ list_desc }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Slide','ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__( 'Title', 'ribeto-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .slider-content-box-text-title',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Title Color', 'ribeto-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .slider-content-box-text-title' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_desc',
            [
                'label' => esc_html__( 'Description', 'ribeto-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'selector' => '{{WRAPPER}} .slider-content-box-text-descrition',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Description Color', 'ribeto-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .slider-content-box-text-descrition' => 'color: {{VALUE}}'
                ]
            ]
        );
        
        $this->end_controls_section();

        //Button
        $this->start_controls_section(
			'section_style_button',
			[
				'label' => __( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} a.btn-slider',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} a.btn-slider' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_4,
				],
                'default' => '#e01d19',
				'selectors' => [
					'{{WRAPPER}} a.btn-slider' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.btn-slider:hover, {{WRAPPER}} .btn-slider:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.btn-slider:hover, {{WRAPPER}} .btn-slider:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} a.btn-slider:hover, {{WRAPPER}} .btn-slider:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .btn-slider',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
                'default' => '25px',
				'selectors' => [
					'{{WRAPPER}} a.btn-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .btn-slider',
			]
		);

		$this->add_control(
			'text_button_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
                'default' => '13px 30px',
				'selectors' => [
					'{{WRAPPER}} a.btn-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();

        $html[] = '<div id="slider">

        <div  class="owl-carousel owl-theme slider-carousel">';
        foreach (  $settings['list'] as $key => $item ) {
            if($key == 0){
                $html[] = '<div class="item active">';
            }else{
                $html[] = '<div class="item">';
            }
            $html[] = ' <div class="slider-content-box-container" >';           
            if ( 'yes' === $settings['show_content'] ) {
                $html[] = '<img src="'. $item['image']['url'] .'" style="position: relative;">';
                $html[] = ' <div class="slider-content-box">
                        <div class="slider-content-box-text">
	                        <h2 class="slider-content-box-text-title">'. $item['item_title'] .'</h2>
	                        <h4 class="slider-content-box-text-descrition">'. $item['item_description'] .'</h4>	                       
                    	</div>
                    	 <div class="slider-content-box-button">
                            <a class="btn btn-slider" href="'. $item['button_link'] .'">'. $item['button_title'] .'</a>
                         </div>
                    </div>';
            }else{
                $html[] = '<a href="'.$item['image_link'].'"><img src="'. $item['image']['url'] .'" style="position: relative;"></a>';
            }
            $html[] = '</div>
            </div>';
        }
        $html[] = '</div></div>';
        echo implode('', $html);
    }

	protected function _content_template() {
		?>
		<# if ( settings.list.length ) { #>
		<dl>
        <div id="slider">

        <div  class="owl-carousel owl-theme slider-carousel">
			<# _.each( settings.list, function( item ) { #>
        <div class="item">
		        <div class="slider-content-box-container" >';
                    <img src="{{{ item.image.url }}}" style="position: relative;">
                    <div class="slider-content-box">
                        <div class="slider-content-box-text">
	                        <h2 class="slider-content-box-text-title">{{ item.list_title }}</h2>
	                        <h4 class="slider-content-box-text-descrition">{{ item.item_description }}</h4>	                       
                    	</div>
                    	 <div class="slider-content-box-button">
                            <a class="btn btn-slider" href="{{ item.button_link }}">{{ item.button_title }}</a>
                         </div>
                    </div>
                </div>
        </div>
			<# }); #>
            </div>
        </div>
			</dl>
		<# } #>
		<?php
	}
}