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
use Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class Testimonials_Slider extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Testimonials Slider', 'advanced-addons-elementor' );
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
        return 'hm hm-testimonial-carousel';
    }

    public function get_keywords() {
        return [ 'info', 'blurb', 'box', 'text', 'content' ];
	}
	
	protected static function get_profile_names() {
        return [
            'apple' => __( 'Apple', 'advanced-addons-elementor' ),
            'behance' => __( 'Behance', 'advanced-addons-elementor' ),
            'bitbucket' => __( 'BitBucket', 'advanced-addons-elementor' ),
            'codepen' => __( 'CodePen', 'advanced-addons-elementor' ),
            'delicious' => __( 'Delicious', 'advanced-addons-elementor' ),
            'deviantart' => __( 'DeviantArt', 'advanced-addons-elementor' ),
            'digg' => __( 'Digg', 'advanced-addons-elementor' ),
            'dribbble' => __( 'Dribbble', 'advanced-addons-elementor' ),
            'email' => __( 'Email', 'advanced-addons-elementor' ),
            'facebook' => __( 'Facebook', 'advanced-addons-elementor' ),
            'flickr' => __( 'Flicker', 'advanced-addons-elementor' ),
            'foursquare' => __( 'FourSquare', 'advanced-addons-elementor' ),
            'github' => __( 'Github', 'advanced-addons-elementor' ),
            'houzz' => __( 'Houzz', 'advanced-addons-elementor' ),
            'instagram' => __( 'Instagram', 'advanced-addons-elementor' ),
            'jsfiddle' => __( 'JS Fiddle', 'advanced-addons-elementor' ),
            'linkedin' => __( 'LinkedIn', 'advanced-addons-elementor' ),
            'medium' => __( 'Medium', 'advanced-addons-elementor' ),
            'pinterest' => __( 'Pinterest', 'advanced-addons-elementor' ),
            'product-hunt' => __( 'Product Hunt', 'advanced-addons-elementor' ),
            'reddit' => __( 'Reddit', 'advanced-addons-elementor' ),
            'slideshare' => __( 'Slide Share', 'advanced-addons-elementor' ),
            'snapchat' => __( 'Snapchat', 'advanced-addons-elementor' ),
            'soundcloud' => __( 'SoundCloud', 'advanced-addons-elementor' ),
            'spotify' => __( 'Spotify', 'advanced-addons-elementor' ),
            'stack-overflow' => __( 'StackOverflow', 'advanced-addons-elementor' ),
            'tripadvisor' => __( 'TripAdvisor', 'advanced-addons-elementor' ),
            'tumblr' => __( 'Tumblr', 'advanced-addons-elementor' ),
            'twitch' => __( 'Twitch', 'advanced-addons-elementor' ),
            'twitter' => __( 'Twitter', 'advanced-addons-elementor' ),
            'vimeo' => __( 'Vimeo', 'advanced-addons-elementor' ),
            'vk' => __( 'VK', 'advanced-addons-elementor' ),
            'website' => __( 'Website', 'advanced-addons-elementor' ),
            'whatsapp' => __( 'WhatsApp', 'advanced-addons-elementor' ),
            'wordpress' => __( 'WordPress', 'advanced-addons-elementor' ),
            'xing' => __( 'Xing', 'advanced-addons-elementor' ),
            'yelp' => __( 'Yelp', 'advanced-addons-elementor' ),
            'youtube' => __( 'YouTube', 'advanced-addons-elementor' ),
        ];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		
		$this->start_controls_section(
            '_section_social',
            [
                'label' => __( 'Testimonial Slider', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label'          => __( 'Name', 'advanced-addons-elementor' ),
				'type'           => Controls_Manager::TEXT,
				'placeholder'   => __( 'Add Testimonial Name', 'advanced-addons-elementor' ),
            ]
        );

        $repeater->add_control(
            'desc', [
                'label'         => __( 'Description', 'advanced-addons-elementor' ),
                'placeholder'   => __( 'Add Testimonial Description', 'advanced-addons-elementor' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
            ]
		);
		
		$repeater->add_control(
            'image',
            [
                'label'   => __( 'Photo', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'testimonial',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'name' => 'Bappi',
						'image'=> '',
                    ],
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'name' => 'Shaharia Parvez',
						'image'=> '',
                    ],
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'name' => 'Abdus Salam',
						'image'=> '',
                    ]
                ]
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
			<div class="advanced_addons_testimonial_slider  advanced_addons_slider type-1 text-center" dotsClass="advanced_addons_dots type-1" arrows='true' dots='true' nextArrow='<i class="fa fa-chevron-right"></i>' prevArrow='<i class="fa fa-chevron-left"></i>'>
			<?php
                foreach ( $settings['testimonial'] as $item ) :
                    $name  = $item['name'];
                    $desc  = $item['desc'];
                    $image = $item['image']['url'];
            ?>
						<!-- single_item -->
						<div class="single_item">
							<div class="row no-gutters">
								<div class="col-md-8 offset-md-2" >
									<div class="advanced_addons_testimonial_card type-1 text-center position-relative pb-60">
										<img src="<?php echo esc_url($image);?>" class="img-fluid rounded-circle" alt="">
									    <div class="block-body position-relative">
										<p>
											<i>
											<?php echo esc_html($desc);?>
											</i>
										</p>
															
									</div>
				    				<h6 class="position-relative d-inline-block mb-0">
										<?php echo esc_html($name);?></h6>
									</div>
								</div>
							</div>
						</div>
						<!-- single_item -->
						<?php endforeach; ?>
					</div>
        <?php
    }

   
}
