<?php
/**
 *  * Plugin Name:     Feyd2Blue Directory
 * 
 *  */ 
namespace Inc\Base;

class Deactivate 
{
   public static function deactivate() {
       flush_rewrite_rules();
   }
}