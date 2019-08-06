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

class Timeline extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Timeline', 'advanced-addons-elementor' );
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
        return 'hm hm-share';
    }

    public function get_keywords() {
        return [ 'timeline', 'profile' ];
    }

    protected static function get_profile_names() {
        return [
            'apple'          => __( 'Apple', 'advanced-addons-elementor' ),
            'behance'        => __( 'Behance', 'advanced-addons-elementor' ),
            'bitbucket'      => __( 'BitBucket', 'advanced-addons-elementor' ),
            'codepen'        => __( 'CodePen', 'advanced-addons-elementor' ),
            'delicious'      => __( 'Delicious', 'advanced-addons-elementor' ),
            'deviantart'     => __( 'DeviantArt', 'advanced-addons-elementor' ),
            'digg'           => __( 'Digg', 'advanced-addons-elementor' ),
            'dribbble'       => __( 'Dribbble', 'advanced-addons-elementor' ),
            'email'          => __( 'Email', 'advanced-addons-elementor' ),
            'facebook'       => __( 'Facebook', 'advanced-addons-elementor' ),
            'flickr'         => __( 'Flicker', 'advanced-addons-elementor' ),
            'foursquare'     => __( 'FourSquare', 'advanced-addons-elementor' ),
            'github'         => __( 'Github', 'advanced-addons-elementor' ),
            'houzz'          => __( 'Houzz', 'advanced-addons-elementor' ),
            'instagram'      => __( 'Instagram', 'advanced-addons-elementor' ),
            'jsfiddle'       => __( 'JS Fiddle', 'advanced-addons-elementor' ),
            'linkedin'       => __( 'LinkedIn', 'advanced-addons-elementor' ),
            'medium'         => __( 'Medium', 'advanced-addons-elementor' ),
            'pinterest'      => __( 'Pinterest', 'advanced-addons-elementor' ),
            'product-hunt'   => __( 'Product Hunt', 'advanced-addons-elementor' ),
            'reddit'         => __( 'Reddit', 'advanced-addons-elementor' ),
            'slideshare'     => __( 'Slide Share', 'advanced-addons-elementor' ),
            'snapchat'       => __( 'Snapchat', 'advanced-addons-elementor' ),
            'soundcloud'     => __( 'SoundCloud', 'advanced-addons-elementor' ),
            'spotify'        => __( 'Spotify', 'advanced-addons-elementor' ),
            'stack-overflow' => __( 'StackOverflow', 'advanced-addons-elementor' ),
            'tripadvisor'    => __( 'TripAdvisor', 'advanced-addons-elementor' ),
            'tumblr'         => __( 'Tumblr', 'advanced-addons-elementor' ),
            'twitch'         => __( 'Twitch', 'advanced-addons-elementor' ),
            'twitter'        => __( 'Twitter', 'advanced-addons-elementor' ),
            'vimeo'          => __( 'Vimeo', 'advanced-addons-elementor' ),
            'vk'             => __( 'VK', 'advanced-addons-elementor' ),
            'website'        => __( 'Website', 'advanced-addons-elementor' ),
            'whatsapp'       => __( 'WhatsApp', 'advanced-addons-elementor' ),
            'wordpress'      => __( 'WordPress', 'advanced-addons-elementor' ),
            'xing'           => __( 'Xing', 'advanced-addons-elementor' ),
            'yelp'           => __( 'Yelp', 'advanced-addons-elementor' ),
            'youtube'        => __( 'YouTube', 'advanced-addons-elementor' ),
            'crown'          => __( 'Crown', 'advanced-addons-elementor' ),
            'hornbill'       => __( 'Hornbill', 'advanced-addons-elementor' ),
            'binoculars'     => __( 'Binoculars', 'advanced-addons-elementor' ),
            'cloud-sun'      => __( 'Cloud Sun', 'advanced-addons-elementor' ),
        ];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {

        $this->start_controls_section(
            '_section_social',
            [
                'label' => __( 'Timeline', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'          => __( 'Timeline Icon', 'advanced-addons-elementor' ),
                'type'           => Controls_Manager::SELECT2,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '1st hour ago', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Timeline Title', 'advanced-addons-elementor' ),
                
            ]
        );

        $repeater->add_control(
            'desc',
            [
                'label'       => __( 'Content', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Quis ipsum suspendisse ultrices gravida', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Timeline Description', 'advanced-addons-elementor' ),
                
            ]
        );

    
        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'timeline',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
                        'icon'  => 'facebook',
                        'title' => '1st hour ago',
                        'desc'  => 'Quis ipsum suspendisse ultrices gravida',
                    ],
                    [
                        'icon'  => 'twitter',
                        'title' => '1st hour ago',
                        'desc'  => 'Quis ipsum suspendisse ultrices gravida',
                    ],
                    [
                        'icon'  => 'linkedin',
                        'title' => '1st hour ago',
                        'desc'  => 'Quis ipsum suspendisse ultrices gravida',
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
                'label' => __( 'Timeline Content', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Padding', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_timeline' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_timeline' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_single',
            [
                'label' => __( 'Timeline Content', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Title Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .timeline_item h4',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_item h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'desc_typography',
                'label'    => __( 'Desc Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .timeline_item p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Desc Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_item p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'icon_bgcolor',
            [
                'label'     => __( 'Icon Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .timeline_icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'link', 'class', 'ad-btn' );
        $this->add_render_attribute( 'link', 'href', esc_url( $settings['link']['url'] ) );
        if ( ! empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute( 'link', 'target', '_blank' );
        }
        if ( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
        $this->add_inline_editing_attributes( 'text', 'none' );
        ?>
             <div class="advanced_addons_timeline position-relative type-1">
             <?php
                $i = 0;
                foreach ( $settings['timeline'] as $item ) :
                $i++;
            ?>
              <?php if ( ( $i % 2 ) == 0 ) { ?>
						<!-- Timeline Item -->
						<div class="timeline_item">
							<span class="timeline_icon">
								<i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i>
							</span>
							<div>
								<h4><?php echo esc_html($item['title']);?></h4>
								<p>
                                <?php echo esc_html($item['desc']);?> 
								</p>
							</div>
						</div>
                        <!-- Timeline Item -->
              <?php } else {?>
						<!-- Timeline Item -->
						<div class="timeline_item">
							<span class="timeline_icon">
								<i class="fa fa-<?php echo esc_attr($item['icon']);?>"></i>
							</span>
							<div>
								<h4><?php echo esc_html($item['title']);?></h4>
								<p>
                                <?php echo esc_html($item['desc']);?> 
								</p>
							</div>
						</div>
                        <!-- Timeline Item -->
                <?php } endforeach;?>
						
					</div>
        <?php
    }

}
