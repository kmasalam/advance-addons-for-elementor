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

class Search_Box extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Search Box', 'advanced-addons-elementor' );
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
        return 'hm hm-search';
    }

    public function get_keywords() {
        return [ 'info', 'blurb', 'box', 'Promo Box', 'call to action' ];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'advanced-addons-elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Search hare', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Search Title', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy ', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Search description', 'advanced-addons-elementor' ),
                'rows'        => 5
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'advanced-addons-elementor' ),
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
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Search Box Content', 'advanced-addons-elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_search_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_search_box' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_search_box h4',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_search_box h4' => 'color: {{VALUE}}',
                ],
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

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'desc_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_search_box p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_search_box p' => 'color: {{VALUE}}',
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
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'button_bgcolor',
            [
                'label'     => __( 'Button Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'button_bordercolor',
            [
                'label'     => __( 'Button Border Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_btn' => 'border-color: {{VALUE}}',
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
            
            <div class="advanced_addons_search_box type-1 bg-white">
						<div class="row no-gutters">
							<div class="col-sm-3">
								<h4 class="fz-24 mb-0 font-weight-normal text-uppercase mb-0"><?php echo esc_html( $settings['title'] ); ?></h4>
								<p>
                                 <?php echo wp_kses_data( $settings['description'] ); ?>
								</p>
							</div>
							<div class="col-sm-9 d-flex align-items-center">
								<div class="advanced_addons_form_group w-100">
                                        <input type="text" placeholder="Search topics or keywords" class="advanced_addons_field bg-fafafa rounded-0">
                                        <div class="advanced_addons_prefend">
                                            <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                                                <button class="advanced_addons_btn advanced_addons_btn_solid btn_default">
                                                <?php echo esc_html( $settings['button_text'] ); ?>
                                                </button>
                                            </a>
                                        </div>
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
        <div class="advanced_addons_search_box type-1 bg-white">
						<div class="row no-gutters">
							<div class="col-sm-3">
								<h4 class="fz-24 mb-0 font-weight-normal text-uppercase mb-0">{{ settings.title }}</h4>
								<p>
                                {{ settings.description }} 
								</p>
							</div>
							<div class="col-sm-9 d-flex align-items-center">
								<div class="advanced_addons_form_group w-100">
									<input type="text" placeholder="Search topics or keywords" class="advanced_addons_field bg-fafafa rounded-0">
									<div class="advanced_addons_prefend">
                                        <a href="{{{ settings.link.url }}}">
                                            <button class="advanced_addons_btn advanced_addons_btn_solid btn_default">
                                            {{ settings.button_text }}
                                            </button>
                                        </a>
									</div>
								</div>
							</div>
						</div>
					</div>
        <?php
    }
}
