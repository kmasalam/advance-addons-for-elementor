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

class Tabs extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Tabs', 'advanced-addons-elementor' );
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
                'label' => __( 'Tabs', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'tab_layout',
            [
                'label'   => esc_html__( 'Layout', 'bdthemes-element-pack' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__( 'Default', 'advanced-addons-elementor' ),
                    'style2'  => esc_html__( 'Boxed', 'advanced-addons-elementor' ),
                    'style3'    => esc_html__( 'Left', 'advanced-addons-elementor' ),
                    'style4'   => esc_html__( 'Right', 'advanced-addons-elementor' ),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label'          => __( 'Title', 'advanced-addons-elementor' ),
				'type'           => Controls_Manager::TEXT,
				'placeholder'   => __( 'Tab Title', 'advanced-addons-elementor' ),
            ]
        );

        $repeater->add_control(
            'desc', [
                'label'         => __( 'Description', 'advanced-addons-elementor' ),
                'placeholder'   => __( 'Tab Description', 'advanced-addons-elementor' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
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
                'title_field' => '<# print(title.slice(0,1).toUpperCase() + title.slice(1)) #>',
                'default'     => [
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'title' => 'Tab1',
                    ],
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'title' => 'Tab2',
                    ],
                    [
						'desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries',
						
						'title' => 'Tab3',
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
            <!-- single tab item -->
            <div class="bg-f7f7f7 pb-120 pt-60">
                <div class="row no-gutters">
                    <div class="col-md-10 offset-md-1">
                        <div class="row no-gutters">
                            <div class="col-md-8 offset-md-2">
                                <div class="advanced_addons_tab_item row no-gutters type-1 d-flex align-items-center">
                                    
                                    <?php
                                    $i= 1;
                                        foreach ( $settings['testimonial'] as $index => $item ) :
                                            $title  = $item['title'];
                                            $desc  = $item['desc'];
                                            $tab_count = $index + 1;
                                            $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                           // $tab_id    = 'advanced-tab-'. $tab_count;
                                    ?>
                                    <a href="#<?php echo $tab_id?>" class="tab-link col text-center  <?php echo $i == 1 ? 'active' : ''?>">
                                        <?php echo esc_html($title);?>
                                    </a>
                                    <?php
                                    $i= 0;
                                     endforeach;

                                     ?>
                                </div>
                            </div>
                        </div>
                        <div class="advanced_addons_tab_content type-1">
                            <?php
                             $i= 1;
                                        foreach ( $settings['testimonial'] as $index => $item ) :
                                            $title  = $item['title'];
                                            $desc  = $item['desc'];
                                            $tab_count = $index + 1;
                                            $tab_id = $item['title'] ? 'advanced-tab-'. $item['title'] . $tab_count : 'advanced-tab-'. $tab_count
                                           // $tab_id    = 'advanced-tab-'. $tab_count;
                                    ?>
                            <div class="block-content <?php echo $i == 1 ? 'active' : ''?>" id="<?php echo $tab_id?>">
                                <p class="mb-0">
                                    <?php echo esc_html($desc);?>
                                </p>
                            </div>
                            <?php
                            $i= 0;
                             endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

   
}
