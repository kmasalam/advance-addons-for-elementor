<?php
/**
 * Info box widget class
 *
 * @package Advanced_Addons
 */
namespace AAFE\Elementor\Widget;

use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Dual_Button extends Base {

      /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Dual Button', 'advanced-addons-elementor' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'hm hm-accordion-horizontal';
    }

    public function get_keywords() {
       return [ 'button', 'btn', 'dual', 'advance', 'link' ];
    }

    
    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		 $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Dual Buttons', 'advanced-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs( '_tabs_buttons' );

        $this->start_controls_tab(
            '_tab_button_left',
            [
                'label' => __( 'Left', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'left_button_text',
            [
                'label' => __( 'Text', 'advanced-addons-elementor' ),
                'label_block'=> true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Button Text', 'advanced-addons-elementor' )
            ]
        );

        $this->add_control(
            'left_button_link',
            [
                'label' => __( 'Link', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_connector',
            [
                'label' => __( 'Connector', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'button_connector_hide',
            [
                'label' => __( 'Hide Connector?', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Hide', 'advanced-addons-elementor' ),
                'label_off' => __( 'Show', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'button_connector_type',
            [
                'label' => __( 'Connector Type', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'text' => [
                        'title' => __( 'Text', 'advanced-addons-elementor' ),
                        'icon' => 'fa fa-text-width',
                    ],
                    'icon' => [
                        'title' => __( 'Icon', 'advanced-addons-elementor' ),
                        'icon' => 'fa fa-star',
                    ]
                ],
                'toggle' => false,
                'default' => 'text',
                'condition' => [
                    'button_connector_hide!' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'button_connector_text',
            [
                'label' => __( 'Text', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Or', 'advanced-addons-elementor' ),
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'text',
                ]
            ]
        );

        $this->add_control(
            'button_connector_icon',
            [
                'label' => __( 'Icon', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::ICON,
                'options' => Advance_Addons_Icons(),
                'condition' => [
                    'button_connector_hide!' => 'yes',
                    'button_connector_type' => 'icon',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_right',
            [
                'label' => __( 'Right', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'right_button_text',
            [
                'label' => __( 'Text', 'advanced-addons-elementor' ),
                'label_block'=> true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Button Text', 'advanced-addons-elementor' )
            ]
        );

        $this->add_control(
            'right_button_link',
            [
                'label' => __( 'Link', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::URL
            ]
        );

        $this->add_control(
            'right_button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => [
                    'right_button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right .ad-dual-btn-icon--before' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ad-dual-btn--right .ad-dual-btn-icon--after' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }



    /**
     * Register styles related controls
     */
      protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Common', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
            'button_padding',
            [
                'label' => __( 'Padding', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);

		$this->add_responsive_control(
            'button_gap',
            [
                'label' => __( 'Space Between Buttons', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'margin-right: calc({{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .ad-dual-btn--right' => 'margin-left: calc({{SIZE}}{{UNIT}}/2);',
                ],
            ]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn'
            ]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_left_button',
            [
                'label' => __( 'Left Button', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_responsive_control(
            'left_button_padding',
            [
                'label' => __( 'Padding', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'left_button_border',
                'selector' => '{{WRAPPER}} .ad-dual-btn--left'
            ]
		);

        $this->add_responsive_control(
            'left_button_border_radius',
            [
                'label' => __( 'Border Radius', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'left_button_typography',
                'label' => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn--left',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'left_button_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn--left'
            ]
        );

		$this->start_controls_tabs( '_tabs_left_button' );

        $this->start_controls_tab(
            '_tab_left_button_normal',
            [
                'label' => __( 'Normal', 'advanced-addons-elementor' ),
            ]
		);

		$this->add_control(
            'left_button_bg_color',
            [
                'label' => __( 'Background Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'left_button_text_color',
            [
                'label' => __( 'Text Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
            '_tabs_left_button_hover',
            [
                'label' => __( 'Hover', 'advanced-addons-elementor' ),
            ]
		);

		$this->add_control(
            'left_button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'left_button_hover_text_color',
            [
                'label' => __( 'Text Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'left_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--left:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'left_button_border_border!' => ''
                ]
            ]
        );

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_style_connector',
            [
                'label' => __( 'Connector', 'advanced-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_control(
            'connector_notice',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __( 'Connector is hidden now, please enable connector from Content > Connector tab.', 'advanced-addons-elementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                'condition' => [
                    'button_connector_hide' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'connector_text_color',
            [
                'label' => __( 'Text Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn-connector' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'connector_bg_color',
            [
                'label' => __( 'Background Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn-connector' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'connector_typography',
                'label' => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn-connector',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3
            ]
		);

		$this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'connector_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn-connector'
            ]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            '_section_style_right_button',
            [
                'label' => __( 'Right Button', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'right_button_padding',
            [
                'label' => __( 'Padding', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'right_button_border',
                'selector' => '{{WRAPPER}} .ad-dual-btn--right'
            ]
        );

        $this->add_responsive_control(
            'right_button_border_radius',
            [
                'label' => __( 'Border Radius', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'right_button_typography',
                'label' => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-dual-btn--right',
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'right_button_box_shadow',
                'selector' => '{{WRAPPER}} .ad-dual-btn--right'
            ]
        );

        $this->start_controls_tabs( '_tabs_right_button' );

        $this->start_controls_tab(
            '_tab_right_button_normal',
            [
                'label' => __( 'Normal', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'right_button_bg_color',
            [
                'label' => __( 'Background Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_text_color',
            [
                'label' => __( 'Text Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tabs_right_button_hover',
            [
                'label' => __( 'Hover', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'right_button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_hover_text_color',
            [
                'label' => __( 'Text Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_button_hover_border_color',
            [
                'label' => __( 'Border Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-dual-btn--right:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'right_button_border_border!' => ''
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }


	protected function render() {
        $settings = $this->get_settings_for_display();

        // Left button
        $this->add_render_attribute( 'left_button', 'class', 'ad-dual-btn ad-dual-btn--left advanced_addons_btn advanced_addons_btn_solid btn_default' );
        $this->add_render_attribute( 'left_button', 'href', esc_url( $settings['left_button_link']['url'] ) );
        if ( ! empty( $settings['left_button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'left_button', 'target', '_blank' );
        }
        if ( ! empty( $settings['left_button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'left_button', 'rel', 'nofollow' );
        }
        $this->add_inline_editing_attributes( 'left_button_text', 'none' );

        if ( $settings['left_button_icon'] ) {
            $this->add_render_attribute( 'left_button_icon', 'class', [
                'ad-dual-btn-icon',
                'ad-dual-btn-icon--' . esc_attr( $settings['left_button_icon_position'] ),
                esc_attr( $settings['left_button_icon'] )
            ] );
        }

        // Button connector
        $this->add_render_attribute( 'button_connector_text', 'class', 'ad-dual-btn-connector' );
        if ( $settings['button_connector_type'] === 'icon' ) {
            $this->add_render_attribute( 'button_connector_text', 'class', 'ad-dual-btn-connector--icon' );
            $connector = sprintf( '<i class="%s"></i>', esc_attr( $settings['button_connector_icon'] ) );
        } else {
            $this->add_render_attribute( 'button_connector_text', 'class', 'ad-dual-btn-connector--text' );
            $this->add_inline_editing_attributes( 'button_connector_text', 'none' );
            $connector = esc_html( $settings['button_connector_text'] );
        }

        // Right button
        $this->add_render_attribute( 'right_button', 'class', 'ad-dual-btn ad-dual-btn--right advanced_addons_btn advanced_addons_btn_bordered btn_default' );
        $this->add_render_attribute( 'right_button', 'href', esc_url( $settings['right_button_link']['url'] ) );
        if ( ! empty( $settings['right_button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'right_button', 'target', '_blank' );
        }
        if ( ! empty( $settings['right_button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'right_button', 'rel', 'nofollow' );
        }
        $this->add_inline_editing_attributes( 'right_button_text', 'none' );

        if ( $settings['right_button_icon'] ) {
            $this->add_render_attribute( 'right_button_icon', 'class', [
                'ad-dual-btn-icon',
                'ad-dual-btn-icon--' . esc_attr( $settings['right_button_icon_position'] ),
                esc_attr( $settings['right_button_icon'] )
            ] );
        }
        ?>
           
                        <div class="advanced_addons_button_group ">
                            <a <?php echo $this->get_render_attribute_string( 'left_button' ); ?>>
                                    <?php echo esc_html( $settings['left_button_text'] ); ?>
                            </a>
							<a <?php echo $this->get_render_attribute_string( 'right_button' ); ?>>
                                   <?php echo esc_html( $settings['right_button_text'] ); ?>
                            </a>
                            <?php if ( $settings['button_connector_hide'] !== 'yes' ) : ?>
                                <span class="button_group_icon">
                                   <?php echo $connector; ?>
                                </span>
                            <?php endif; ?>
						</div>
        
        <?php
    }

   
}
