<?php
/**
 * Info box widget class
 *
 * @package Advanced_Addons
 */
namespace AAFE\Elementor\Widget;

use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Funfactors extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Fun Factors', 'advanced-addons-elementor' );
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
        return 'hm hm-testimonial';
    }

    public function get_keywords() {
        return [ 'fun factors', 'counter', 'project'];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_media',
			[
				'label' => __( 'Fun factors', 'advanced-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
		    'style',
				[
					'label'   => __( 'Visual Style', 'advanced-addons-elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => __( 'Style 1', 'advanced-addons-elementor' ),
						'style2' => __( 'Style 2', 'advanced-addons-elementor' ),
						'style3' => __( 'Style 3', 'advanced-addons-elementor' ),	
						'style4' => __( 'Style 4', 'advanced-addons-elementor' ),		
						],
				]
        );

		// $this->add_control(
        //     'image',
        //     [
        //         'label'   => __( 'Photo', 'advanced-addons-elementor' ),
        //         'type'    => Controls_Manager::MEDIA,
        //         'default' => [
        //             'url' => Utils::get_placeholder_image_src(),
        //         ],
        //     ]
        // );

    
        // $this->add_group_control(
        //     Group_Control_Image_Size:: get_type(),
        //     [
        //         'name'      => 'thumbnail',
        //         'default'   => 'large',
        //         'separator' => 'none',
        //     ]
        // );
        
        $this->add_control(
                'title',
                [
                    'label'       => __( 'Title', 'advanced-addons-elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( 'Creative work', 'advanced-addons-elementor' ),
                    'placeholder' => __( 'Type Title Here', 'advanced-addons-elementor' ),
                ]
        );

        $this->add_control(
                'value',
                [
                    'label'       => __( 'Count Value', 'advanced-addons-elementor' ),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __( '100', 'advanced-addons-elementor' ),
                    'placeholder' => __( 'Type Count Value', 'advanced-addons-elementor' ),
                ]
        );

        $this->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::ICON,
                'default' => 'fa fa-smile-o',
                'options' => Advance_Addons_Icons(),
                'condition'   => [
                    'style' => ['style2','style3'],
                ],

            ]
        );

        $this->add_control(
            'image2',
            [
                'label'   => __( 'Background Image', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
					'style' => ['style4'],
				],
            ]
        );


   $this->end_controls_section();
        
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls() {

		$this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Section Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => __( 'Section Padding', 'advanced-addons-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .advanced_addons_funfactors_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
            );

            $this->add_control(
                'border_color',
                [
                    'label'     => __( 'Border Color', 'advanced-addons-elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_funfactors_content' => 'border-color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'style' => ['style2'],
                    ],
                ]
            );

            $this->add_control(
                'bg_color',
                [
                    'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .advanced_addons_funfactors_content' => 'background-color: {{VALUE}}',
                    ],
                    'condition'   => [
                        'style' => ['style3'],
                    ],
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
            '_content_style_common',
            [
                'label' => __( 'Title Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'title_typography',
					'label'    => __( 'Typography', 'advanced-addons-elementor' ),
					'selector' => '{{WRAPPER}} .c-title',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);
		
            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .c-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
            '_client_style_common',
            [
                'label' => __( 'Count Value Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'value_typography',
					'label'    => __( 'Typography', 'advanced-addons-elementor' ),
					'selector' => '{{WRAPPER}} .c-value',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);
		
		$this->add_control(
            'value_color',
            [
                'label'     => __( 'Value Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c-value' => 'color: {{VALUE}}',
                ],
            ]
        );

    $this->end_controls_section();

        $this->start_controls_section(
            '_icon_style_common',
            [
                'label' => __( 'Icon Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => [
                    'style' => ['style2','style3'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'icon_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .c-icon i',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
    
        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_bgcolor',
            [
                'label'     => __( 'Icon BG Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

    $this->end_controls_section();
        
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <?php if($settings['style'] === 'style1'):?>
                <div class="advanced_addons_funfactors_area type-1">
                    <h2 class="advanced_addons_funfactors text-center fz-80 text-fff77a c-value"><?php echo esc_html($settings['value']);?></h2>
                   <p class="c-title"><?php echo esc_html($settings['title']);?></p>
                </div>
            <?php endif;?>

            <?php if($settings['style'] === 'style2'):?>
                <div class="advanced_addons_funfactors_area type-2">
                    <div class="advanced_addons_funfactors_content text-center">
                        <span class="blocks-icon d-inline-block c-icon">
                            <i class="<?php echo esc_attr($settings['icon']);?>"></i>
                        </span>
                        <h2 class="advanced_addons_funfactors text-center fz-50 text-2f2f2f c-value"><?php echo esc_html($settings['value']);?></h2>
                        <span class="block-text d-inline-block c-title">
                            <?php echo esc_html($settings['title']);?>
                        </span>
                    </div>
                </div>
            <?php endif;?>

            <?php if($settings['style'] === 'style3'):?>
                <div class="advanced_addons_funfactors_content type-3 text-center">
                    <span class="blocks-icon c-icon">
                        <i class="<?php echo esc_attr($settings['icon']);?>"></i>
                    </span>
                    <div class="block-content">
                            <h2 class="advanced_addons_funfactors font-weight-normal text-center fz-50 c-value"><?php echo esc_html($settings['value']);?></h2>
                        <span class="block-text d-inline-block c-title">
                            <?php echo esc_html($settings['title']);?>
                        </span>
                    </div>
                </div>
            <?php endif;?>
            <?php if($settings['style'] === 'style4'):?>
                    <div class="advanced_addons_funfactors_content type-4 text-left set-bg position-relative" data-bg='<?php echo esc_url($settings['image2']['url']);?>'>
						<div class="overlay position-absolute"></div>
						<div class="block-content">
							<h2 class="advanced_addons_funfactors text-center fz-50 c-value"><?php echo esc_html($settings['value']);?></h2>
						</div>
						<span class="block-text c-title">
                            <?php echo esc_html($settings['title']);?>
						</span>
                    </div>
            <?php endif;?>
        <?php
    }

    public function _content_template() {
        ?>
        <#
        
        #>
        <# if (settings.style === 'style1') { #>
            <div class="advanced_addons_funfactors_area type-1">
                     <h2 class="advanced_addons_funfactors text-center fz-80 text-fff77a c-value">{{ settings.value }}</h2>
                    <p class="c-title">{{ settings.title }}</p>
             </div>
        <# } #> 

        <# if (settings.style === 'style2') { #>
            <div class="advanced_addons_funfactors_area type-2">
                <div class="advanced_addons_funfactors_content text-center">
                    <span class="blocks-icon d-inline-block c-icon">
                        <i class="{{{ settings.icon }}}"></i>
                    </span>
                    <h2 class="advanced_addons_funfactors text-center fz-50 text-2f2f2f c-value">{{ settings.value }}</h2>
                    <span class="block-text d-inline-block c-title">
                        {{ settings.title }}
                    </span>
                </div>
            </div>
        <# } #> 
        <# if (settings.style === 'style3') { #>
            <div class="advanced_addons_funfactors_content type-3 text-center">
                    <span class="blocks-icon c-icon">
                        <i class="{{{ settings.icon }}}"></i>
                    </span>
                    <div class="block-content">
                            <h2 class="advanced_addons_funfactors font-weight-normal text-center fz-50 c-value">{{ settings.value }}</h2>
                        <span class="block-text d-inline-block c-title">
                            {{ settings.title }}
                        </span>
                    </div>
                </div>
        <# } #>

        <# if (settings.style === 'style4') { #>
                 <div class="advanced_addons_funfactors_content type-4 text-left set-bg position-relative" data-bg='{{{ settings.image2.url }}}'>
						<div class="overlay position-absolute"></div>
						<div class="block-content">
							<h2 class="advanced_addons_funfactors text-center fz-50 c-value">{{ settings.value }}</h2>
						</div>
						<span class="block-text c-title">
							{{ settings.title }}
						</span>
                    </div>
         <# } #>
        <?php
    }
}
