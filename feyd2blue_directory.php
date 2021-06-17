<?php
/**
 * Plugin Name:     Feyd2Blue Directory
 * Description:     Airsoft site directory
 * version:         0.0.1
 * Author:          Daniel Kennedy
 */
/*
Feyd2Blue Directory is not free software and is not intended for distribution outside of the surplustore.co.uk website, if you have obtained this by any means this comes with no warranty, or guarantee of safe working, please don't use it and if you do, don't moan to me if it breaks your site!
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
};

if ( file_exists( dirname( __FILE__ ) . '\vendor\autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '\vendor\autoload.php';
}

// Not needed if you call direct...
// use Inc\Base\Activate;
// use Inc\Base\Deactivate;

// Activation code
function activate_f2bdirectory() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_f2bdirectory' );

// Deactivation code
function deactivate_f2bdirectory() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_f2bdirectory' );


//Initialise all core classes
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}