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

class Alert extends Base {

      /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Alert', 'advanced-addons-elementor' );
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
			'alert_type',
			[
				'label'   => __( 'Type', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'info',
				'options' => [
					'primary' => __( 'Primary', 'advanced-addons-elementor' ),
					'success' => __( 'Success', 'advanced-addons-elementor' ),
					'warning' => __( 'Warning', 'advanced-addons-elementor' ),
					'danger'  => __( 'Danger', 'advanced-addons-elementor' ),
				],
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'pre_title',
			[
				'label'       => __( ' Pre Title', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your pre title', 'advanced-addons-elementor' ),
				'default'     => __( 'Well done!', 'advanced-addons-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'alert_title',
			[
				'label'       => __( 'Title', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'advanced-addons-elementor' ),
				'default'     => __( 'You successfully read this important alert message.', 'advanced-addons-elementor' ),
				'label_block' => true,
			]
        );
        
        $this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => '',
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
                    '{{WRAPPER}} .advanced_addons_alert' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }


	protected function render() {
        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['alert_type'] ) ) {
			$this->add_render_attribute( 'wrapper', 'class', 'advanced_addons_alert advanced_addons_primary advanced_addons_alert_bordered mb-2 advanced_addons_' . $settings['alert_type'] );
		}
        ?>
          <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
				<span>
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
				</span>
				<p>
					<strong><?php echo esc_html($settings['pre_title']); ?></strong>
					<?php echo esc_html($settings['alert_title']); ?>
				</p>
			</div> 
        <?php
    }

    public function _content_template() {

        ?>
        <div class="advanced_addons_alert advanced_addons_{{ settings.alert_type }} advanced_addons_alert_bordered mb-2">
				<span>
					<i class="{{{settings.icon}}}"></i>
				</span>
				<p>
					<strong>{{ settings.pre_title }}</strong>
					{{ settings.alert_title }}
				</p>
		</div> 

        <?php
    }
}
