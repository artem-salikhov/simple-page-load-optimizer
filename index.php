<?php
/*
    Plugin Name: Simple Page Load Optimizer
    Plugin URI: https://stylemix.net
    Description: Just simple page load optimizer plugin.
    Version: 1.0.0
    Author: Artem Salikhov
    Author URI: https://github.com/artem-salikhov
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SPLO_VERSION', '1.0.0' );

define( 'SPLO_PATH', dirname( __FILE__ ) );
define( 'SPLO_FILE', __FILE__ );
define( 'SPLO_URL', plugins_url( '', __FILE__ ) );

if ( ! is_textdomain_loaded( 'splo' ) ) {
	load_plugin_textdomain( 'splo', false, 'simple-page-load-optimizer/languages' );
}

require_once 'inc/functions.php';
require_once 'inc/admin.php';

register_activation_hook( __FILE__,  'splo_activation');
register_deactivation_hook( __FILE__, 'splo_deactivation');
register_uninstall_hook( __FILE__, 'splo_uninstall');

function splo_activation() {
    update_option("splo_active", 1);
}

function splo_deactivation (){
    delete_option("splo_active");
}

function splo_uninstall(){
    delete_option("splo_active");
}
