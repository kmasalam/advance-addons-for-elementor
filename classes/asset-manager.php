<?php
namespace AAFE\Elementor\Manager;

use AAFE\Elementor\Base;

defined( 'ABSPATH' ) || die();

class Assets {

    /**
     * Bind hook and run internal methods here
     */
    public static function init() {
        // Frontend scripts
        add_action( 'wp_enqueue_scripts', [__CLASS__, 'enqueue_frontend_scripts'] );

        // Dashboard scripts
        add_action( 'admin_enqueue_scripts', [__CLASS__, 'dashboard_enqueue_scripts'] );

        // Edit and preview enqueue
        add_action( 'elementor/preview/enqueue_styles', [__CLASS__, 'enqueue_preview_style'] );

		add_action( 'elementor/editor/before_enqueue_scripts', [__CLASS__, 'enqueue_editor_scripts'] );

        // Placeholder image replacement
        add_filter( 'elementor/utils/get_placeholder_image_src', [__CLASS__, 'set_placeholder_image'] );
    }

    public static function set_placeholder_image() {
        return AAFE_DIR_ASSETS . 'imgs/placeholder.jpg';
    }

    /**
     * Enqueue frontend scripts
     */
    public static function enqueue_frontend_scripts() {
		$suffix = Advance_Addons_is_script_debug_enabled() ? '.' : '.';

        wp_enqueue_style(
            'advance-icon',
            AAFE_DIR_ASSETS . 'fonts/style.min.css',
            null,
            Base::VERSION
        );

        wp_enqueue_style(
            'font-awesome',
            AAFE_DIR_ASSETS . 'css/font-awesome.min.css',
            null,
            Base::VERSION
        );

        wp_enqueue_style(
            'themeroots',
            AAFE_DIR_ASSETS . 'css/themeroots.min.css',
            null,
            Base::VERSION
        );

        wp_enqueue_style(
            'plugin',
            AAFE_DIR_ASSETS . 'css/plugin.css',
            null,
            Base::VERSION
        );

        wp_enqueue_style(
            'style',
            AAFE_DIR_ASSETS . 'css/style.css',
            null,
            Base::VERSION
        );

        wp_enqueue_style(
            'extra',
            AAFE_DIR_ASSETS . 'extra.css',
            null,
            Base::VERSION
        );

        // Scripts
        
        wp_enqueue_script(
            'plugin',
            AAFE_DIR_ASSETS . 'js/plugin.js',
            ['jquery'],
            Base::VERSION,
            true
        );

        wp_enqueue_script(
            'advanced-addons-elementor',
            AAFE_DIR_ASSETS . 'js/main.js',
            ['jquery'],
            Base::VERSION,
            true
        );

        
    }

    public static function dashboard_enqueue_scripts() {
        $currentScreen = get_current_screen();
        if ( $currentScreen->id != "elementor_page_happy-settings" ) {
            return;
        }
        wp_enqueue_style(
            'advance-dashboard',
            AAFE_DIR_ASSETS . 'admin/css/dashboard.css',
            null,
            Base::VERSION
        );
    
    }

    public static function enqueue_editor_scripts() {
        wp_enqueue_style(
            'advance-icon',
            AAFE_DIR_ASSETS . 'fonts/style.min.css',
            null,
            Base::VERSION
        );

    
	}

    public static function enqueue_preview_style() {
        if( class_exists( 'WeForms' ) ) {
            wp_enqueue_style(
                'advance-weform-preview',
                plugins_url( '/weforms/assets/wpuf/css/frontend-forms.css', 'weforms' ),
                null,
                Base::VERSION
            );
        }
        if( class_exists( 'WPForms_Lite' ) ) {
            wp_enqueue_style(
                'advance-wpform-preview',
                plugins_url( '/wpforms-lite/assets/css/wpforms-full.css', 'wpforms-lite' ),
                null,
                Base::VERSION
            );
		}
        if( class_exists( 'Caldera_Forms' ) ) {
            wp_enqueue_style(
                'advance-caldera-preview',
                plugins_url( '/caldera-forms/assets/css/caldera-forms-front.css', 'caldera-forms' ),
                null,
                Base::VERSION
            );
        }

        
    }
}
