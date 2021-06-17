<?php

use Elementor\Group_Control_Typography;

/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/7/2020
 * Time: 2:32 PM
 */
class CCT_Elementor_Testimonial_Carousel extends \Elementor\Widget_Base {
    public function get_name() {
        return 'cct_testimonial';
    }

    public function get_title() {
        return esc_html__('testimonial slide', 'cct-helper');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['cct-base'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'section_cct_title_label',
            [
                'label' => esc_html__('Title_label', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cct_title_label',
            [
                'label' => esc_html__('Title_label', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolosit amet .'
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_cct_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cct_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolosit amet .'
            ]

        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_cct_title-second',
            [
                'label' => esc_html__('Title Second', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cct_title-second',
            [
                'label' => esc_html__('Title Second', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Lorem ipsum dolosit amet .'
            ]

        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_cct_title_label',
            [
                'label' => esc_html__('Title_Label','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .cct_title_label ',
            ]
        );


        $this->add_control(
            'cct_color_title',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .cct_title_label ' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'align1',
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
                    '{{WRAPPER}} .cct_title_label   ' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_cct_title',
            [
                'label' => esc_html__('Title','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title_ajt_6',
                'selector' => '{{WRAPPER}} .cct_main-title ',
            ]
        );



        $this->add_control(
            'cct_color_title1',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .cct_main-title ' => 'color: {{VALUE}}'
                ]
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .cct_main-title   ' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_cct_title-second',
            [
                'label' => esc_html__('Title Second','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title-second',
                'selector' => '{{WRAPPER}} .cct_main-title-second ',
            ]
        );


        $this->add_control(
            'cct_color_title-second',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .cct_main-title-second ' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'align2',
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
                    '{{WRAPPER}} .cct_main-title-second   ' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slide_section',
            [
                'label' => esc_html__('Slide', 'cct-helper'),
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
            'list_name', [
                'label' => esc_html__('Name', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your Name', 'cct-helper'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_position', [
                'label' => esc_html__('Position', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Senior Marketer', 'cct-helper'),

            ]
        );

        $repeater->add_control(
            'list_desc', [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('List Content', 'plugin-domain'),
                'show_label' => false,
            ]
        );


        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_desc' => esc_html__('Title #1', 'cct-helper'),

                    ],
                    [
                        'list_desc' => esc_html__('Title #2', 'cct-helper'),

                    ],
                ],
                'title_field' => '{{{ list_desc }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_name',
            [
                'label' => esc_html__('Name','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title-name',
                'selector' => '{{WRAPPER}} .list_name',
            ]
        );


        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .list_name ' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_position',
            [
                'label' => esc_html__('Position','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title-position',
                'selector' => '{{WRAPPER}} .list_position',
            ]
        );


        $this->add_control(
            'color_position',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .list_position ' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_des',
            [
                'label' => esc_html__('Description','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title-des',
                'selector' => '{{WRAPPER}} .list_desc',
            ]
        );


        $this->add_control(
            'color_title2',
            [
                'label'		=> esc_html__('Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .list_desc ' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $html = array();

        $html[] = '<div class="cct-elementor-text-testimonial">';

        $html[] = '<div class="cct_item-content">';

        if ($settings['cct_title_label']){
            $html[] = '<div class="cct_title_label">'.$settings['cct_title_label'].'</div>';
        }
        if ($settings['cct_title']) {
            $html[] = '<div class="cct_main-title">'.$settings['cct_title'] .'</div>';
        }
        if ($settings['cct_title-second']) {
            $html[] = '<div class="cct_main-title-second">'.$settings['cct_title-second'] .'</div>';
        }
        $html[] = '</div>';
        $html[] = '</div>';

        echo implode('', $html);

        $html = array();
        $html[] = '<div class="cct_widget_slick">';
        if ($settings['list']) {
            $html[] = '<div class="slider">';
            foreach ($settings['list'] as $item) {
                $html[] = '<div class="slider_item">';
                $html[] = '<div class="list_desc">' . $item['list_desc'] . '</div>';
                $html[] = '<div class="inner d-flex">';
                $html[] = '<div class="image"><img src="' . $item['image']['url'] . '" alt=""></div>';
                $html[] = '<div class="right">';
                $html[] = '<div class="list_name">' . $item['list_name'] . '</div>';
                $html[] = '<div class="list_position">' . $item['list_position'] . '</div>';
                $html[] = '</div>';
                $html[] = '</div>';
                $html[] = '</div>';
            }
            $html[] = '</div>';
        }
        $html[] = '</div>';
        echo implode('', $html);


        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"</script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css.map" ></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.slider').slick({

                    dots: true,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    prevArrow: false,
                    nextArrow: false,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                    ]
                });
            });



        </script>
        <?php
    }
}
