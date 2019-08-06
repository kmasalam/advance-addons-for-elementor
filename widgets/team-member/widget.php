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

class Team_Member extends Base {

      /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Team Member', 'advanced-addons-elementor' );
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
        return 'hm hm-team-member';
    }

    public function get_keywords() {
        return [ 'team', 'member', 'crew', 'staff', 'person' ];
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
			'_section_info',
			[
				'label' => __( 'Information', 'advanced-addons-elementor' ),
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
				],
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
            'title',
            [
                'label'       => __( 'Name', 'advanced-addons-elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Raihan Islam', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Member Name', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'job_title',
            [
                'label'       => __( 'Position', 'advanced-addons-elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Web Developer', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Member Position', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'desc',
            [
                'label'       => __( 'Content', 'advanced-addons-elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Type Member Content', 'advanced-addons-elementor' ),
                'default'     => 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.',
                'condition'   => [
                    'style' => [ 'style2'],
                    ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Title HTML Tag', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h5',
                'toggle'  => false,
            ]
        );


        $this->end_controls_section();

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
        $repeater->start_controls_tab(
            '_tab_icon_hover',
            [
                'label' => __( 'Hover', 'advanced-addons-elementor' ),
            ]
        );


        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'show_profiles',
            [
                'label'        => __( 'Show Profiles', 'plugin-domain' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'advanced-addons-elementor' ),
                'label_off'    => __( 'Hide', 'advanced-addons-elementor' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

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
            '_section_style_content',
            [
                'label' => __( 'Name', 'advanced-addons-elementor' ),
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
                    '{{WRAPPER}} .ad-member-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Name', 'advanced-addons-elementor' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-name' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .ad-member-name',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_job',
            [
                'label' => __( 'Job Title', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'job_title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'job_title_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-position' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'job_title_typography',
                'selector' => '{{WRAPPER}} .ad-member-position',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow:: get_type(),
            [
                'name'     => 'job_title_text_shadow',
                'selector' => '{{WRAPPER}} .ad-member-position',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Description', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'desc_title_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-desc' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'desc_title_typography',
                'selector' => '{{WRAPPER}} .ad-member-desc',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow:: get_type(),
            [
                'name'     => 'desc_title_text_shadow',
                'selector' => '{{WRAPPER}} .ad-member-desc',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_social',
            [
                'label' => __( 'Social Icons', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'links_spacing',
            [
                'label'      => __( 'Right Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_padding',
            [
                'label'      => __( 'Padding', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_icon_size',
            [
                'label'      => __( 'Icon Size', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border:: get_type(),
            [
                'name'     => 'links_border',
                'selector' => '{{WRAPPER}} .ad-member-links li > a'
            ]
        );

        $this->add_responsive_control(
            'links_border_radius',
            [
                'label'      => __( 'Border Radius', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tab_links_colors' );
        $this->start_controls_tab(
            '_tab_links_normal',
            [
                'label' => __( 'Normal', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'links_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            '_tab_links_hover',
            [
                'label' => __( 'Hover', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'links_hover_color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a:hover, {{WRAPPER}} .ad-member-links li > a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a:hover, {{WRAPPER}} .ad-member-links li > a:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_border_color',
            [
                'label'     => __( 'Border Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-member-links li > a:hover, {{WRAPPER}} .ad-member-links li > a:focus' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'links_border_border!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }


	protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'title', 'none' );
        $this->add_render_attribute( 'title', 'class', 'text-2f2f2f fz-20 font-weight-normal text-uppercase  ad-member-name' );
        $this->add_render_attribute( 'title2', 'class', 'text-2f2f2f fz-18 font-weight-semi-bold  mb-0  ad-member-name' );

        $this->add_inline_editing_attributes( 'job_title', 'none' );
        $this->add_render_attribute( 'job_title', 'class', 'ad-member-position' );
        $this->add_render_attribute( 'job_title2', 'class', 'ad-member-position mb-3 text-uppercase text-727272' );

        $this->add_render_attribute( 'desc', 'none' );
        $this->add_render_attribute( 'desc', 'class', 'text-555555 ad-member-desc' );
        ?>
        <?php if($settings['style'] == 'style1') :?>
            <div class="advanced_addons_team_member type-1 text-center bg-fafafa">
                        <?php if ( $settings['image']['url'] || $settings['image']['id'] ) : 
                            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                            $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                            $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                            ?>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                        <?php endif; ?>
                        <div class="ad-member-body">
                            <?php if ( $settings['title'] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    esc_html( $settings['title'] )
                                );
                            endif; ?>
                        </div>
                            <?php if ( $settings['job_title' ] ) : ?>
                                <p <?php echo $this->get_render_attribute_string( 'job_title' ); ?>>
                                    <?php echo esc_html( $settings['job_title' ] ); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ( $settings['show_profiles' ] && is_array( $settings['profiles' ] ) ) : ?>
                            <div class="hoverable-block position-absolute bg-white text-center">
                                <ul class="pl-0 list-style-none d-inline-flex ad-member-links ">
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
                                            <?php
                                            printf( '<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
                                                $url,
                                                esc_attr( $profile['_id'] ),
                                                esc_attr( $icon )
                                            );
                                            ?>
                                        </li>
                                        <?php
                                    endforeach; ?>
                                    
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                <?php endif; ?>

            <?php if($settings['style'] == 'style2') :?>
                <div class="advanced_addons_team_member type-1 media-style text-center bg-white ad-member-body">
						<div class="d-flex block-head align-items-center">
                        <?php if ( $settings['image']['url'] || $settings['image']['id'] ) : 
                            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                            $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                            $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                            ?>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                        <?php endif; ?>
							<ul class="advanced_addons_icon_group pl-0 list-style-none d-inline-flex bordered-icon mb-0 type-2 ml-3 ad-member-links">
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
                                        <?php
                                                printf( '<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
                                                    $url,
                                                    esc_attr( $profile['_id'] ),
                                                    esc_attr( $icon )
                                                );
                                                ?>
                                    </li>
                                 <?php endforeach;?>
							</ul>
						</div>
						
						<div class="block-body text-left">
                             <?php if ( $settings['title'] ) :
                                printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title2' ),
                                    esc_html( $settings['title'] )
                                );
                            endif; ?>
							 <?php if ( $settings['job_title' ] ) : ?>
                                <p <?php echo $this->get_render_attribute_string( 'job_title2' ); ?>>
                                    <?php echo esc_html( $settings['job_title' ] ); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ( $settings['desc' ] ) : ?>
                                <p <?php echo $this->get_render_attribute_string( 'desc' ); ?>>
                                    <?php echo esc_html( $settings['desc' ] ); ?>
                                </p>
                            <?php endif; ?>
						</div>
						
                    </div>
                <?php endif; ?>
        <?php
    }

    public function _content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'title', 'none' );
        view.addRenderAttribute( 'title', 'class', 'text-2f2f2f fz-20 font-weight-normal text-uppercase mb-0 ad-member-name');
        view.addRenderAttribute( 'title2', 'class', 'text-2f2f2f fz-18 font-weight-semi-bold  mb-0 ad-member-name');

        view.addInlineEditingAttributes( 'job_title', 'none' );
        view.addRenderAttribute( 'job_title', 'class', 'ad-member-position' );
        view.addRenderAttribute( 'job_title2', 'class', 'ad-member-position mb-3 text-uppercase text-727272' );

        view.addRenderAttribute( 'desc', 'class', 'ad-member-desc text-555555' );
        
        #>
        <# if (settings.style === 'style1') { #>
                <div class="advanced_addons_team_member type-1 text-center bg-fafafa">
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
                            <img src="{{ image_url }}" alt="">
                        <# } #>
                            <# if (settings.title) { #>
                                <{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title' ) }}}>{{ settings.title }}</{{ settings.title_tag }}>
                            <# } #>
                            <# if (settings.job_title) { #>
                                <p  {{{ view.getRenderAttributeString( 'job_title' ) }}}>
                                    {{ settings.job_title }}
                                </p>
                            <# } #>
                            <# if (settings.show_profiles && _.isArray(settings.profiles)) { #>
                                <div class="hoverable-block position-absolute bg-white text-center">
                                    <ul class="pl-0 list-style-none d-inline-flex  mb-0 ">
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

                                            view.addRenderAttribute( linkKey, 'class', 'elementor-repeater-item-' + profile._id );
                                            view.addRenderAttribute( linkKey, 'href', url ); #>
                                            <li><a {{{view.getRenderAttributeString( linkKey )}}}><i class="fa fa-{{{icon}}}"></i></a></li>
                                        <# }); #>
                                    </ul>
                                </div>
                            <# } #>
                        </div>
                <# } #>

                <# if (settings.style === 'style2') { #>
                    <div class="advanced_addons_team_member type-1 media-style text-center bg-white">
						<div class="d-flex block-head align-items-center">
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
                            <img src="{{ image_url }}" class="mb-0" alt="">
                        <# } #>
                            <# if (settings.show_profiles && _.isArray(settings.profiles)) { #>
                                <ul class="advanced_addons_icon_group pl-0 list-style-none d-inline-flex bordered-icon mb-0 type-2 ml-3 ad-member-links">
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

                                            view.addRenderAttribute( linkKey, 'class', 'elementor-repeater-item-' + profile._id );
                                            view.addRenderAttribute( linkKey, 'href', url ); #>
                                        <li>
                                            <a {{{view.getRenderAttributeString( linkKey )}}}>
                                                <i class="fa fa-{{{icon}}}"></i>
                                            </a>
                                        </li>
                                    <# }); #>
                                </ul>
                            <# } #>
						</div>
						
						<div class="block-body text-left">
                        <# if (settings.title) { #>
                                <{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title2' ) }}}>{{ settings.title }}</{{ settings.title_tag }}>
                            <# } #>
							<# if (settings.job_title) { #>
                                <p  {{{ view.getRenderAttributeString( 'job_title' ) }}}>
                                    {{ settings.job_title }}
                                </p>
                            <# } #>
                            <# if (settings.desc) { #>
							<p {{{ view.getRenderAttributeString( 'desc' ) }}}>
                                {{ settings.desc }}
                            </p>
                            <# } #>
						</div>
						
					</div>
                <# } #>
        <?php
    }
}
