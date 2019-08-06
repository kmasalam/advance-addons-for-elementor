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

class Pricing_Tables extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Pricing Tables', 'advanced-addons-elementor' );
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
        return 'hm hm-menu-price';
    }

    public function get_keywords() {
        return [ 'pricing', 'table', 'box' ];
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
						'style3' => __( 'Style 3', 'advanced-addons-elementor' ),	
						'style4' => __( 'Style 4', 'advanced-addons-elementor' ),
						'style5' => __( 'Style 5', 'advanced-addons-elementor' ),		
						'style6' => __( 'Style 6', 'advanced-addons-elementor' ),
						'style7' => __( 'Style 7', 'advanced-addons-elementor' ),	
						'style8' => __( 'Style 8', 'advanced-addons-elementor' ),	
				],
			]
        );
        
      $this->add_control(
			'title',
				[
					'label'       => __( 'Title', 'advanced-addons-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( 'Title', 'advanced-addons-elementor' ),
					'placeholder' => __( 'Type Pricing Title Here', 'advanced-addons-elementor' ),		
				]
			);

			  
      $this->add_control(
			'desc',
				[
					'label'       => __( 'Description', 'advanced-addons-elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has be', 'advanced-addons-elementor' ),
					'placeholder' => __( 'Type Pricing desc Here', 'advanced-addons-elementor' ),	
					'condition'   => [
										'style' => [ 'style8'],
										],	
				]
			);

			$this->add_control(
			'stock',
				[
					'label'       => __( 'Stock', 'advanced-addons-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( 'In Stock', 'advanced-addons-elementor' ),
					'placeholder' => __( 'Type Pricing Stock', 'advanced-addons-elementor' ),	
					'condition' => [	'style' => [ 'style5' ], ],	
				]
			);

	  $this->add_control(
            'image',
           		 [
                'label'     => __( 'Photo', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [ 'url' => Utils::get_placeholder_image_src(),],
                'condition' => [
										'style' => [ 'style2'],
										],
                ]
		    );
				
		$this->end_controls_section();
				
		$this->start_controls_section(
			'_section_price',
				[
					'label' => __( 'Price', 'advanced-addons-elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				]
			);

      $this->add_control(
			'price',
				[
					'label'       => __( 'Price', 'advanced-addons-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( '49', 'advanced-addons-elementor' ),
					'placeholder' => __( 'Type Price here', 'advanced-addons-elementor' ),							
				]
				);

		$this->add_control(
				'price_cur',
						[
							'label'       => __( 'Price Currency', 'advanced-addons-elementor' ),
							'type'        => Controls_Manager::TEXT,
							'default'     => __( '$', 'advanced-addons-elementor' ),
							'placeholder' => __( 'Type Price Currency', 'advanced-addons-elementor' ),
						]
				);

		$this->add_control(
				'price_period',
						[
							'label'       => __( 'Price Period (per)', 'advanced-addons-elementor' ),
							'type'        => Controls_Manager::TEXT,
							'default'     => __( 'Per Month', 'advanced-addons-elementor' ),
							'placeholder' => __( 'Type Price Period', 'advanced-addons-elementor' ),			
						]
        		);
		$this->end_controls_section();
			
			$this->start_controls_section(
            '_section_social',
            [
                'label' => __( 'Fetures', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label'         => __( 'Fetures', 'advanced-addons-elementor' ),
                'placeholder'   => __( 'Add Your Fetures', 'advanced-addons-elementor' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
                
            ]
				);
				$repeater->add_control(
						'show_avai',
						[
							'label'        => __( 'Show Available', 'plugin-domain' ),
							'type'         => Controls_Manager::SWITCHER,
							'label_on'     => __( 'Show', 'advanced-addons-elementor' ),
							'label_off'    => __( 'Hide', 'advanced-addons-elementor' ),
							'return_value' => 'yes',
							'default'      => 'yes',
							// 'condition'    => [
							// 			'style' => [ 'style7'],
							// 			],
						]
				);


        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
					'list',
							[
								'label' => __( 'Futures List', 'advanced-addons-elementor' ),
								'type' => \Elementor\Controls_Manager::REPEATER,
								'fields' => $repeater->get_controls(),
								'default' => [
									[
										'list_title' => __( '24/7 Tech Suport', 'advanced-addons-elementor' ),
										'show_avai'  => '',
									],

									[
										'list_title' => __( 'Lorem ipsum dolor.', 'advanced-addons-elementor' ),
										'show_avai'  => '',
									],

									[
										'list_title' => __( 'ipsum dolor sit amet.', 'advanced-addons-elementor' ),
										'show_avai'  => '',
									],

									[
										'list_title' => __( 'dolor sit amet.', 'advanced-addons-elementor' ),
										'show_avai'  => '',
									],

								],
								'title_field' => '{{{ list_title }}}',
							]
						);

				$this->end_controls_section();
				
		$this->end_controls_section();$this->start_controls_section(
            '_section_footer',
                 [
					'label' => __( 'Footer', 'advanced-addons-elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
                 ]
				);

		$this->add_control(
            'button_text',
            [
                'label'       => __( 'Text', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type button text here', 'advanced-addons-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label'       => __( 'Link', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'advanced-addons-elementor' ),
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
            '_section_ribbon',
					[
						'label' => __( 'Ribbon', 'advanced-addons-elementor' ),
						'tab'   => Controls_Manager::TAB_CONTENT,
					]
				);

		$this->add_control(
			'show_feture',
				[
					'label'   => esc_html__( 'Futured ?', 'advanced-addons-elementor' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
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
		$this->add_render_attribute( 'link', 'class', 'ad-btn' );
        $this->add_render_attribute( 'link', 'href', esc_url( $settings['link']['url'] ) );
        if ( ! empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute( 'link', 'target', '_blank' );
        }
        if ( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
			$this->add_inline_editing_attributes( 'text', 'none' );
			
			$is_feture = '';
			$is_feture2 = '';

			if($settings['show_feture']){
					$is_feture = 'featured';
			}else{
				$is_feture = 'no-featured';
			}

			if($settings['show_feture']){
					$is_feture2 = 'standard';
			}else{
				$is_feture2 = 'no-standard';
			}

			
		?>
		<?php if($settings['style'] === 'style1'):?>
					<div class="advanced_addons_pricing_tbl type-1 <?php echo esc_attr($is_feture);?>">
							<div class="block_head text-center">
								<h4 class="text-afafaf font-weight-semi-bold mb-0"><?php echo esc_html($settings['title']);?></h4>
								<div class="block_circle bg-f5f5f5 rounded-circle d-inline-flex flex-column align-items-center justify-content-center position-relative">
									<span class="block_currency position-absolute">
										<?php echo esc_html($settings['price_cur']);?>
									</span>
									<h3 class="font-weight-normal mb-0"><?php echo esc_html($settings['price']);?></h3>
									<p class="m-0 text-uppercase text-8f8f8f">
										<?php echo esc_html($settings['price_period']);?>
									</p>
								</div>
							</div>
							<div class="block_body text-center">
								<ul class="p-0 m-0 list-style-none">
									<?php foreach (  $settings['list'] as $item ) : ?>
										<li><?php echo esc_html($item['list_title']);?></li>
									<?php endforeach;?>
								</ul>
							</div>
							<div class="block_footer text-center">
								<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
									<button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal">
										<?php echo esc_html( $settings['button_text'] ); ?>
									</button>
								</a>
							</div>
				</div>
		<?php endif;?>
		<?php if($settings['style'] === 'style2'):?>
				<div class="advanced_addons_pricing_tbl type-2 bg-fafafa <?php echo esc_attr($is_feture);?>">
								<div class="block_head text-center">
									<img src="<?php echo esc_url($settings['image']['url']);?>" alt="Failed to Load">
									<h4 class="m-0 fz-35 font-weight-semi-bold "><?php echo esc_html($settings['title']);?></h4>
									<h3 class="m-0 font-weight-semi-bold fz-50">	<?php echo esc_html($settings['price_cur']);?><?php echo esc_html($settings['price']);?></h3>
									<p class="m-0 font-weight-normal fz-14">
										<?php echo esc_html($settings['price_period']);?>
									</p>
								</div>
								<div class="block_body text-center">
									<ul class="p-0 m-0 list-style-none">
										<?php foreach (  $settings['list'] as $item ) : ?>
											<li><?php echo esc_html($item['list_title']);?></li>
										<?php endforeach;?>
									</ul>
								</div>
								<div class="block_footer text-center">
									<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
										<button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal">
											<?php echo esc_html( $settings['button_text'] ); ?>
										</button>
									</a>
								</div>
				</div>
		<?php endif;?>
		<?php if($settings['style'] === 'style3'):?>
				<div class="advanced_addons_pricing_tbl type-8  ">
								<div class="block_head text-center">
									<h4 class="text-777777 font-weight-semi-bold mb-0"><?php echo esc_html($settings['title']);?></h4>
								</div>
								<div class="block_circle rounded-circle  position-absolute">
									<h3 class="font-weight-semi-bold  mb-0"><?php echo esc_html($settings['price_cur']);?><?php echo esc_html($settings['price']);?></h3>
									<p class="m-0 text-lowercase fz-14 text-777777 font-weight-semi-bold ">
										<?php echo esc_html($settings['price_period']);?>
									</p>
								</div>
								<div class="block_body text-center">
									<ul class="list-style-none pl-0 m-0">
										<?php foreach (  $settings['list'] as $item ) : ?>
											<li><span><?php echo esc_html($item['list_title']);?></span></li>
										<?php endforeach;?>
									</ul>
									<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
										<button class="btn advanced_pricing_block_btn bg-white font-size-16 font-weight-normal">
											<?php echo esc_html( $settings['button_text'] ); ?>
										</button>
									</a>
								</div>	
				</div>
		<?php endif;?>

			<?php if($settings['style'] === 'style4'):?>
				<div class="advanced_addons_pricing_tbl type-10  p-table-pk-1">
								<div class="block_head text-center">
									<span class="text-white text-uppercase position-absolute">
										50% OFF
									</span>
									<h4 class="text-white font-weight-semi-bold mb-0">
										<?php echo esc_html($settings['title']);?>
									</h4>
								</div>
								<div class="block_body text-left">
									<ul class="list-style-none  m-0">
										<?php foreach (  $settings['list'] as $item ) : ?>
											<li class="not-available"><?php echo esc_html($item['list_title']);?></li>
										<?php endforeach;?>
										
									</ul>
									
								</div>
								<div class="block_footer text-center bg-white">
										<h2 class="text-865fe1">
										<?php echo esc_html($settings['price']);?>
											<sup>
											<?php echo esc_html($settings['price_cur']);?>
												<span>
												<?php echo esc_html($settings['price_period']);?>
												</span>
											</sup>
										</h2>
									<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
										<button class="btn advanced_pricing_block_btn bg-white font-size-16 font-weight-normal">
												<?php echo esc_html( $settings['button_text'] ); ?>
										</button>
									</a>
								</div>
					</div>
			<?php endif;?>

			<?php if($settings['style'] === 'style5'):?>
		      <div class="advanced_addons_pricing_tbl type-5 bg-transparent  <?php echo esc_attr($is_feture);?>">
						<div class="block_head text-center position-relative">
							<div class="item-availability position-absolute text-whtie font-weight-normal ">
								 <?php echo esc_html($settings['stock']);?>
							</div>
						</div>
						<div class="block_body text-center">
					    <div class="block_body-inner">
							<h4 class="text-white font-weight-semi-bold mb-0 "><?php echo esc_html($settings['price_cur']);?><?php echo esc_html($settings['price']);?></h4>
								<p class="m-0 text-uppercase text-white text-capitalize">
									(<?php echo esc_html($settings['price_period']);?>)	
									</p>
								<ul class="list-style-none p-0 mb-0">
									<li><span><?php echo esc_html($settings['title']);?></span>
										<span>
										<i class="fa fa-question-circle"></i>
									</span>
								</li>
								
								</ul>
							</div>
								<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
										<button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal bg-white">
										<i class="fa fa-opencart"></i>
											<?php echo esc_html( $settings['button_text'] ); ?>
										</button>
								</a>
						</div>
						<div class="block_footer text-center">
								<?php foreach (  $settings['list'] as $item ) : ?>
										<p><?php echo esc_html($item['list_title']);?></p>
								<?php endforeach;?>
						</div>
				</div>
			<?php endif;?>

			<?php if($settings['style'] === 'style6'):?>
					<div class="advanced_addons_pricing_tbl type-6 bg-f7f7f7 ">
								<div class="block_head text-left">
									<h4 class="text-white font-weight-semi-bold mb-0"><?php echo esc_html($settings['title']);?></h4>
								</div>
								<div class="block_body text-center">
									<ul class="list-style-none pl-0  m-0">
										<?php foreach (  $settings['list'] as $item ) : ?>
									 		<?php	if($item['show_avai'] == 'yes') { ?>
													<li class="available"><span><?php echo esc_html($item['list_title']);?></span></li>
											 <?php } else { ?>
													<li class="not-available"><span><?php echo esc_html($item['list_title']);?></span></li>
											 <?php } ?>
										<?php endforeach;?>
									</ul>
									<div class="p-table-price text-left">
										<h3 class="font-weight-bold mb-0 text-7e61d2 fz-40"><?php echo esc_html($settings['price_cur']);?> <?php echo esc_html($settings['price']);?></h3>
										<p class="m-0 text-lowercase text-8f8f8f">
											<?php echo esc_html($settings['price_period']);?>
										</p>
									</div>
								</div>
								<div class="block_footer text-left">
									<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
										<button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal">
											<i class="fa fa-opencart"></i>
												<?php echo esc_html( $settings['button_text'] ); ?>
										</button>
									</a>
								</div>
						</div>
				<?php endif;?>

				<?php if($settings['style'] === 'style7'):?>
						<div class="advanced_addons_pricing_tbl type-4 bg-f9f9f9 <?php echo esc_attr($is_feture);?>">
							<div class="block_head text-center">
								<div class="block_circle bg-f5f5f5 rounded-circle d-inline-flex flex-column align-items-center justify-content-center position-relative">
									<h3 class="font-weight-bold mb-0"><?php echo esc_html($settings['price_cur']);?><?php echo esc_html($settings['price']);?></h3>
									<p class="m-0 text-uppercase fz-14 text-8f8f8f text-capitalize">
										<?php echo esc_html($settings['price_period']);?>		
									</p>
								</div>
								<h4 class="text-afafaf font-weight-semi-bold mb-0"><?php echo esc_html($settings['title']);?></h4>
							</div>
							<div class="block_body text-center">
								<ul class="p-0 m-0 list-style-none">
								   <?php foreach (  $settings['list'] as $item ) : ?>
									 		<?php	if($item['show_avai'] == 'yes') { ?>
													<li class="available"><?php echo esc_html($item['list_title']);?></li>
											 <?php } else { ?>
													<li class="not-available"><?php echo esc_html($item['list_title']);?></li>
											 <?php } ?>
										<?php endforeach;?>
								</ul>
							</div>
							<div class="block_footer text-center">
								<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
									<button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal">
										<?php echo esc_html( $settings['button_text'] ); ?>
									</button>
								</a>
							</div>
						</div>
				<?php endif;?>

				<?php if($settings['style'] === 'style8'):?>
				<div class="advanced_addons_pricing_tbl type-11 bg-fafafa  <?php echo esc_attr($is_feture2);?>">
						<div class="block_head text-center">
							<h4 class="m-0 text-white font-weight-semi-bold "><?php echo esc_html($settings['title']);?></h4>
							<h3 class="m-0 font-weight-normal fz-50 text-white"><?php echo esc_html($settings['price_cur']);?><?php echo esc_html($settings['price']);?></h3>
							<p class="m-0 font-weight-normal fz-14 text-white">
								<?php echo esc_html($settings['price_period']);?>	
							</p>
						</div>
						<div class="block_body text-center">
							<p class="">
								<?php echo esc_html($settings['desc']);?>	
							</p>
							<div class="p-table blank-line"></div>
							<ul class="p-0 m-0 list-style-none">
								<?php foreach (  $settings['list'] as $item ) : ?>
									<?php	if($item['show_avai'] == 'yes') { ?>
											<li class="available"><?php echo esc_html($item['list_title']);?></li>
										<?php } else { ?>
											<li class="not-available"><?php echo esc_html($item['list_title']);?></li>
										<?php } ?>
								<?php endforeach;?>
							</ul>
							<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
								<button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal">
									<i class="fab fa-opencart"></i>
									<?php echo esc_html( $settings['button_text'] ); ?>
								</button>
							</a>
						</div>
					</div>
					<?php endif;?>
        <?php
    }

   
}
