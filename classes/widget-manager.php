<?php
namespace AAFE\Elementor\Manager;

use Elementor\Plugin as Elementor;

defined( 'ABSPATH' ) || die();

class Widgets {
    public static function init() {
        add_action( 'elementor/widgets/widgets_registered', [__CLASS__, 'register'] );
    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public static function register() {
        require( AAFE_DIR_PATH . 'base/widget-base.php' );

        $widgets = [
            'infobox',
            'team-member',
            'buttons',
            'alert',
            'inline-notice',
            'post-block',
            'quotes',
            'testimonials',
            'promo-box',
            'search-box',
            'social-links',
            'pricing-tables',
            'instagram',
            'divider',
            'testimonials-slider',
            'social-share',
            'timeline',
            'dual-button',
            'image-compare',
            'clients',
            'notice',
            'tabs',

        ];

        foreach ( $widgets as $widget ) {
            require( AAFE_DIR_PATH . 'widgets/' . $widget . '/widget.php' );

            $class_name = str_replace( '-', '_', $widget );
            $class_name = 'AAFE\Elementor\Widget\\' . $class_name;
            Elementor::instance()->widgets_manager->register_widget_type( new $class_name() );
        }
    }
}
