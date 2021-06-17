<?php
/**
 *  * Plugin Name:     Feyd2Blue Directory
 * 
 *  */ 
namespace Inc\Base;

 class Activate
 {
    public static function activate() {
        flush_rewrite_rules();
    }
 }