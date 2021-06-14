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

class F2BDirectory
{
    function __construct() {
        add_action( 'init', array( $this, 'custom_post_type' ) );
    }
    function activate() {
        $this->custom_post_type();
        flush_rewrite_rules();
    }    

    function deactivate() {

    }

    function uninstall() {

    }

    function custom_post_type() {
        register_post_type( 'site', [
            'public' => true,
            'label' => 'Sites'
        ]);
    }
}

if (class_exists( 'F2BDirectory' )) {
    $f2bDirectory = new F2BDirectory();
}

// activation
register_activation_hook( __FILE__, array(f2bDirectory, 'activate') );

// deactivation
register_deactivation_hook( __FILE__, array(f2bDirectory, 'deactivate') );

// uninstall
register_uninstall_hook( __FILE__, array(f2bDirectory, 'uninstall') );