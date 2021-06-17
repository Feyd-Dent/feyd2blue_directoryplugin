<?php

/**
 * Plugin Name:     Feyd2Blue Directory
 */

namespace Inc;

 final class Init
 {

    /*
    *Store all the classes inside an array
    * return array full list of classes
    *
    */

     public static function get_services() {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
     }

    //  Loop through the classes, initialize them and call the register() method if it exists

     public static function register_services() {
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
     }

    //  Initialize the class

     private static function instantiate( $class ) 
     {
        $service = new $class();

        return $service;
     }
 }



// use Inc\Base\Activate;
// use Inc\Base\Deactivate;
// use Inc\Pages\AdminPages;

// if ( !class_exists( 'F2BDirectory' ) ) {

//     class F2BDirectory
//     {
    
//         public $plugin;

//         function __construct() {
//             $this->plugin = plugin_basename( __FILE__ );
//         }
        

//         function register() {


//             

//             $this->create_post_type();
//         }




        
//         protected function create_post_type() {
//             add_action( 'init', array( $this, 'custom_post_type' ) );
//         }
    
//         function uninstall() {
    
//         }
//     //todo custom post type not working...
//         function custom_post_type() {
//             register_post_type( 'site', [
//                 'public' => true,
//                 'label' => 'Sites'
//             ] );
//         }


//         function activate() {
//             // require_once plugin_dir_path( __FILE__ ) . 'includes/f2bdirectory-activate.php';
//             Activate::activate();
//         }
//         function deactivate() {
//             // require_once plugin_dir_path( __FILE__ ) . 'includes/f2bdirectory-activate.php';
//             Deactivate::deactivate();
//         }
//     }
    
//         $f2bDirectory = new F2BDirectory();
//         $f2bDirectory->register();
    
    
//     // activation
//     register_activation_hook( __FILE__, array( $f2bDirectory, 'activate') );
    
//     // deactivation
//     // require_once plugin_dir_path( __FILE__ ) . 'includes/f2bdirectory-deactivate.php';
//     register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate') );
    
//     // uninstall
//     // register_uninstall_hook( __FILE__, array($f2bDirectory, 'uninstall') );
// }