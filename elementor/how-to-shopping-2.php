<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;


class CCT_Elementor_Widget_How_To_Shopping_2 extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'how_to_shopping_2';
    }

    public function get_title()
    {
        return esc_html__('How To Shopping Style 2', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-post-list';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'section_title_label',
            [
                'label' => esc_html__('Title_label', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '4つの簡単なステップ'
            ]
        );
        $this->add_control(
			'bg-image',
			[
				'label' => __( 'Choose Background Image', 'cct-helper' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'cct-helper' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Avatar', 'cct-helper'),
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
            'description',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('We offer beautiful and unique themes to help you build a website with professional layouts and amazing look for your bussiness.', 'cct-helper'),
            ]
        );
        $image_path = get_template_directory().'images/fontend/homepage/';
        
        $this->add_control(
            'list',
            [
                'label' => esc_html__('List of step', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('1. 売りたい商品を選択・カートへ', 'cct-helper'),
                        'title' => esc_html__('1. 売りたい商品を選択・カートへ', 'cct-helper'),
                        'description' => esc_html__('幅広い商品を買取しております。商品一覧はそれぞれのページでチェックできます。', 'cct-helper'),
                    ],
                    [
                        'tab_title' => esc_html__('2. お客様情報を入力', 'cct-helper'),
                        'title' => esc_html__('2. お客様情報を入力', 'cct-helper'),
                        'description' => esc_html__('お客様のご連絡先情報の入力をお願いします。', 'cct-helper'),
                    ],
                    [
                        'tab_title' => esc_html__('3. 支払い方法を選択', 'cct-helper'),
                        'title' => esc_html__('3. 支払い方法を選択', 'cct-helper'),
                        'description' => esc_html__('買取した商品は、お客様のご希望に合わせてお支払いさせていただきます。', 'cct-helper'),
                    ],
                    [
                        'tab_title' => esc_html__('4. 注文を確定する', 'cct-helper'),
                        'title' => esc_html__('4. 注文を確定する', 'cct-helper'),
                        'description' => esc_html__('注文を確定してから24時間以内にご連絡をさせていただきます。', 'cct-helper'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
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
        $gallery_style_box_item = ['Column','Row'];
        $gallery_style_box_item = array_combine($gallery_style_box_item, $gallery_style_box_item);
        $this->add_control(
            'style_box_item',
            [
                'label' => esc_html__('Block type', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 'Row',
                'options' => $gallery_style_box_item,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_title_label',
            [
                'label' => esc_html__('Title_Label','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title_label',
                'selector' => '{{WRAPPER}} .box-title-heading ',
            ]
        );


        $this->add_control(
            'title_label_color',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .box-title-heading ' => 'color: {{VALUE}}'
                ]
            ]
        );
        
        $this->add_control(
            'title_lebel_background_color',
            [
                'label' => esc_html__('Background', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .box-title' => 'background-color: {{VALUE}};',
                ],
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
            'heading_content_title_style',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography__content_title',
                'selector' => '{{WRAPPER}} .box-item-textbox-heading ',
            ]
        );


        $this->add_control(
            'content_title_color',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .box-item-textbox-heading ' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'align_content_title',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .box-item-textbox-heading  ' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'heading_content_descrition_style',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_descrition',
                'selector' => '{{WRAPPER}} .box-item-textbox-description ',
            ]
        );


        $this->add_control(
            'descrition_color',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .box-item-textbox-description ' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'align_content_descrition',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .box-item-textbox-description  ' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

      
    }
    protected function render() {

         $settings = $this->get_settings_for_display();

         $html = array();
         if($settings['style_box_item'] == 'Row'){
            $html[] = '<div id="how-to-shopping-2" class="how-to-shopping">';
         }else{
            $html[] = '<div id="how-to-shopping-1" class="how-to-shopping">';
         }
        
         $html[] = '<div class="container" style="background:url('.$settings['bg-image']['url'].') no-repeat center;">';
         $html[] = '<div class="box-title">';
         $html[] = '<div class="arrow-left"></div>';
         $html[] = '<div class="arrow-right"></div>';

         if ($settings['title']) {
         $html[] = '<div class="box-title-heading">'.$settings['title'].'</div>';
         }

         $html[] = '</div>';
         $html[] = '<div class="row">';
         foreach (  $settings['list'] as $item ) {
         $html[] = '<div class="item-content-'.$settings['number_column'].' box-item">
         <div class="box-item-image">
            <img src="'. $item['image']['url'] .'">
         </div>
            <div class="box-item-textbox">
                     <div class="box-item-textbox-heading">'. $item['title'] .'</div>
                     <p class="box-item-textbox-description">'. $item['description'] .'</p>
             </div>
        </div>';

         }
         $html[] = ' </div>
         </div>
     </div>';
        echo implode('', $html);
    }
}