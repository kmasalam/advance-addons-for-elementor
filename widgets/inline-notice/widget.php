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

class Inline_Notice extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Inline Notice', 'advanced-addons-elementor' );
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
        return 'hm hm-accordion-horizontal';
    }

    public function get_keywords() {
        return [ 'inline', 'notice', 'message', 'worning' ];
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
                'default'     => __( 'Download Notice ', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Inline Notice Title', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industrys standard dummy text ever since the 1500swhen an unknown printer took a galley of type and scrambled it to make a typspecimen book.', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Inline Notice description', 'advanced-addons-elementor' ),
                'rows'        => 5
            ]
        );

        // $this->add_control(
		// 	'icon',
		// 	[
		// 		'label' => __( 'Icon', 'advanced-addons-elementor' ),
		// 		'type' => Controls_Manager::ICON,
		// 		'label_block' => true,
		// 		'default' => '',
		// 	]
        // );

        $this->add_responsive_control(
            'align',
            [
                'label'   => __( 'Alignment', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
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
                        'title' => __( 'Justify', 'advanced-addons-elementor' ),
                        'icon'  => 'fa fa-align-justify',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}'
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
                'label' => __( 'Style', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_control(
            'bg_color',
            [
                'label'     => __( 'Background Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .other' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'text_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .other h3' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .other i' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_inline_body' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="advanced_addons_inline_notice notice_success type-1 mb-60 other">
				<h3>
					<i class="fa fa-check"></i>
					<?php echo esc_html($settings['title']);?>
				</h3>
				<div class="advanced_addons_inline_body bg-white">
                    <?php echo esc_html($settings['description']);?>
				</div>
        </div>
        <?php
    }

    public function _content_template() {
        ?>
        <#
        
       #>

       <div class="advanced_addons_inline_notice notice_success type-1 mb-60 other">
				<h3>
					<i class="fa fa-check"></i>
					{{ settings.title }}
				</h3>
				<div class="advanced_addons_inline_body bg-white">
                   {{ settings.description }}
				</div>
        </div>
            
        <?php
    }
}
