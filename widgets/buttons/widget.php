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

class Buttons extends Base {

      /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Buttons', 'advanced-addons-elementor' );
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
        return 'hm hm-play-button';
    }

    public function get_keywords() {
        return [ 'button', 'buttons', 'icon buton'];
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
			'text',
			[
				'label'   => __( 'Text', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => __( 'Click here', 'advanced-addons-elementor' ),
				'placeholder' => __( 'Click here', 'advanced-addons-elementor' ),
			]
        );
        
        $this->add_control(
			'link',
			[
				'label'   => __( 'Link', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'advanced-addons-elementor' ),
				'default'     => [
					'url' => '#',
				],
			]
        );
        
        $this->add_responsive_control(
			'align',
			[
				'label'   => __( 'Alignment', 'advanced-addons-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'advanced-addons-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'advanced-addons-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'advanced-addons-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'advanced-addons-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
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

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'color',
            [
                'label'     => __( 'Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn a' => 'color: {{VALUE}} !important',
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
            'button_padding',
            [
                'label'      => __( 'Padding', 'advanced-addons-elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .ad-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_responsive_control(
            'border_radius',
            [
                'label'      => __( 'Border Radius', 'advanced-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'button_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Box_Shadow:: get_type(),
            [
                'name'     => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .advanced_addons_btn'
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
           
            <button class="advanced_addons_btn advanced_addons_btn_bordered btn_default">
               <a <?php echo $this->get_render_attribute_string( 'link' ); ?> > 
                <?php if($settings['icon']){?>
                    <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                <?php } ?>
                <?php echo esc_html($settings['text']); ?>
                </a>
            </button>
       
        
        <?php
    }

    public function _content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'title', 'none' );
        view.addRenderAttribute( 'title', 'class', 'text-2f2f2f fz-20 font-weight-normal text-uppercase mb-0');
        #>
        <button class="advanced_addons_btn advanced_addons_btn_bordered btn_default">
               <a href="{{{settings.link.url}}}"> 
               <# if (settings.icon) { #>
                    <i class="{{{settings.icon}}}"></i>
                <# } #>
                {{ settings.text }}
                </a>
        </button>

        <?php
    }
}
