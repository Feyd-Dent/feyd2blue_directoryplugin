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

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if ( !class_exists( 'F2BDirectory' ) ) {

    class F2BDirectory
    {
    
        public $plugin;

        function __construct() {
            $this->plugin = plugin_basename( __FILE__ );
        }
        

        function register() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

            add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
        }

        public function settings_link( $links ) {
            $settings_link = '<a href="admin.php?page=f2bdirectory_plugin">Settings</a>';
            array_push( $links, $settings_link );
            return $links;
        }

        public function add_admin_pages() {
            add_menu_page( 'F2BDirectory Plugin', 'Airsoft Directory', 'manage_options', 'f2bdirectory_plugin', array( $this, 'admin_index'), 'dashicons-store', 110 );
        }

        public function admin_index() {
            require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';

        }
        
        protected function create_post_type() {
            add_action( 'init', array( $this, 'custom_post_type' ) );
        }
    
        function uninstall() {
    
        }
    //todo custom post type not working...
        function custom_post_type() {
            register_post_type( 'site', [
                'public' => true,
                'label' => 'Sites'
            ]);
        }
        function enqueue() {
            // enqueue all scripts
            wp_enqueue_style ( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ));
            wp_enqueue_script ( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ));
        }

        function activate() {
            // require_once plugin_dir_path( __FILE__ ) . 'includes/f2bdirectory-activate.php';
            Activate::activate();
        }
        function deactivate() {
            // require_once plugin_dir_path( __FILE__ ) . 'includes/f2bdirectory-activate.php';
            Deactivate::deactivate();
        }
    }
    
        $f2bDirectory = new F2BDirectory();
        $f2bDirectory->register();
    
    
    // activation
    register_activation_hook( __FILE__, array( $f2bDirectory, 'activate') );
    
    // deactivation
    // require_once plugin_dir_path( __FILE__ ) . 'includes/f2bdirectory-deactivate.php';
    register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate') );
    
    // uninstall
    // register_uninstall_hook( __FILE__, array($f2bDirectory, 'uninstall') );
}