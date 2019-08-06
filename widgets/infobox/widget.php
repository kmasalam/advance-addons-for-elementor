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

class InfoBox extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Info Box', 'advanced-addons-elementor' );
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
        return 'hm hm-info';
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
				'label' => __( 'Icon', 'advanced-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'icon',
            [
                'label'   => __( 'Icon', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::ICON,
                'default' => 'fa fa-smile-o',
                'options' => Advance_Addons_Icons(),

            ]
        );

        $this->end_controls_section();

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
                'default'     => __( 'UX / UI Designer', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type Info Box Title', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry ', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type info box description', 'advanced-addons-elementor' ),
                'rows'        => 5
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
                'default' => 'h2',
                'toggle'  => false,
            ]
        );

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
                'default'     => __( 'Button Text', 'advanced-addons-elementor' ),
                'placeholder' => __( 'Type button text here', 'advanced-addons-elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Link', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'advanced-addons-elementor' ),
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label'   => __( 'Icon', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::ICON,
                'options' => Advance_Addons_Icons(),
                'default' => 'fa fa-angle-right'
            ]
        );

        $this->add_control(
            'button_icon_position',
            [
                'label'       => __( 'Icon Position', 'advanced-addons-elementor' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options'     => [
                    'before' => [
                        'title' => __( 'Before', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'advanced-addons-elementor' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'default'   => 'after',
                'toggle'    => false,
                'condition' => [
                    'button_icon!' => '',
                ],
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label'   => __( 'Icon Spacing', 'advanced-addons-elementor' ),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => [
                    'button_icon!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ad-btn--icon-before .ad-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .ad-btn--icon-after .ad-btn-icon'  => 'margin-left: {{SIZE}}{{UNIT}};',
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
                'label' => __( 'Info Content', 'advanced-addons-elementor' ),
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
                    '{{WRAPPER}} .advanced_addons_service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __( 'Icon', 'advanced-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_service > i',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_service > i' => 'color: {{VALUE}}',
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
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-infobox-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-infobox-title' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .ad-infobox-text',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'desc_color',
            [
                'label'     => __( 'Description Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-infobox-text' => 'color: {{VALUE}}',
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

		$this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Text Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'btn_typography',
                'label'    => __( 'Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .ad-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );


        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'none' );
        $this->add_render_attribute( 'title', 'class', 'fz-20 font-weight-normal text-2f2f2f ad-infobox-title' );

        $this->add_inline_editing_attributes( 'description', 'basic' );
        $this->add_render_attribute( 'description', 'class', 'ad-infobox-text  fz-14' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'ad-btn-text' );

        $this->add_render_attribute( 'button', 'class', 'ad-btn ad-btn--link' );
        $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        if ( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }
        if ( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->set_render_attribute( 'button', 'rel', 'nofollow' );
        }
        ?>

        <div class="advanced_addons_service bordered rounded rounded-12 type-1 bg-white">

            <i class="<?php echo esc_attr( $settings['icon'] ); ?> fz-40 text-e0e0e0"></i>
            <?php
            if ( $settings['title' ] ) :
                printf( '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape( $settings['title_tag'] ),
                    $this->get_render_attribute_string( 'title' ),
                    esc_html( $settings['title' ] )
                );
            endif;
            ?>
            <?php if ( $settings['description'] ) : ?>
                <p <?php echo $this->get_render_attribute_string( 'description' ); ?>>
                 <?php echo wp_kses_data( $settings['description'] ); ?>
                </p>
            <?php endif; ?>
			<?php
            if ( $settings['button_text'] && empty( $settings['button_icon'] ) ) :
                printf( '<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) )
                );
            elseif ( empty( $settings['button_text'] ) && $settings['button_icon'] ) :
                printf( '<a %1$s>%2$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    sprintf( '<i class="%1$s"></i>', esc_attr( $settings['button_icon'] ) )
                );
            elseif ( $settings['button_text'] && $settings['button_icon'] ) :
                if ( $settings['button_icon_position'] === 'before' ) :
                    $this->add_render_attribute( 'button', 'class', 'ad-btn--icon-before' );
                    $btn_before = sprintf( '<i class="ad-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                    $btn_after = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                else :
                    $this->add_render_attribute( 'button', 'class', 'ad-btn--icon-after' );
                    $btn_before = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                    $btn_after = sprintf( '<i class="ad-btn-icon %1$s"></i>', esc_attr( $settings['button_icon'] ) );
                endif;
                printf( '<a %1$s>%2$s %3$s</a>',
                    $this->get_render_attribute_string( 'button' ),
                    $btn_before,
                    $btn_after
                );
            endif;
            ?>
		</div>


        <?php
    }

    public function _content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'title', 'none' );
        view.addRenderAttribute( 'title', 'class', 'ad-infobox-title fz-20 font-weight-normal text-2f2f2f mb-0' );

        view.addInlineEditingAttributes( 'description', 'basic' );
        view.addRenderAttribute( 'description', 'class', 'ad-infobox-text text-727272 fz-14' );

        view.addInlineEditingAttributes( 'button_text', 'none' );
        view.addRenderAttribute( 'button_text', 'class', 'ad-btn-text' );

        view.addRenderAttribute( 'button', 'class', 'ad-btn ad-btn--link' );
        view.addRenderAttribute( 'button', 'href', settings.button_link.url );

       #>

       <div class="advanced_addons_service bordered rounded rounded-12 type-1 bg-white">
			<i class="{{{settings.icon}}} fz-40 text-e0e0e0"></i>
			<# if (settings.title) { #>
                <{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title' ) }}}>{{ settings.title }}</{{ settings.title_tag }}>
            <# } #>
            <# if (settings.description) { #>
			<p {{{ view.getRenderAttributeString( 'description' ) }}}>
             {{{ settings.description }}}
            </p>
            <# } #>
			<# if ( settings.button_text && ! settings.button_icon ) { #>
                <a {{{ view.getRenderAttributeString( 'button' ) }}}><span {{{ view.getRenderAttributeString( 'button_text' ) }}}>{{ settings.button_text }}</span></a>
            <# } else if ( ! settings.button_text && settings.button_icon ) { #>
                <a {{{ view.getRenderAttributeString( 'button' ) }}}><i class="{{ settings.button_icon }}"></i></a>
            <# } else if ( settings.button_text && settings.button_icon ) {
                var button_before = button_after = '';
                if ( settings.button_icon_position === 'before' ) {
                    view.addRenderAttribute( 'button', 'class', 'ad-btn--icon-before' );
                    button_before = '<i class="ad-btn-icon ' + settings.button_icon + '"></i>';
                    button_after = '<span ' + view.getRenderAttributeString( 'button_text' ) + '>' + settings.button_text + '</span>';
                } else {
                    view.addRenderAttribute( 'button', 'class', 'ad-btn--icon-after' );
                    button_after = '<i class="ad-btn-icon ' + settings.button_icon + '"></i>';
                    button_before = '<span ' + view.getRenderAttributeString( 'button_text' ) + '>' + settings.button_text + '</span>';
                } #>
                <a {{{ view.getRenderAttributeString( 'button' ) }}}>{{{ button_before }}} {{{ button_after }}}</a>
            <# } #>
		</div>

        <?php
    }
}
