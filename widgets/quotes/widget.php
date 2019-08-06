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

class Quotes extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Quotes', 'advanced-addons-elementor' );
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
        return 'hm hm-tree-square';
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
				'label' => __( 'Style', 'advanced-addons-elementor' ),
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
					'style1' => __( 'style 1', 'advanced-addons-elementor' ),
					'style2' => __( 'Style 2', 'advanced-addons-elementor' ),
					
				],
			]
        );
        
        $this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Quotes', 'advanced-addons-elementor' ),
				'placeholder' => __( 'Type Quotes title here', 'advanced-addons-elementor' ),
				'condition'   => [
                    'style' => [ 'style1','style2' ],
                ],
                
			]
        );

        $this->add_control(
			'desc',
			[
				'label'       => __( 'Content', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type — Injected humour', 'advanced-addons-elementor' ),
				'placeholder' => __( 'Type Content here', 'advanced-addons-elementor' ),
				'condition'   => [
                    'style' => [ 'style1','style2' ],
                ],
                
			]
        );
        
        $this->add_control(
			'author',
			[
				'label'       => __( 'Author Name', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '— Injected humour', 'advanced-addons-elementor' ),
				'placeholder' => __( 'Type Author Name here', 'advanced-addons-elementor' ),
				'condition'   => [
                    'style' => [ 'style2' ],
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
                'label' => __( 'Quotes Style', 'advanced-addons-elementor' ),
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
						'{{WRAPPER}} .advanced_addons_quotes_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography:: get_type(),
				[
					'name'     => 'content_typography',
					'label'    => __( 'Typography', 'advanced-addons-elementor' ),
					'selector' => '{{WRAPPER}} .advanced_addons_quotes_card',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				]
			);

	
		$this->end_controls_section();

        
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <?php if($settings['style'] === 'style1'):?>
                <div class="advanced_addons_quotes_card type-1 bg-2f2f2f">
					<blockquote>
						<h5 class="text-white font-weight-normal">
							<?php echo esc_html($settings['title']);?>
						</h5>
						<p>
							<?php echo esc_html($settings['desc']);?>
						</p>
					</blockquote>
				</div>
            <?php endif;?>
            <?php if($settings['style'] === 'style2'):?>
                <div class="advanced_addons_quotes_card type-2 bg-white">
						<blockquote>
							<h5 class="text-2f2f2f font-weight-normal fz-26">
								<?php echo esc_html($settings['title']);?> 
							</h5>
							<p>
								<?php echo esc_html($settings['desc']);?>
							</p>
							<span>
								<?php echo esc_html($settings['author']);?>
							</span>
						</blockquote>
				</div>
            <?php endif;?>
        <?php
    }

    public function _content_template() {
        ?>
        <#
       
       #>
       <# if (settings.style === 'style1') { #>
        <div class="advanced_addons_quotes_card type-1 bg-2f2f2f">
					<blockquote>
						<h5 class="text-white font-weight-normal">
							{{settings.title}}
						</h5>
						<p>
							{{settings.desc}}
						</p>
					</blockquote>
		</div>
         <# } #>
        <# if (settings.style === 'style2') { #>
        <div class="advanced_addons_quotes_card type-2 bg-white">
						<blockquote>
							<h5 class="text-2f2f2f font-weight-normal fz-26">
								{{settings.title}}
							</h5>
							<p>
								{{settings.desc}}
							</p>
							<span>
								{{settings.author}}
							</span>
						</blockquote>
		</div>
       <# } #>
        <?php
    }
}
