<?php
/**
 *  * Plugin Name:     Feyd2Blue Directory
 * 
 *  */ 
namespace Inc;

 class Activate 
 {
    public static function activate() {
        flush_rewrite_rules();
    }
 }