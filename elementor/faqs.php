<?php


use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class CCT_Elementor_Widget_FAQS extends \Elementor\Widget_Base {
    public function get_name() {
        return 'cct_faqs';
    }

    public function get_title() {
        return esc_html__('Ribeto FAQS', 'ribeto-helper');
    }

    public function get_icon() {
        return 'eicon-help-o';
    }

    public function get_categories() {
        return ['ribeto-base'];
    }

    protected function _register_controls() {
        $repeater = new \Elementor\Repeater();
        $this->start_controls_section(
            'section_title_label',
            [
                'label' => esc_html__('Title_label', 'ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title_label',
            [
                'label' => esc_html__('Title_label', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'よくあるお問い合わせ(FAQ)'
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_title_label',
            [
                'label' => esc_html__('Title_Label','ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .title_label-faqs ',
            ]
        );


        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Color', 'ribeto-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .title_label-faqs ' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_purchase',
            [
                'label' => esc_html__('FAQ PURCHASE', 'ribeto-helper'),
            ]
        );
        $this->add_control(
            'title_purchase',
            [
                'label' => esc_html__('Title', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '買取について'
            ]

        );
        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title_purchase',
            [
                'label' => esc_html__('Title & Description', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'ribeto-helper'),
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_content_purchase',
            [
                'label' => esc_html__('Content', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('FAQ Content', 'ribeto-helper'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'tabs_purchase',
            [
                'label' => esc_html__('FAQ Items', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('FAQ Item', 'ribeto-helper'),
                        'tab_title_purchase' => esc_html__('Q．買取商品はサイトに掲載されている商品のみでしょうか？', 'ribeto-helper'),
                        'tab_content_purchase' => esc_html__('A.基本的には掲載商品のみとなりますが、お客様にて買取してほしい商品などが ございましたら一度ご相談ください。', 'ribeto-helper'),
                    ],
                    [
                        'tab_title' => esc_html__('FAQ Item', 'ribeto-helper'),
                        'tab_title_purchase' => esc_html__('Q．買取商品はサイトに掲載されている商品のみでしょうか？', 'ribeto-helper'),
                        'tab_content_purchase' => esc_html__('A.基本的には掲載商品のみとなりますが、お客様にて買取してほしい商品などが ございましたら一度ご相談ください。', 'ribeto-helper'),
                    ],
                   
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );


        $this->add_control(
            'selected_icon_purchase',
            [
                'label' => esc_html__('Icon', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'separator' => 'before',
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-plus-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'chevron-down',
                        'angle-down',
                        'angle-double-down',
                        'caret-down',
                        'caret-square-down',
                    ],
                    'fa-regular' => [
                        'caret-square-down',
                    ],
                ],
                'skin' => 'inline',
                'label_block' => false,
            ]
        );

        $this->add_control(
            'selected_active_icon_purchase',

            [
                'label' => esc_html__('Active Icon', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon_active',
                'default' => [
                    'value' => 'fas fa-minus-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [

                        'chevron-right',
                        'angle-right',
                        'angle-double-right',
                        'caret-right',
                        'caret-square-right',
                    ],
                    'fa-regular' => [
                        'caret-square-up',
                    ],
                ],
                'skin' => 'inline',
                'label_block' => false,
                'condition' => [
                    'selected_icon[value]!' => '',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_payment',
            [
                'label' => esc_html__('FAQ PAYMENT', 'ribeto-helper'),
            ]
        );
        $this->add_control(
            'title_payment',
            [
                'label' => esc_html__('Title', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'お支払いについて'
            ]

        );
        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title_payment',
            [
                'label' => esc_html__('Title & Description', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ Title', 'ribeto-helper'),
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_content_payment',
            [
                'label' => esc_html__('Content', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('FAQ Content', 'ribeto-helper'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'tabs_payment',
            [
                'label' => esc_html__('FAQ Items', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('FAQ Item', 'ribeto-helper'),
                        'tab_title_payment' => esc_html__('Q．買取商品はサイトに掲載さ れている商品のみでしょうか？', 'ribeto-helper'),
                        'tab_content_payment' => esc_html__('A.基本的には掲載商品のみとなりますが、お客様にて買取してほしい商品などが ございましたら一度ご相談ください。', 'ribeto-helper'),
                    ],
                    [
                        'tab_title' => esc_html__('FAQ Item', 'ribeto-helper'),
                        'tab_title_payment' => esc_html__('Q．買取商品はサイトに掲載されている商品のみでしょうか？', 'ribeto-helper'),
                        'tab_content_payment' => esc_html__('A.基本的には掲載商品のみとなりますが、お客様にて買取してほしい商品などが ございましたら一度ご相談ください。', 'ribeto-helper'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );


        $this->add_control(
            'selected_icon_payment',
            [
                'label' => esc_html__('Icon', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'separator' => 'before',
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-plus-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'chevron-down',
                        'angle-down',
                        'angle-double-down',
                        'caret-down',
                        'caret-square-down',
                    ],
                    'fa-regular' => [
                        'caret-square-down',
                    ],
                ],
                'skin' => 'inline',
                'label_block' => false,
            ]
        );

        $this->add_control(
            'selected_active_icon_payment',
            [
                'label' => esc_html__('Active Icon', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon_active',
                'default' => [
                    'value' => 'fas fa-minus-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [

                        'chevron-right',
                        'angle-right',
                        'angle-double-right',
                        'caret-right',
                        'caret-square-right',
                    ],
                    'fa-regular' => [
                        'caret-square-up',
                    ],
                ],
                'skin' => 'inline',
                'label_block' => false,
                'condition' => [
                    'selected_icon[value]!' => '',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('FAQ Border', 'ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__('Border Width', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__('FAQ Title','ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title1',
                'selector' => '{{WRAPPER}} .cct-faqs-title',
            ]
        );


        $this->add_control(
            'color_title1',
            [
                'label'		=> esc_html__('Color', 'ribeto-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .main-title-faqs' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'background_title1',
            [
                'label' => esc_html__('Background', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding1',
            [
                'label' => esc_html__( 'Padding', 'ribeto-helper' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .main-title-faqs ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Title Margin', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-content-faqs' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style_icon',
            [
                'label' => esc_html__('FAQ Icon', 'ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'selected_icon[value]!' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => esc_html__('Alignment', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Start', 'elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('End', 'ribeto-helper'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => is_rtl() ? 'right' : 'left',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title .cct-accordion-icon i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cct-tab-title .cct-accordion-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_active_color',
            [
                'label' => esc_html__('Active Color', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .add .cct-accordion-icon i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .add .cct-accordion-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style_content',
            [
                'label' => esc_html__('FAQ Content', 'ribeto-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_background_color',
            [
                'label' => esc_html__('Background', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Color', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-content' => 'color: {{VALUE}};',
                ],
                'global' => [
                    'default' => Global_Colors::COLOR_TEXT,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .cct-tab-content',
                'global' => [
                    'default' => Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );


        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Padding', 'ribeto-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }



    protected function render() {
        $settings = $this->get_settings_for_display();
        $html = array();

        $html[] = '<div class="lrewards-elementor-text-faqs lrewards-shortcode lr-"><div class="lrewards-inner-faqs">';

        $html[] = '<div class="item-content-faqs">';

        if ($settings['title_label']){
            $html[] = '<div class="title_label-faqs">'.$settings['title_label'].'</div>';

        }

        $html[] = '</div>';
        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);

$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );

if ( ! isset( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
    // @todo: remove when deprecated
    // added as bc in 2.6
    // add old default
    $settings['icon'] = 'fa fa-plus-circle';
    $settings['icon_active'] = 'fa fa-minus-circle';
    $settings['icon_align'] = $this->get_settings( 'icon_align' );
}

$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
$has_icon = ( ! $is_new || ! empty( $settings['selected_icon']['value'] ) );
$id_int = substr( $this->get_id_int(), 0, 3 );
?>
<div class="cct_widget_faqs" >
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a data-toggle="tab" href="#purchase">買取について</a></li>
        <li><a data-toggle="tab" href="#payment">お支払いについて</a></li>
    </ul>
    <!-- start tab -->
    <div class="tab-content">
    <div id="purchase" class="tab-pane fade in active show">
    <?php
    foreach ( $settings['tabs_purchase'] as $index => $item ) :
    $tab_count = $index + 1;

    $tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title_purchase', 'tabs', $index );

    $tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content_purchase', 'tabs', $index );
    $this->add_render_attribute( $tab_title_setting_key, [
        'id' => 'cct-tab-title-' . $id_int . $tab_count,
        'class' => [ 'cct-tab-title' ],
        'data-toggle' => 'collapse',
        'href' => '#cct-tab-content-'. $id_int. $tab_count,
        'role' => 'tab',
        'aria-controls' => 'cct-tab-content-' . $id_int . $tab_count,
        'aria-expanded' => 'false',
    ] );


    $this->add_render_attribute( $tab_content_setting_key, [
        'id' => 'cct-tab-content-' . $id_int . $tab_count,
        'class' => [ 'cct-tab-content', 'cct-clearfix' ],
        'role' => 'tabpanel',
        'aria-labelledby' => 'cct-tab-title-' . $id_int . $tab_count,
    ] );

    $this->add_inline_editing_attributes( $tab_content_setting_key, 'advanced' );
    ?>
    
    <div class="cct-faqs-item">
        <div <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?>>
        <?php if ( $has_icon ) : ?>
            <span class="cct-faqs-icon cct-faqs-icon-<?php echo esc_attr( $settings['icon_align'] ); ?>" aria-hidden="true">
							<?php
                            if ( $is_new || $migrated ) { ?>
                                <span class="cct-faqs-icon-closed"><?php Icons_Manager::render_icon( $settings['selected_icon_purchase'] ); ?></span>
                                <span class="cct-faqs-icon-opened"><?php Icons_Manager::render_icon( $settings['selected_active_icon_purchase)'] ); ?></span>
                            <?php } else { ?>
                                <i class="cct-faqs-icon-closed <?php echo esc_attr( $settings['icon'] ); ?>"></i>
                                <i class="cct-faqs-icon-opened <?php echo esc_attr( $settings['icon_active'] ); ?>"></i>
                            <?php } ?>
							</span>
            <?php else: ?>
        <span class="cct-accordion-icon cct-accordion-icon-left" aria-hidden="true">
		    <span class="cct-accordion-icon-closed"><i class="fas fa-plus-circle"></i></span>
            <span class="cct-accordion-icon-opened"><i class="fas fa-minus-circle"></i></span>
        </span>
        <?php endif; ?>
        <div class="cct-faqs-title" href=""><?php echo $item['tab_title_purchase']; ?></div>
    </div>
    <div class="line"></div>
    <div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>><?php echo $this->parse_text_editor( $item['tab_content_purchase'] ); ?></div>
    </div>

<?php endforeach; ?>
                    </div>
                 <!-- endtab -->

                 <!-- start tab -->
    <div id="payment" class="tab-pane fade">
    <?php
    foreach ( $settings['tabs_payment'] as $index => $item ) :
    $tab_count = $index + 1;

    $tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title_payment', 'tabs', $index );

    $tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content_payment', 'tabs', $index );
    $this->add_render_attribute( $tab_title_setting_key, [
        'id' => 'cct-tab-title-' . $id_int . $tab_count,
        'class' => [ 'cct-tab-title' ],
        'data-toggle' => 'collapse',
        'href' => '#cct-tab-content-'. $id_int. $tab_count,
        'role' => 'tab',
        'aria-controls' => 'cct-tab-content-' . $id_int . $tab_count,
        'aria-expanded' => 'false',
    ] );


    $this->add_render_attribute( $tab_content_setting_key, [
        'id' => 'cct-tab-content-' . $id_int . $tab_count,
        'class' => [ 'cct-tab-content collapse', 'cct-clearfix' ],
        'role' => 'tabpanel',
        'aria-labelledby' => 'cct-tab-title-' . $id_int . $tab_count,
    ] );

    $this->add_inline_editing_attributes( $tab_content_setting_key, 'advanced' );
    ?>
    
    <div class="cct-faqs-item">
        <div <?php echo $this->get_render_attribute_string( $tab_title_setting_key ); ?>>
        <?php if ( $has_icon ) : ?>
            <span class="cct-faqs-icon cct-faqs-icon-<?php echo esc_attr( $settings['icon_align'] ); ?>" aria-hidden="true">
							<?php
                            if ( $is_new || $migrated ) { ?>
                                <span class="cct-faqs-icon-closed"><?php Icons_Manager::render_icon( $settings['selected_icon_payment'] ); ?></span>
                                <span class="cct-faqs-icon-opened"><?php Icons_Manager::render_icon( $settings['selected_active_icon_payment)'] ); ?></span>
                            <?php } else { ?>
                                <i class="cct-faqs-icon-closed <?php echo esc_attr( $settings['icon'] ); ?>"></i>
                                <i class="cct-faqs-icon-opened <?php echo esc_attr( $settings['icon_active'] ); ?>"></i>
                            <?php } ?>
							</span>
        <?php else: ?>
        <span class="cct-accordion-icon cct-accordion-icon-left" aria-hidden="true">
		    <span class="cct-accordion-icon-closed"><i class="fas fa-plus-circle"></i></span>
            <span class="cct-accordion-icon-opened"><i class="fas fa-minus-circle"></i></span>
        </span>
        <?php endif; ?>
        <div class="cct-faqs-title" href=""><?php echo $item['tab_title_payment']; ?></div>
    </div>
    <div class="line"></div>
    <div <?php echo $this->get_render_attribute_string( $tab_content_setting_key ); ?>><?php echo $this->parse_text_editor( $item['tab_content_payment'] ); ?></div>
</div>


<?php endforeach; ?>
                    </div>
                </div>
                 <!-- endtab -->
</div>
        <?php


    }

}
