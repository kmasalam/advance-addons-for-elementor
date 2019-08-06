<?php
namespace AAFE\Elementor\Admin;

use Elementor\Base;

defined( 'ABSPATH' ) || die();

class Dashboard {

    public static function init() {
        add_action( 'admin_menu', [__CLASS__, 'Advanced_admin_menu'], 515 );
    }

    public static function Advanced_admin_menu() {
        add_submenu_page(
            'elementor',
            __( 'Advanced Addons Elementor', 'advanced-addons-elementor' ),
            __( 'Advanced Addons Elementor', 'advanced-addons-elementor' ),
            'manage_options',
            'happy-settings',
            array( __CLASS__, 'Advanced_admin_settings' )
        );
    }

    public static function Advanced_admin_settings() {
        echo '<div class="happy-settings">';

            include_once AAFE_DIR_PATH . 'inc/admin-templates/widgets.php';
            include_once AAFE_DIR_PATH . 'inc/admin-templates/save.php';

        echo '</div>';
    }

//    public function save_settings() {
//
//    }

}