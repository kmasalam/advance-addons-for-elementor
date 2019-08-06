<?php
/**
 * Plugin Name: Advanced Addons for Elementor
 * Plugin URI: https://advancedaddons.com/elementor
 * Description: The most advanced collection of Elementor page builder widgets.
 * Version: 1.0.0
 * Author: Advanced Addons
 * Author URI: https://advancedaddons.com/
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: advanced-addons-elementor
 * Domain Path: /languages/
 *
 * @package Advanced_Addons
 */

defined( 'ABSPATH' ) || die();

define( 'AAFE_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AAFE_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AAFE_DIR_ASSETS', trailingslashit( AAFE_DIR_URL . 'assets' ) );

require AAFE_DIR_PATH . 'advanced-addons-base.php';

\AAFE\Elementor\Base::instance();
