<?php
/**
 * Plugin Name:       Classic Blog Grid
 * Plugin URI:        https://www.theclassictemplates.com/
 * Description:       A plugin to display blog posts in various grid formats: list, masonry, and slider.
 * Version:           1.2
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            classictemplate
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       classic-blog-grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

define( 'CLBGD_PLUGIN_VERSION', '1.2' );
define( 'CLBGD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CLBGD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CLBGD_API_URL', 'https://license.theclassictemplates.com/api/public/' );
define( 'CLBGD_SERVER_URL', 'https://www.theclassictemplates.com/' );

require_once CLBGD_PLUGIN_DIR . 'global-functions.php';
require_once CLBGD_PLUGIN_DIR . 'includes/class-classic-blog-grid-core.php';

function clbgd_init() {
    $clbgd_instance = Clbgd_Core::instance();
    $clbgd_instance->init();
}
add_action( 'plugins_loaded', 'clbgd_init' );