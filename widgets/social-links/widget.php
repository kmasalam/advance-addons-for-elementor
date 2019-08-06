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

class Social_links extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Social Links', 'advanced-addons-elementor' );
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
        return [ 'socail', 'links', 'feed'];
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
                'label' => __( 'Social Profiles', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label'          => __( 'Profile Name', 'advanced-addons-elementor' ),
                'type'           => Controls_Manager::SELECT2,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label'         => __( 'Profile Link', 'advanced-addons-elementor' ),
                'placeholder'   => __( 'Add your profile link', 'advanced-addons-elementor' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
                'condition'     => [
                    'name!' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'email', [
                'label'       => __( 'Email Address', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Add your email address', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false,
                'input_type'  => 'email',
                'condition'   => [
                    'name' => 'email'
                ]
            ]
        );


        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
            'profiles',
            [
                'show_label'  => false,
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default'     => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
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
                'label' => __( 'Social Links Content', 'advanced-addons-elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_social_links' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_social_links' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_single',
            [
                'label' => __( 'Single Social', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'single_bgcolor',
            [
                'label'     => __( 'Single Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_social_links.type-1 ul li' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .block_label a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_label a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'icon_bgcolor',
            [
                'label'     => __( 'Icon Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'link_color',
            [
                'label'     => __( 'Link Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_link' => 'color: {{VALUE}}',
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
            <div class="advanced_addons_social_links type-1">
                <div class="block-body">
                     <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <ul class="list-style-none pl-0 mb-0">
                                <?php
                                foreach ( $settings['profiles'] as $profile ) :
                                    $icon = $profile['name'];
                                    $url = esc_url( $profile['link']['url'] );

                                    if ($profile['name'] === 'website') {
                                        $icon = 'globe';
                                    } elseif ($profile['name'] === 'email') {
                                        $icon = 'envelope';
                                        $url = 'mailto:' . antispambot( $profile['email'] );
                                    }
                                    ?>
								<li>
									<span class="block_icon">
										<i class="fa fa-<?php echo esc_attr( $icon);?>"></i>
									</span>
									<span class="block_label">
										<a href="<?php echo esc_url($url);?>"><?php echo esc_html($profile['name']);?></a>
									</span>
									<span class="block_link">
										<?php echo esc_url($url);?>
									</span>
								</li>
							  <?php endforeach; ?>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    public function _content_template() {
        ?>
        <#

        #>
       <div class="advanced_addons_social_links type-1">
                <div class="block-body">
                     <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <ul class="list-style-none pl-0 mb-0">
                                <# _.each(settings.profiles, function(profile, index) {
                                        var icon = profile.name,
                                            url = profile.link.url,
                                            linkKey = view.getRepeaterSettingKey( 'profile', 'profiles', index);

                                        if (profile.name === 'website') {
                                            icon = 'globe';
                                        } else if (profile.name === 'email') {
                                            icon = 'envelope'
                                            url = 'mailto:' + profile.email;
                                        }

    
                                        view.addRenderAttribute( linkKey, 'href', url ); 
                                #>
								<li>
									<span class="block_icon">
										<i class="fa fa-facebook-f"></i>
									</span>
									<span class="block_label">
										<a {{{view.getRenderAttributeString( linkKey )}}}>{{ profile.name }}</a>
									</span>
									<span class="block_link">
										{{url}}
									</span>
								</li>
								<# }); #>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
