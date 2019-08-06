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

class Post_block extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Post Block', 'advanced-addons-elementor' );
    }

    public function get_query() {
		return $this->_query;
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
        return 'hm hm-blog-content';
    }

    public function get_keywords() {
        return [ 'post', 'block', 'blog', 'recent', 'news' ];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Post Section', 'advanced-addons-elementor' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'show_Column',
			[
				'label'   => __( 'Show Column', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'6' => __( 'Two', 'advanced-addons-elementor' ),
					'4' => __( 'There', 'advanced-addons-elementor' ),
					'3' => __( 'Four', 'advanced-addons-elementor' ),
				],
				'default' => 4,
			]
		);

        $this->add_control(
			'posts_limit',
			[
				'label'   => esc_html__( 'Posts Limit', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
			]
		);

        $this->add_control(
			'show_date',
			[
				'label'   => esc_html__( 'Date', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
        );
        
        $this->add_control(
			'show_author',
			[
				'label'   => esc_html__( 'Author', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
                'label' => __( 'Post Content', 'advanced-addons-elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_blog_post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

    
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Post Title', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .block_post_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Title Bottom Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'text_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_meta',
            [
                'label' => __( 'Post Meta', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_meta_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .block_post_meta li a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'meta_spacing',
            [
                'label'      => __( 'Post Meta Bottom Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_meta li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'meta_color',
            [
                'label'     => __( 'Post Meta Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_meta li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_desc',
            [
                'label' => __( 'Post Description', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_desc_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .block_post_body p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_responsive_control(
            'desc_spacing',
            [
                'label'      => __( 'Description Bottom Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_body' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_body p' => 'color: {{VALUE}}',
                ],
            ]
        );

        
        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'Button', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'post_footer_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .block_post_footer a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_responsive_control(
            'button_spacing',
            [
                'label'      => __( 'Button Bottom Spacing', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .block_post_footer' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .block_post_footer a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }



	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="row">
            <?php 
           	$args = array(
                'posts_per_page' => $settings['posts_limit'],
                'post_status'    => 'publish'
            );
            $wp_query = new \WP_Query($args);
            ?>
            <?php while($wp_query->have_posts()):$wp_query->the_post();?>
                <div class="col-sm-6 col-lg-<?php echo esc_attr($settings['show_Column']);?>">
					<!-- Single post block -->
					<div class="advanced_addons_blog_post type-1 mb-4">
						<img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
						<a href="<?php the_permalink();?>" class="block_post_title text-2f2f2f text-uppercase">
							<?php the_title();?>
						</a>
						<ul class="block_post_meta mb-0 pl-0 list-style-none d-flex">
                            <?php if($settings['show_date']):?>
                                <li>
                                    <a href="#">
                                        <?php the_time('j F Y');?>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if($settings['show_author']):?>
                                <li>
                                    <a href="#">
                                        <?php the_author();?>
                                    </a>
                                </li>
                            <?php endif;?>
						</ul>
						<div class="block_post_body">
			    			<p>
							<?php echo wp_trim_words(get_the_content(),38,' ');?>
							</p>
						</div>
						<div class="block_post_footer">
							<a href="<?php the_permalink();?>">
								<?php echo esc_html_e('Read More');?>
							</a>
						</div>
					</div>
					<!-- End Single post block -->
                </div>
                <?php endwhile;?>
            </div>

        <?php
    }

    
}
