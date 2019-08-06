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

class Image_Compare extends Base {

      /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Image Compare', 'advanced-addons-elementor' );
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
       return 'hm hm-image-compare';
    }

    public function get_keywords() {
      return [ 'compare', 'image', 'before', 'after' ];
    }

    
    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_images',
			[
				'label' => __( 'Images', 'advanced-addons-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->start_controls_tabs( '_tab_images' );
        $this->start_controls_tab(
            '_tab_before_image',
            [
                'label' => __( 'Before', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'before_image',
            [
                'label' => __( 'Image', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'before_label',
            [
                'label' => __( 'Label', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Before', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type before image label', 'advanced-addons-elementor' ),
                'description' => __( 'Label will not be shown if Hide Overlay is enabled in Settings', 'advanced-addons-elementor' ),
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_after_image',
            [
                'label' => __( 'After', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'after_image',
            [
                'label' => __( 'Image', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'after_label',
            [
                'label' => __( 'Label', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'After', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type after image label', 'advanced-addons-elementor' ),
                'description' => __( 'Label will not be shown if Hide Overlay is enabled in Settings', 'advanced-addons-elementor' ),
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'offset',
            [
                'label' => __( 'Visibility Ratio', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => .1,
                    ],
                ],
                'default' => [
                    'size' => .5,
                ],
            ]
        );

        $this->add_control(
            'orientation',
            [
                'label' => __( 'Orientation', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'horizontal' => [
                        'title' => __( 'Horizontal', 'advanced-addons-elementor' ),
                        'icon' => 'fa fa-arrows-h',
                    ],
                    'vertical' => [
                        'title' => __( 'Vertical', 'advanced-addons-elementor' ),
                        'icon' => 'fa fa-arrows-v',
                    ],
                ],
                'default' => 'horizontal',
            ]
        );

        $this->add_control(
            'hide_overlay',
            [
                'label' => __( 'Hide Overlay', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'advanced-addons-elementor' ),
                'label_off' => __( 'No', 'advanced-addons-elementor' ),
                'return_value' => 'yes',
                'description' => __( 'Hide overlay with before and after label', 'advanced-addons-elementor' )
            ]
        );

        $this->add_control(
            'move_handle',
            [
                'label' => __( 'Move Handle', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'on_swipe',
                'options' => [
                    'on_hover' => __( 'On Hover', 'advanced-addons-elementor' ),
                    'on_click' => __( 'On Click', 'advanced-addons-elementor' ),
                    'on_swipe' => __( 'On Swipe', 'advanced-addons-elementor' ),
                ],
                'description' => __( 'Select handle movement type. Note: overlay does not work with On Hover.', 'advanced-addons-elementor' )
            ]
        );

        $this->end_controls_section();
    }



    /**
     * Register styles related controls
     */
       protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_handle',
            [
                'label' => __( 'Handle', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'handle_color',
            [
                'label' => __( 'Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-handle:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .twentytwenty-handle' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}}',
                    '{{WRAPPER}} .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}}',
                    '{{WRAPPER}} .twentytwenty-handle:before' =>
                        '-webkit-box-shadow: 0 3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
                        . '-moz-box-shadow: 0 3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
                        . 'box-shadow: 0 3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);',
                    '{{WRAPPER}} .twentytwenty-handle:after' =>
                        '-webkit-box-shadow: 0 -3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
                        . '-moz-box-shadow: 0 -3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);'
                        . 'box-shadow: 0 -3px 0 {{VALUE}}, 0px 0px 12px rgba(51, 51, 51, 0.5);',
                ],
            ]
        );

        $this->add_control(
            '_heading_bar',
            [
                'label' => __( 'Handle Bar', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'bar_size',
            [
                'label' => __( 'Size', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc(-0px - {{SIZE}}{{UNIT}} / 2);',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'height: {{SIZE}}{{UNIT}}; margin-top: calc(-0px - {{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_control(
            '_heading_arrow',
            [
                'label' => __( 'Handle Arrow', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'arrow_box_width',
            [
                'label' => __( 'Box Width', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'width: {{SIZE}}{{UNIT}}; margin-left: calc(-1 * ({{SIZE}}{{UNIT}} / 2));',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:before' => 'margin-left: calc(({{SIZE}}{{UNIT}} / 2) - 1px);',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-handle:after' => 'margin-right: calc(({{SIZE}}{{UNIT}} / 2) - 1px);',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_box_height',
            [
                'label' => __( 'Box Height', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'height: {{SIZE}}{{UNIT}}; margin-top: calc(-1 * ({{SIZE}}{{UNIT}} / 2));',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:before' => 'margin-bottom: calc(({{SIZE}}{{UNIT}} / 2) + 2px);',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-handle:after' => 'margin-top: calc(({{SIZE}}{{UNIT}} / 2) + 2px);',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'selector' => '{{WRAPPER}} .twentytwenty-handle',
                'exclude' => [
                     'color'
                ]
            ]
        );

        $this->add_responsive_control(
            'box_border_radius',
            [
                'label' => __( 'Border Radius', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-handle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_label',
            [
                'label' => __( 'Label', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'label_padding',
            [
                'label' => __( 'Padding', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'position_toggle',
            [
                'label' => __( 'Position', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'advanced-addons-elementor' ),
                'label_on' => __( 'Custom', 'advanced-addons-elementor' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'label_offset_y',
            [
                'label' => __( 'Vertical', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before' => 'top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'top: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'position_toggle' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'label_offset_x',
            [
                'label' => __( 'Horizontal', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -10,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-after-label:before' => 'right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-horizontal .twentytwenty-before-label:before' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .twentytwenty-vertical .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-vertical .twentytwenty-after-label:before' => 'left: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'position_toggle' => 'yes',
                ]
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'label_border',
                'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
            ]
        );

        $this->add_responsive_control(
            'label_border_radius',
            [
                'label' => __( 'Border Radius', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __( 'Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_bg_color',
            [
                'label' => __( 'Background Color', 'advanced-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'label_box_shadow',
                'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before'
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .twentytwenty-before-label:before, {{WRAPPER}} .twentytwenty-after-label:before',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }


	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
           <!-- Image Comparison -->
                <div class="advanced_addons_image_compare_area1  pb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div  class="cross2 advanced_addons_image_compare type-1" >
                                   <?php if ( $settings['before_image']['url'] || $settings['before_image']['id'] ) :
                                        $this->add_render_attribute( 'before_image', 'src', $settings['before_image']['url'] );
                                        $this->add_render_attribute( 'before_image', 'alt', Control_Media::get_image_alt( $settings['before_image'] ) );
                                        $this->add_render_attribute( 'before_image', 'title', Control_Media::get_image_title( $settings['before_image'] ) );
                                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'before_image' );
                                    endif;

                                    if ( $settings['after_image']['url'] || $settings['after_image']['id'] ) :
                                        $this->add_render_attribute( 'after_image', 'src', $settings['after_image']['url'] );
                                        $this->add_render_attribute( 'after_image', 'alt', Control_Media::get_image_alt( $settings['after_image'] ) );
                                        $this->add_render_attribute( 'after_image', 'title', Control_Media::get_image_title( $settings['after_image'] ) );
                                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'after_image' );
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Image Comparison -->

	<div class="advanced_addons_funfactors_area type-1 pt-100 pb-100 position-relative">
		<div class="overlay position-absolute"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2 class="advanced_addons_funfactors font-weight-normal text-center fz-80 text-fff77a">196</h2>
					<p>Creative work</p>
				</div>
				<div class="col-md-3">
					<h2 class="advanced_addons_funfactors font-weight-normal text-center fz-80 text-fff77a">120</h2>					
					<p>
						Satisfied Clients
					</p>
				</div>
				<div class="col-md-3">
					<h2 class="advanced_addons_funfactors font-weight-normal text-center fz-80 text-fff77a">250</h2>					
					<p>
						Working Days
					</p>
				</div>
				<div class="col-md-3">
				<h2 class="advanced_addons_funfactors font-weight-normal text-center fz-80 text-fff77a">905</h2>					
				<p>
						Cup of Coffe
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- End Timeline -->
        
        <?php
    }

   
}
