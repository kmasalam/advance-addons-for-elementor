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

class Notice extends Base {

      /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Notice', 'advanced-addons-elementor' );
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
        return 'hm hm-injection';
    }

    public function get_keywords() {
        return [ 'alert', 'notice', 'message'];
    }

    
    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_info',
			[
				'label' => __( 'Alert', 'advanced-addons-elementor' ),
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
			'alert_type',
			[
				'label'   => __( 'Type', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'info',
				'options' => [
					'success' => __( 'Success', 'advanced-addons-elementor' ),
					'warning' => __( 'Warning', 'advanced-addons-elementor' ),
					'danger'  => __( 'Danger', 'advanced-addons-elementor' ),
				],
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your pre title', 'advanced-addons-elementor' ),
				'default'     => __( 'Well done!', 'advanced-addons-elementor' ),
				'label_block' => true,
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
				'label_block' => true,
				'condition'   => [
                    'style' => [ 'style1','style2' ],
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
                'label' => __( 'Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
            'alert_padding',
            [
                'label'      => __( 'Padding', 'advanced-addons-elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_inline_notice type-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


	protected function render() {
        $settings = $this->get_settings_for_display();
  //       if ( ! empty( $settings['alert_type'] ) ) {
		// 	$this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice type-1 mb-60 notice_' . $settings['alert_type'] );
		// }
        ?>
        <?php if($settings['style'] === 'style1'):?>
                <?php 
					if ( ! empty( $settings['alert_type'] ) ) {
								$this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice type-1 mb-60 notice_' . $settings['alert_type'] );
							}
                ?>

            	<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
					<h3>
							<i class="fa fa-check"></i>
							<?php echo esc_html($settings['title']);?>
						</h3>
						<div class="advanced_addons_inline_body bg-white  rounded-0">
							<?php echo esc_html($settings['desc']);?>
						</div>
				</div> 
            <?php endif;?>
            <?php if($settings['style'] === 'style2'):?>
            	 <div  class="pt-60 pb-60">
            	 	<?php 
					if ( ! empty( $settings['alert_type'] ) ) {
								$this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_inline_notice type-1 header-gap mb-60 notice_' . $settings['alert_type'] );
							}
                ?>
            	<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
					<h3>
							<i class="fa fa-check"></i>
							<?php echo esc_html($settings['title']);?>
						</h3>
						<div class="advanced_addons_inline_body bg-white rounded-0">
							<?php echo esc_html($settings['desc']);?>
						</div>
				</div> 
            	<div/>
            <?php endif;?>
        <?php
    }

public function _content_template() {
        ?>
        <#
       
       #>
       <# if (settings.style === 'style1') { #>
         <div class="advanced_addons_inline_notice  type-1 mb-60 notice_{{ settings.alert_type }}">
				<h3>
					<i class="fa fa-check"></i>
					{{ settings.title }}
				</h3>
				<div class="advanced_addons_inline_body bg-white">
					sdsd
					{{ settings.desc }}
				</div>
		</div> 
         <# } #>
        <# if (settings.style === 'style2') { #>
        <div  class="pt-60 pb-60">
        	<div class="advanced_addons_inline_notice  type-1 header-gap mb-60 notice_{{ settings.alert_type }}">
					<h3>
						<i class="fa fa-check"></i>
						{{ settings.title }}
					</h3>
					<div class="advanced_addons_inline_body bg-white">
						sdsd
						{{ settings.desc }}
					</div>
			</div> 
        </div>
       <# } #>
        <?php
    }
}
