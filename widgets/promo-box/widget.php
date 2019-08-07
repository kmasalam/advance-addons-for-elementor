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

class Promo_Box extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Promo Box', 'advanced-addons-elementor' );
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
        return 'hm hm-bulb';
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
        // Visual Style
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
                    
                ],
            ]
        );
        // Title Here
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'advanced-addons-elementor' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'New offer for this summer', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Promo Box Title', 'advanced-addons-elementor' ),
                'condition'   => [
                    'style' => [ 'style1','style2','style3','style4','style5' ],
                ],
            ]
        );
        // Description
        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Promo box description', 'advanced-addons-elementor' ),
                'rows'        => 5,
                'condition'   => [
                    'style' => [ 'style1','style2','style3'],
                ],
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
            'button2_text',
            [
                'label'       => __( 'Button 2 Text', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Purchase now', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type button text here', 'advanced-addons-elementor' ),
                'label_block' => true,
                'condition'   => [
                    'style' => [ 'style3'],
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label'       => __( 'Link', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'advanced-addons-elementor' ),
                'show_external' => true,
                'default' => [
                    'url' => 'https://example.com/',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'link2',
            [
                'label'       => __( 'Link2', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'advanced-addons-elementor' ),
                'show_external' => true,
                'default' => [
                    'url' => 'https://example.com/',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition'   => [
                    'style' => [ 'style3'],
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
                'label' => __( 'PromoBox Content', 'advanced-addons-elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_promo_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_promo_box' => 'background-color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .advanced_addons_promo_box h5',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_promo_box h5' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .advanced_addons_promo_box p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_promo_box p' => 'color: {{VALUE}}',
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
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

        $this->add_inline_editing_attributes( 'text', 'none' );
        ?>
        <?php if($settings['style'] === 'style1'):?>
                <div class="advanced_addons_promo_box type-1 d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="text-2f2f2f  fz-24 font-weight-normal text-uppercase"><?php echo esc_html( $settings['title'] ); ?></h5>
                    <p class="mb-0">
                         <?php echo wp_kses_data( $settings['description'] ); ?>
                    </p>
                </div>
                <div>
                        <?php
                            echo '<a href="' . $settings['link']['url'] . '"' . $target . $nofollow . ' class="advanced_addons_btn advanced_addons_btn_solid btn_default"> ' .esc_html( $settings['button_text'] ) . '</a>';
                        ?>
                </div>
            </div>
            <?php endif;?>
            <?php if($settings['style'] === 'style2'):?>
                <div class="advanced_addons_promo_box type-1 radius-style d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="text-2f2f2f  fz-24 font-weight-normal text-capitalize">
                           <?php echo esc_html( $settings['title'] ); ?>
                            </h5>
                            <p class="mb-0">
                                 <?php echo wp_kses_data( $settings['description'] ); ?>
                            </p>
                        </div>
                        <div>
                             <?php
                            echo '<a href="' . $settings['link']['url'] . '"' . $target . $nofollow . ' class="advanced_addons_btn advanced_addons_btn_solid btn_default"> ' .esc_html( $settings['button_text'] ) . '</a>';
                        ?>
                        </div>
                    </div>
            <?php endif;?>
             <?php if($settings['style'] === 'style3'):?>
                <div class="pt-100 pb-100  position-relative advanced_addons_callto_action_area type-2" >
                    <div class="overlay position-absolute"></div>
                    <div class="advanced_addons_callto_action type-2 text-center position-relative ">
                        <h4 class="text-white">
                             <?php echo esc_html( $settings['title'] ); ?>
                        </h4>
                        <p class="text-white">
                            <?php echo wp_kses_data( $settings['description'] ); ?>
                        </p>
                        <div>
                            <?php
                            echo '<a href="' . $settings['link']['url'] . '"' . $target . $nofollow . ' class="advanced_addons_btn advanced_addons_btn_bordered btn_default btn_pill"> ' .esc_html( $settings['button_text'] ) . '</a>';
                        ?>
                        <?php
                            echo '<a href="' . $settings['link2']['url'] . '"' . $target . $nofollow . '  class="advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill"> ' .esc_html( $settings['button_text'] ) . '</a>';
                        ?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($settings['style'] === 'style4'):?>
                <div>
                    <div class="advanced_addons_callto_action type-2 promo-box text-left ">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-7">
                                <h4 > 
                                    <?php echo esc_html( $settings['title'] ); ?>
                                </h4>
                                    <p >
                                       <?php echo wp_kses_data( $settings['description'] ); ?>
                                    </p>
                                    <div>
                                         <?php
                                    echo '<a href="' . $settings['link']['url'] . '"' . $target . $nofollow . ' class="advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill"> ' .esc_html( $settings['button_text'] ) . '</a>';
                                ?>
                                    </div>
                            </div>
                            <div class="col-md-5">
                                <img src="assets/images/promo-box/promo-pc.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>

        <?php
    }

    public function _content_template() {
        ?>
        <#

        #>
        <# if (settings.style === 'style1') { #>
         <div class="advanced_addons_promo_box type-1 d-flex align-items-center justify-content-between">
            <div>
                <h5 class="text-2f2f2f  fz-24 font-weight-normal text-uppercase">{{ settings.title }}</h5>
                <p class="mb-0">
                  {{ settings.description }}
                </p>
            </div>
            <div>
                <a href="{{{ settings.link.url }}}">
                    <button class="advanced_addons_btn advanced_addons_btn_solid btn_default">
                    {{ settings.button_text }}
                    </button>
                </a>
            </div>
        </div> 
         <# } #> 
         <# if (settings.style === 'style2') { #>
         <div class="advanced_addons_promo_box type-1 radius-style d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="text-2f2f2f  fz-24 font-weight-normal text-capitalize">
                           {{ settings.title }}
                            </h5>
                            <p class="mb-0">
                                {{ settings.description }}
                            </p>
                        </div>
                        <div>
                            <a href="{{{ settings.link.url }}}" class="advanced_addons_btn advanced_addons_btn_solid btn_default">
                                 {{ settings.button_text }}
                            </a>
                        </div>
                    </div>
         <# } #> 
         <# if (settings.style === 'style3') { #>
         <div class="pt-100 pb-100 position-relative advanced_addons_callto_action_area type-2" >
            <div class="overlay position-absolute"></div>
                    <div class="advanced_addons_callto_action type-2 text-center position-relative ">
                        <h4 class="text-white">
                             {{ settings.title }}
                        </h4>
                        <p class="text-white">
                           {{ settings.description }}
                        </p>
                        <div>
                            <a href="{{{ settings.link.url }}}" class="advanced_addons_btn advanced_addons_btn_bordered btn_default btn_pill">
                                  {{ settings.button_text }}
                            </a>
                            <a href="{{{ settings.link2.url }}}" class="advanced_addons_btn advanced_addons_btn_solid btn_default btn_pill">
                                {{ settings.button_text }}
                            </a>
                        </div>
                    </div>
                </div>
         <# } #> 
        <?php
    }
}
