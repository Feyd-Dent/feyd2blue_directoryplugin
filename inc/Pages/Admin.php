<?php


/**
 * Plugin Name:     Feyd2Blue Directory
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{

    public $settings;
    public $pages = array();

    public function __construct() 
    {
        $this->settings = new SettingsApi();
        $this->pages = [
            [
                'page_title' => 'F2BDirectory Plugin',
                'menu_title' => 'Airsoft Directory',
                'capability' => 'manage_options',
                'menu_slug' => 'f2bdirectory_plugin',
                'callback' => function() { echo '<h1>Feyd2Blue Media Designs</h1>';},
                'icon_url' => 'dashicons-store',
                'position' => 110
            ],
            [
                'page_title' => 'F2BDirectory Plugin 2',
                'menu_title' => 'Airsoft Directory 2',
                'capability' => 'manage_options',
                'menu_slug' => 'f2bdirectory_plugin2',
                'callback' => function() { echo '<h1>Feyd2Blue Media Designs page 2</h1>';},
                'icon_url' => 'dashicons-external',
                'position' => 111
            ]
        ];
    }

    public function register() {
        // add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

    $this->settings->addPages( $this->pages )->register();   
    }

}