<?php
/**
 *  * Plugin Name:     Feyd2Blue Directory
 * 
 *  */ 
use \Inc\Base\BaseController;
namespace Inc\Base;

class SettingsLinks extends BaseController
{

    public function register() {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=f2bdirectory_plugin">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}