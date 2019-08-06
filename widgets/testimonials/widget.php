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

class Testimonials extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Testimonials', 'advanced-addons-elementor' );
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
        return [ 'info', 'blurb', 'box', 'text', 'content' ];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_media',
			[
				'label' => __( 'Testimonial', 'advanced-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'image',
            [
                'label'   => __( 'Photo', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size:: get_type(),
            [
                'name'      => 'thumbnail',
                'default'   => 'large',
                'separator' => 'none',
            ]
        );
        
    $this->add_control(
			'client_name',
			[
				'label'       => __( 'Client Name', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Client Name', 'advanced-addons-elementor' ),
				'placeholder' => __( 'Type Client Name here', 'advanced-addons-elementor' ),
			]
   );

    $this->add_control(
			'desc',
			[
				'label'       => __( 'Content', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type — Injected humour', 'advanced-addons-elementor' ),
				'placeholder' => __( 'Type Content here', 'advanced-addons-elementor' ),
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
						'{{WRAPPER}} .advanced_addons_testimonial_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
            '_content_style_common',
            [
                'label' => __( 'Content Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'content_typography',
					'label'    => __( 'Typography', 'advanced-addons-elementor' ),
					'selector' => '{{WRAPPER}} .block-body p',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);
		
		$this->add_control(
            'con_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
	
		$this->end_controls_section();

		$this->start_controls_section(
            '_client_style_common',
            [
                'label' => __( 'Client Name Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'client_typography',
					'label'    => __( 'Typography', 'advanced-addons-elementor' ),
					'selector' => '{{WRAPPER}} .client',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);
		
		$this->add_control(
            'client_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client' => 'color: {{VALUE}}',
                ],
            ]
        );
	
		$this->end_controls_section();

        
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="advanced_addons_testimonial_card type-1 text-center position-relative single-testi">
							<?php if ( $settings['image']['url'] || $settings['image']['id'] ): 
									$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
									$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
									$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
							
									?>
									<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
							<?php endif; ?>	
								<div class="block-body position-relative">
									<p>
										<?php echo esc_html($settings['desc']);?>
									</p>
								</div>
							<h6 class="position-relative d-inline-block mb-0 client"><?php echo esc_html($settings['client_name']);?></h6>
						</div>
        <?php
    }

    public function _content_template() {
        ?>
        <#
       
        #>
       <div class="advanced_addons_testimonial_card type-1 text-center position-relative single-testi">
			 					<#
                  if ( settings.image.url || settings.image.id ) {
                      var image = {
                         id: settings.image.id,
                         url: settings.image.url,
                         size: settings.thumbnail_size,
                         dimension: settings.thumbnail_custom_dimension,
                         model: view.getEditModel()
                        };
                        var image_url = elementor.imagesManager.getImageUrl( image );
                     #>
                        <img src="{{ image_url }}" alt="" class="img-fluid rounded-circle">
                    <# } #>
								<div class="block-body position-relative">
									<p>
										{{ settings.desc }}
									</p>
											
								</div>
							<h6 class="position-relative d-inline-block mb-0 client"> {{ settings.client_name }}</h6>
						</div>
        <?php
    }
}
